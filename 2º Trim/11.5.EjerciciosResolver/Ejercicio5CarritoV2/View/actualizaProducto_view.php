<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Actualizar Producto - Tienda</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      padding: 0;
      background-color: #f9f9f9;
      color: #333;
      line-height: 1.5;
    }

    form {
      background-color: #fff;
      padding: 30px 35px;
      border-radius: 12px;
      max-width: 700px;
      margin: 40px auto;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
      border: 1px solid #ccc;
      transition: box-shadow 0.3s ease;
    }

    form:hover {
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    h2 {
      color: #336699;
      margin-top: 0;
      font-weight: 700;
      font-size: 2rem;
      margin-bottom: 25px;
      text-align: center;
    }

    label {
      font-weight: 600;
      color: #555;
      display: block;
      margin-bottom: 8px;
      font-size: 1rem;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    textarea {
      width: 100%;
      padding: 12px 15px;
      font-size: 1rem;
      margin-top: 5px;
      margin-bottom: 20px;
      border: 1.8px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
      transition: border-color 0.3s ease;
      font-family: inherit;
      resize: vertical;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="file"]:focus,
    textarea:focus {
      border-color: #336699;
      outline: none;
      box-shadow: 0 0 6px #a3c1e5;
    }

    img {
      margin-top: 10px;
      border-radius: 5px;
      max-width: 100%;
      height: auto;
      display: block;
      margin-bottom: 15px;
    }

    input[type="submit"] {
      background-color: #336699;
      color: white;
      padding: 12px 25px;
      border: none;
      border-radius: 8px;
      font-size: 1.1rem;
      cursor: pointer;
      font-weight: 600;
      width: 100%;
      max-width: 300px;
      display: block;
      margin: 0 auto;
      transition: background-color 0.3s ease;
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
  <form action="../Controller/updateProducto.php" enctype="multipart/form-data" method="POST">
    <h2>Actualizar Producto</h2>

    <!-- Código oculto para identificar el producto -->
    <input type="number" name="codigo" value="<?= $data['producto']->getCodigo() ?>" readonly="readonly">

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="<?= $data['producto']->getNombre() ?>" required>

    <label for="precio">Precio (€)</label>
    <input type="number" id="precio" name="precio" step="0.01" min="0" value="<?= $data['producto']->getPrecio() ?>" required>

    <label for="stock">Stock</label>
    <input type="number" id="stock" name="stock" min="0" value="<?= $data['producto']->getStock() ?>" required>

    <hr>
    <input type="submit" value="Actualizar">
  </form>
</body>

</html>