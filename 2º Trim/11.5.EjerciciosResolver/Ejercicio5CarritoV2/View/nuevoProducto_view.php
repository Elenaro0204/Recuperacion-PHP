<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Nuevo Producto - Tienda</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      padding: 0;
      background-color: #f9f9f9;
    }

    form {
      background-color: #fff;
      padding: 25px;
      border-radius: 10px;
      max-width: 700px;
      margin: 0 auto;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border: 1px solid #ccc;
    }

    h2 {
      color: #336699;
      margin-top: 0;
    }

    label {
      font-weight: bold;
      color: #333;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #336699;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #254d73;
    }
  </style>
</head>

<body>
  <?php
  include 'header.php';
  ?>
  <form action="../Controller/grabaProducto.php" method="POST">
    <h2>Nuevo Producto</h2>

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" required />

    <label for="precio">Precio (€)</label>
    <input type="number" id="precio" name="precio" step="0.01" min="0" required />

    <label for="stock">Stock</label>
    <input type="number" id="stock" name="stock" min="0" required />

    <hr />
    <input type="submit" value="Añadir producto" />
  </form>
</body>

</html>