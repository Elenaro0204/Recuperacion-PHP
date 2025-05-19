<?php

class Factura {
    // Atributo de clase
    private static $IVA = 21;

    // Atributos de instancia
    private $importeBase = 0;
    private $fecha;
    private $estado;
    private $productos = [];

    public function __construct($fecha, $estado = "pendiente") {
        $this->fecha = $fecha;
        $this->estado = $estado;
    }

    // Añadir un producto a la factura
    public function añadeProducto($nombre, $precio, $cantidad) {
        $this->productos[] = [
            "nombre" => $nombre,
            "precio" => $precio,
            "cantidad" => $cantidad
        ];

        // Actualizar el importe base automáticamente
        $this->importeBase += $precio * $cantidad;
    }

    // Imprimir factura con desglose e IVA
    public function imprimeFactura() {
        echo "<h3>Factura</h3>";
        echo "Fecha: {$this->fecha}<br>";
        echo "Estado: {$this->estado}<br><br>";
        echo "<table border='1' cellpadding='5'>
                <tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th></tr>";

        foreach ($this->productos as $producto) {
            $subtotal = $producto["precio"] * $producto["cantidad"];
            echo "<tr>
                    <td>{$producto['nombre']}</td>
                    <td>{$producto['precio']} €</td>
                    <td>{$producto['cantidad']}</td>
                    <td>" . number_format($subtotal, 2) . " €</td>
                  </tr>";
        }

        $ivaCalculado = $this->importeBase * self::$IVA / 100;
        $total = $this->importeBase + $ivaCalculado;

        echo "</table><br>";
        echo "Importe base: " . number_format($this->importeBase, 2) . " €<br>";
        echo "IVA (" . self::$IVA . "%): " . number_format($ivaCalculado, 2) . " €<br>";
        echo "<strong>Total: " . number_format($total, 2) . " €</strong><br>";
    }

    // Getter del importe base
    public function getImporteBase() {
        return $this->importeBase;
    }

    // Getter y setter de fecha
    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    // Getter y setter de estado
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        if ($estado === "pagada" || $estado === "pendiente") {
            $this->estado = $estado;
        }
    }
}
