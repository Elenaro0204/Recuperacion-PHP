<?php
require_once '../Model/Producto.php';
include 'header.php';

if (session_status() == PHP_SESSION_NONE) session_start();

$carrito = $_SESSION['carrito'] ?? [];  // Obtener carrito o array vacío si no existe
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Tienda Online - Productos</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 20px;
      background: #f0f2f5;
      color: #333;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #2c3e50;
    }

    .header-links {
      text-align: center;
      margin-bottom: 30px;
    }

    .header-links a {
      background-color: #3498db;
      color: white;
      padding: 10px 15px;
      margin: 0 10px;
      text-decoration: none;
      border-radius: 5px;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    .header-links a:hover {
      background-color: #2980b9;
    }

    .productos-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 25px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .producto {
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: transform 0.2s ease;
    }

    .producto:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    .producto h3 {
      margin: 0 0 15px 0;
      font-size: 1.4rem;
      color: #34495e;
    }

    .precio {
      font-weight: bold;
      font-size: 1.2rem;
      color: #27ae60;
      margin-bottom: 8px;
    }

    .stock {
      font-size: 0.9rem;
      margin-bottom: 15px;
      color: #555;
    }

    .producto a {
      display: inline-block;
      margin: 5px 5px 0 0;
      padding: 8px 12px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: 600;
      font-size: 0.9rem;
      text-align: center;
      transition: background-color 0.3s ease;
    }

    .añadir {
      background-color: #2ecc71;
      color: white;
      border: none;
    }

    .añadir:hover {
      background-color: #27ae60;
    }

    .sin-stock {
      color: #e74c3c;
      font-weight: 700;
      font-size: 1rem;
      margin-bottom: 10px;
    }

    .editar {
      background-color: #3498db;
      color: white;
    }

    .editar:hover {
      background-color: #2980b9;
    }
  </style>
</head>

<body>

  <h1>Productos disponibles</h1>

  <div class="header-links">
    <a href="../View/carrito_view.php">Ver carrito</a>
    <a href="../Controller/nuevoProducto.php">Nuevo producto</a>
  </div>

  <div class="productos-grid">
    <?php foreach ($data['productos'] as $producto): ?>

      <?php
      // Código del producto
      $codigo = $producto->getCodigo();
      $stockTotal = $producto->getStock();
      $cantidadEnCarrito = $carrito[$codigo] ?? 0;
      $stockTemporal = $stockTotal - $cantidadEnCarrito;

      // Aseguramos que no sea negativo
      if ($stockTemporal < 0) $stockTemporal = 0;
      ?>

      <div class="producto">
        <h3><?= htmlspecialchars($producto->getNombre()) ?></h3>
        <p class="precio">Precio: €<?= number_format($producto->getPrecio(), 2) ?></p>
        <p class="stock">Stock disponible: <?= $stockTemporal ?></p>

        <?php if ($stockTemporal > 0): ?>
          <a class="añadir" href="../Controller/añadirCarrito.php?codigo=<?= $codigo ?>">Añadir al carrito</a>
        <?php else: ?>
          <p class="sin-stock">Sin stock</p>
        <?php endif; ?>

        <a class="editar" href="../Controller/actualizaProducto.php?codigo=<?= $codigo ?>">Editar Producto</a>
      </div>
    <?php endforeach; ?>
  </div>

</body>

</html>