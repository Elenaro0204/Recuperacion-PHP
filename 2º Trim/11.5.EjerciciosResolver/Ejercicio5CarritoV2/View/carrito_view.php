<?php
require_once '../Model/Carrito.php';
include 'header.php';
if (session_status() == PHP_SESSION_NONE) session_start();

// Asegúrate de que hay un usuario logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: ../Controller/login.php");
    exit;
}

$usuarioId = $_SESSION['usuario']['id'];
$productosEnCarrito = Carrito::getProductos($usuarioId);
$total = Carrito::getTotal($usuarioId);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Carrito de la compra</title>
    <style>
        /* Reset básico */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
        }

        thead th {
            background-color: #2980b9;
            color: white;
            font-weight: 600;
            padding: 12px 15px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        tbody tr {
            background: #ecf0f1;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        tbody tr:hover {
            background: #d1e7f5;
        }

        td {
            padding: 12px 15px;
            text-align: center;
            vertical-align: middle;
            font-size: 1rem;
        }

        input[type=number] {
            width: 60px;
            padding: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 1rem;
            text-align: center;
            transition: border-color 0.3s ease;
        }

        input[type=number]:focus {
            border-color: #2980b9;
            outline: none;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        a.button,
        button {
            background-color: #2980b9;
            color: white;
            padding: 12px 22px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(41, 128, 185, 0.4);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            display: inline-block;
            text-align: center;
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        a.button:hover,
        button:hover {
            background-color: #1c5980;
            box-shadow: 0 6px 15px rgba(28, 89, 128, 0.7);
        }

        .delete-link {
            background-color: #e74c3c;
            padding: 6px 12px;
            border-radius: 6px;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .delete-link:hover {
            background-color: #c0392b;
        }

        .total {
            text-align: right;
            font-size: 1.3rem;
            font-weight: 700;
            margin-top: 15px;
            color: #27ae60;
        }

        .empty-message {
            text-align: center;
            font-size: 1.2rem;
            color: #7f8c8d;
            margin: 40px 0;
        }

        @media (max-width: 650px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead tr {
                display: none;
            }

            tbody tr {
                margin-bottom: 20px;
                background: #ecf0f1;
                padding: 15px;
                border-radius: 8px;
            }

            tbody tr:hover {
                background: #d1e7f5;
            }

            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
                font-size: 0.95rem;
            }

            td::before {
                position: absolute;
                left: 15px;
                width: 45%;
                padding-left: 10px;
                font-weight: 600;
                white-space: nowrap;
                content: attr(data-label);
                text-align: left;
                color: #34495e;
            }

            input[type=number] {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Tu carrito</h2>

        <?php if (empty($productosEnCarrito)): ?>
            <p>Tu carrito está vacío.</p>
        <?php else: ?>
            <form action="../Controller/actualizarCarrito.php" method="POST">
                <table>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Eliminar</th>
                    </tr>

                    <?php foreach ($productosEnCarrito as $codigo => $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['producto']->getNombre()); ?></td>
                            <td><?php echo number_format($item['producto']->getPrecio(), 2); ?> €</td>
                            <td>
                                <input type="hidden" name="codigos[]" value="<?php echo $codigo; ?>">
                                <input type="number" name="cantidades[]" value="<?php echo $item['cantidad']; ?>" min="1">
                            </td>
                            <td><?php echo number_format($item['producto']->getPrecio() * $item['cantidad'], 2); ?> €</td>
                            <td>
                                <a href="../Controller/eliminarCarrito.php?codigo=<?php echo $codigo; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <p><strong>Total: <?php echo number_format($total, 2); ?> €</strong></p>
                <button type="submit">Actualizar carrito</button>
            </form>

            <br>
            <a href="../Controller/comprarCarrito.php">Finalizar compra</a>
        <?php endif; ?>

        <a href="../Controller/index.php">Volver</a>
</body>

</html>