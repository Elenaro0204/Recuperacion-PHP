<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Actualizar Oferta - Pizzería Peachepe</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      background-color: #f9f9f9;
    }

    form {
      background-color: #fff;
      padding: 25px;
      border-radius: 10px;
      max-width: 600px;
      margin: 0 auto;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      margin-bottom: 20px;
      color: #ff7f50;
    }

    h3 {
      margin-top: 20px;
      color: #ff7f50;
    }

    input[type="text"],
    input[type="file"],
    textarea {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    textarea {
      resize: vertical;
    }

    img {
      margin-top: 10px;
      border-radius: 5px;
    }

    input[type="submit"] {
      background-color: #ff7f50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 20px;
    }

    input[type="submit"]:hover {
      background-color: #e06645;
    }
  </style>
</head>

<body>
  <form action="../Controller/updateOferta.php" enctype="multipart/form-data" method="POST">
    <h2>Actualizar Oferta</h2>

    <input type="hidden" name="id" value="<?= $data['oferta']->getId() ?>">

    <h3>Título</h3>
    <input type="text" name="titulo" value="<?= $data['oferta']->getTitulo() ?>" required>

    <h3>Imagen actual</h3>
    <input type="hidden" name="imagenAnterior" value="<?= $data['oferta']->getImagen() ?>">
    <img src="../View/images/<?= $data['oferta']->getImagen() ?>" alt="Imagen actual" width="200">

    <h3>Cambiar imagen</h3>
    <input type="file" id="imagen" name="imagen" accept="image/*">

    <h3>Descripción</h3>
    <textarea name="descripcion" rows="6" required><?= trim($data['oferta']->getDescripcion()) ?></textarea>

    <hr>
    <input type="submit" value="Aceptar">
  </form>
</body>

</html>