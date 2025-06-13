<?php
session_start();

require_once 'Producto.php';

class Carrito
{
    // Añade un producto al carrito (si ya existe suma 1 a la cantidad)
    public static function añadirProducto($codigo)
    {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Obtiene el producto para comprobar si existe y stock
        $producto = Producto::getProductoByCodigo($codigo);
        if (!$producto) {
            throw new Exception("Producto no encontrado.");
        }

        // Si ya está en el carrito, suma cantidad si no supera stock
        if (isset($_SESSION['carrito'][$codigo])) {
            $cantidadActual = $_SESSION['carrito'][$codigo];
            if ($cantidadActual < $producto->getStock()) {
                $_SESSION['carrito'][$codigo]++;
            } else {
                throw new Exception("No hay más stock disponible.");
            }
        } else {
            if ($producto->getStock() > 0) {
                $_SESSION['carrito'][$codigo] = 1;
            } else {
                throw new Exception("Producto sin stock.");
            }
        }
    }

    // Elimina un producto del carrito
    public static function eliminarProducto($codigo)
    {
        if (isset($_SESSION['carrito'][$codigo])) {
            unset($_SESSION['carrito'][$codigo]);
        }
    }

    // Actualiza las cantidades a partir de arrays paralelos de códigos y cantidades
    public static function actualizarCantidades($codigos, $cantidades)
    {
        foreach ($codigos as $index => $codigo) {
            $cantidadNueva = (int)$cantidades[$index];
            if ($cantidadNueva < 1) {
                // Si la cantidad es menor que 1, elimina el producto
                unset($_SESSION['carrito'][$codigo]);
                continue;
            }

            $producto = Producto::getProductoByCodigo($codigo);
            if (!$producto) {
                continue;
            }

            // Controla que la cantidad no supere el stock disponible
            if ($cantidadNueva <= $producto->getStock()) {
                $_SESSION['carrito'][$codigo] = $cantidadNueva;
            } else {
                $_SESSION['carrito'][$codigo] = $producto->getStock();
                // Opcional: lanzar excepción o mensaje sobre stock limitado
            }
        }
    }

    // Devuelve los productos del carrito con su objeto Producto y cantidad
    public static function getProductos()
    {
        if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
            return [];
        }

        $lista = [];
        foreach ($_SESSION['carrito'] as $codigo => $cantidad) {
            $producto = Producto::getProductoByCodigo($codigo);
            if ($producto) {
                $lista[$codigo] = [
                    'producto' => $producto,
                    'cantidad' => $cantidad
                ];
            }
        }
        return $lista;
    }

    // Calcula el total del carrito
    public static function getTotal()
    {
        $total = 0;
        $productos = self::getProductos();
        foreach ($productos as $item) {
            $total += $item['producto']->getPrecio() * $item['cantidad'];
        }
        return $total;
    }

    // Vacía el carrito
    public static function vaciar()
    {
        unset($_SESSION['carrito']);
    }

    // Función para comprar (en este ejemplo sólo vacía el carrito y puede generar factura)
    public static function comprar()
    {
        if (session_status() == PHP_SESSION_NONE) session_start();

        if (empty($_SESSION['carrito'])) {
            throw new Exception("El carrito está vacío, no se puede comprar.");
        }

        $productosComprados = [];
        $total = 0;

        foreach ($_SESSION['carrito'] as $codigo => $cantidad) {
            $producto = Producto::getProductoByCodigo($codigo);
            if (!$producto) {
                throw new Exception("Producto con código $codigo no encontrado.");
            }

            if ($producto->getStock() < $cantidad) {
                throw new Exception("Stock insuficiente para el producto " . $producto->getNombre());
            }

            $nuevoStock = $producto->getStock() - $cantidad;
            $producto->setStock($nuevoStock);
            $producto->update();

            $subtotal = $producto->getPrecio() * $cantidad;
            $total += $subtotal;
            $productosComprados[] = [
                'nombre' => $producto->getNombre(),
                'precio' => $producto->getPrecio(),
                'cantidad' => $cantidad,
                'subtotal' => $subtotal
            ];
        }

        $contenido = "=== FACTURA DE COMPRA ===\n\n";
        foreach ($productosComprados as $item) {
            $contenido .= "{$item['nombre']} - Precio: €" . number_format($item['precio'], 2) . " x {$item['cantidad']} = €" . number_format($item['subtotal'], 2) . "\n";
        }
        $contenido .= "\nTOTAL A PAGAR: €" . number_format($total, 2) . "\n";
        $contenido .= "Gracias por su compra.\n";

        $rutaTicket = __DIR__ . '/../ticket.txt';
        file_put_contents($rutaTicket, $contenido);

        $_SESSION['carrito'] = [];
    }
}
