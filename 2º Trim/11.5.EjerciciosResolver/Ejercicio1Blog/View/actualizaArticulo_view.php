<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Actualizar Articulo - Blog</title>
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
    input[type="date"],
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
    input[type="date"]:focus,
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
  <form action="../Controller/updateArticulo.php" enctype="multipart/form-data" method="POST">
    <h2>Actualizar Articulo</h2>

    <input type="hidden" name="id" value="<?= $data['articulo']->getId() ?>">

    <label for="titulo">Título</label>
    <input type="text" id="titulo" name="titulo" value="<?= $data['articulo']->getTitulo() ?>" required>

    <label>Fecha actual</label>
    <?php
    $fechaCompleta = $data['articulo']->getFecha();
    // Convertimos el formato "d/m/Y - H:i" a "Y-m-d H:i:s"
    $fechaObj = DateTime::createFromFormat('d/m/Y - H:i', $fechaCompleta);
    if ($fechaObj) {
      $fechaSolo = $fechaObj->format('d/m/Y H:i:s');
    } else {
      $fechaSolo = 'Fecha inválida';
    }
    ?>
    <input type="text" name="fechaAnterior" value="<?= $fechaSolo ?>" readonly="readonly" require>


    <label for="contenido">Contenido</label>
    <textarea id="contenido" name="contenido" rows="6" required><?= trim($data['articulo']->getContenido()) ?></textarea>

    <hr>
    <input type="submit" value="Aceptar">
  </form>
</body>

</html>