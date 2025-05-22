<?php
// Para los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) session_start();

// TEMA 9 – Clase Producto
class Producto
{
    public $nombre;
    public $precio;
    public static $tienda = "PHP Shop"; // Atributo estático

    public function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function mostrar()
    {
        return "$this->nombre - $this->precio €";
    }

    public static function getTienda()
    {
        return self::$tienda;
    }
}

// TEMA 5 – Array de productos
$productos = [
    new Producto("Camiseta", 12.99),
    new Producto("Pantalón", 25.50),
    new Producto("Zapatos", 45.00)
];

// TEMA 6 – Función para mostrar productos
function mostrarProductos($productos)
{
    foreach ($productos as $i => $p) {
        echo "$i: " . $p->mostrar() . "<br>";
    }
}

// TEMA 3 – Procesar selección
if (isset($_REQUEST['indice']) && is_numeric($_REQUEST['indice'])) {
    $i = intval($_REQUEST['indice']);

    // TEMA 4 – Validar con bucle
    if ($i >= 0 && $i < count($productos)) {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = serialize([]);
        }
        $carrito = unserialize($_SESSION['carrito']);
        $carrito[] = $productos[$i];
        $_SESSION['carrito'] = serialize($carrito);
    }
}

// TEMA 8 – Guardar en fichero
if (isset($_REQUEST['guardar'])) {
    if (isset($_SESSION['carrito'])) {
        $carrito = @unserialize($_SESSION['carrito']);

        if ($carrito && is_array($carrito)) {
            $f = fopen("carrito.txt", "w");

            // TEMA DE FECHAS
            $fecha = date("d-m-Y H:i:s");
            fwrite($f, "Fecha de compra: $fecha\n\n");

            fwrite($f, "Contenido del carrito:\n");

            foreach ($carrito as $item) {
                // TEMA DE CADENAS
                $nombreMayus = strtoupper($item->nombre);          // a mayúsculas
                $nombreReducido = substr($nombreMayus, 0, 10);     // los primeros 10 caracteres
                $precioTexto = number_format($item->precio, 2) . " €"; // formatear número

                fwrite($f, "- " . $nombreReducido . " | " . $precioTexto . "\n");
            }

            $lineas = count($carrito);
            fwrite($f, "\nTotal de artículos: $lineas\n");

            fclose($f);
            echo "<p>Carrito guardado en fichero con fecha y cadena.</p>";
        } else {
            echo "<p>Error: carrito no válido.</p>";
        }
    } else {
        echo "<p>No hay carrito en la sesión.</p>";
    }
}

// Mostrar nombre de tienda
echo "<h2>" . Producto::getTienda() . "</h2>";
echo "<h3>Productos disponibles:</h3>";
mostrarProductos($productos);

// Mostrar productos
echo "<h3>Productos disponibles:</h3>";
mostrarProductos($productos);

// Mostrar formulario
?>
<form method="post">
    <label>Elige el número del producto:</label>
    <input type="number" name="indice" min="0" max="<?php echo count($productos) - 1; ?>">
    <button type="submit">Añadir al carrito</button>
</form>

<form method="post">
    <button name="guardar">Guardar carrito</button>
</form>

<?php
// Mostrar carrito
if (isset($_SESSION['carrito'])) {
    echo "<h3>Carrito actual:</h3>";
    $carrito = unserialize($_SESSION['carrito']);
    foreach ($carrito as $item) {
        echo "- " . $item->mostrar() . "<br>";
    }
}
?>