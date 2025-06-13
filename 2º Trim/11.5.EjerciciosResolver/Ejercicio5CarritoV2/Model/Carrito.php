<?php
if (session_status() == PHP_SESSION_NONE) session_start();

require_once 'Producto.php';
require_once 'TiendaDB.php';

class Carrito
{
    // Añade un producto al carrito en BD
    public static function anadirProducto($usuarioId, $codigo)
    {
        $conexion = TiendaDB::connectDB();

        $producto = Producto::getProductoByCodigo($codigo);
        if (!$producto) {
            throw new Exception("Producto no encontrado.");
        }

        // Comprobar si ya existe en la cesta
        $consulta = $conexion->prepare("SELECT cantidad FROM cesta WHERE usuario_id = :usuario AND producto_codigo = :codigo");
        $consulta->execute(['usuario' => $usuarioId, 'codigo' => $codigo]);

        if ($row = $consulta->fetch()) {
            $cantidad = $row['cantidad'];
            if ($cantidad < $producto->getStock()) {
                $cantidad++;
                $update = $conexion->prepare("UPDATE cesta SET cantidad = :cantidad WHERE usuario_id = :usuario AND producto_codigo = :codigo");
                $update->execute(['cantidad' => $cantidad, 'usuario' => $usuarioId, 'codigo' => $codigo]);
            } else {
                throw new Exception("No hay más stock disponible.");
            }
        } else {
            if ($producto->getStock() > 0) {
                $insert = $conexion->prepare("INSERT INTO cesta (usuario_id, producto_codigo, cantidad) VALUES (:usuario, :codigo, 1)");
                $insert->execute(['usuario' => $usuarioId, 'codigo' => $codigo]);
            } else {
                throw new Exception("Producto sin stock.");
            }
        }
    }

    public static function eliminarProducto($usuarioId, $codigo)
    {
        $conexion = TiendaDB::connectDB();
        $delete = $conexion->prepare("DELETE FROM cesta WHERE usuario_id = :usuario AND producto_codigo = :codigo");
        $delete->execute(['usuario' => $usuarioId, 'codigo' => $codigo]);
    }

    public static function actualizarCantidades($usuarioId, $codigos, $cantidades)
    {
        $conexion = TiendaDB::connectDB();

        foreach ($codigos as $i => $codigo) {
            $cantidad = (int)$cantidades[$i];

            if ($cantidad < 1) {
                self::eliminarProducto($usuarioId, $codigo);
                continue;
            }

            $producto = Producto::getProductoByCodigo($codigo);
            if (!$producto) continue;

            if ($cantidad <= $producto->getStock()) {
                $update = $conexion->prepare("UPDATE cesta SET cantidad = :cantidad WHERE usuario_id = :usuario AND producto_codigo = :codigo");
                $update->execute(['cantidad' => $cantidad, 'usuario' => $usuarioId, 'codigo' => $codigo]);
            }
        }
    }

    public static function getProductos($usuarioId)
    {
        $conexion = TiendaDB::connectDB();
        $consulta = $conexion->prepare("SELECT producto_codigo, cantidad FROM cesta WHERE usuario_id = :usuario");
        $consulta->execute(['usuario' => $usuarioId]);

        $lista = [];
        while ($row = $consulta->fetch()) {
            $producto = Producto::getProductoByCodigo($row['producto_codigo']);
            if ($producto) {
                $lista[$row['producto_codigo']] = [
                    'producto' => $producto,
                    'cantidad' => $row['cantidad']
                ];
            }
        }
        return $lista;
    }

    public static function getTotal($usuarioId)
    {
        $productos = self::getProductos($usuarioId);
        $total = 0;
        foreach ($productos as $item) {
            $total += $item['producto']->getPrecio() * $item['cantidad'];
        }
        return $total;
    }

    public static function vaciar($usuarioId)
    {
        $conexion = TiendaDB::connectDB();
        $delete = $conexion->prepare("DELETE FROM cesta WHERE usuario_id = :usuario");
        $delete->execute(['usuario' => $usuarioId]);
    }

    public static function comprar($usuarioId)
    {
        $productos = self::getProductos($usuarioId);
        if (empty($productos)) {
            throw new Exception("El carrito está vacío, no se puede comprar.");
        }

        $conexion = TiendaDB::connectDB();
        $contenido = "=== FACTURA DE COMPRA ===\n\n";
        $total = 0;

        foreach ($productos as $codigo => $item) {
            $producto = $item['producto'];
            $cantidad = $item['cantidad'];

            if ($producto->getStock() < $cantidad) {
                throw new Exception("Stock insuficiente para {$producto->getNombre()}");
            }

            $nuevoStock = $producto->getStock() - $cantidad;
            $producto->setStock($nuevoStock);
            $producto->update();

            $subtotal = $producto->getPrecio() * $cantidad;
            $total += $subtotal;

            $contenido .= "{$producto->getNombre()} - €{$producto->getPrecio()} x $cantidad = €" . number_format($subtotal, 2) . "\n";
        }

        $contenido .= "\nTOTAL A PAGAR: €" . number_format($total, 2) . "\nGracias por su compra.\n";

        file_put_contents(__DIR__ . '/../ticket.txt', $contenido);

        self::vaciar($usuarioId);
    }
}
