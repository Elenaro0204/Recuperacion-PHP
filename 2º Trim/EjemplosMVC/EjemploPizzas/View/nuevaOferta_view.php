<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Nueva Oferta - Pizzería Peachepe</title>
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
  <form action="../Controller/grabaOferta.php" enctype="multipart/form-data" method="POST">
    <h2>Nueva Oferta</h2>
    <h3>Título</h3>
    <input type="text" name="titulo" required>

    <h3>Imagen</h3>
    <input type="file" id="imagen" name="imagen" accept="image/*" required>

    <h3>Descripción</h3>
    <textarea name="descripcion" rows="6" required></textarea>

    <hr>
    <input type="submit" value="Aceptar">
  </form>
</body>

</html>