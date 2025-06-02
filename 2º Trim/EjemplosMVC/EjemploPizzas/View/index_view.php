<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de ofertas - Pizzería Peachepe</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      padding: 0;
    }

    h1 {
      color: #ff7f50;
    }

    .oferta {
      margin-bottom: 20px;
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 5px;
    }

    .oferta img {
      max-width: 100%;
      height: auto;
      margin-bottom: 10px;
      border-radius: 5px;
    }

    .acciones {
      margin-top: 10px;
    }

    .acciones a {
      display: inline-block;
      padding: 5px 10px;
      margin-right: 10px;
      text-decoration: none;
      color: #333;
      border: 1px solid #333;
      border-radius: 5px;
    }

    .acciones a:hover {
      background-color: #333;
      color: #fff;
    }
  </style>
</head>

<body>
  <h1>Pizzería Peachepe</h1>
  <a href="../Controller/nuevaOferta.php" style="text-decoration: none; color: #333; padding: 5px 10px; background-color: #ff7f50; border-radius: 5px;">Nueva oferta</a>
  <hr>
  <?php foreach ($data['ofertas'] as $oferta) { ?>
    <div class="oferta">
      <h3><?= $oferta->getTitulo() ?></h3>
      <img src="../View/images/<?= $oferta->getImagen() ?>" alt="<?= $oferta->getTitulo() ?>" width="400">
      <p><?= $oferta->getDescripcion() ?></p>
      <div class="acciones">
        <a href="../Controller/actualizaOferta.php?id=<?= $oferta->getId() ?>">Actualizar</a>
        <a href="../Controller/borraOferta.php?id=<?= $oferta->getId() ?>">Borrar</a>
      </div>
    </div>
  <?php } ?>
</body>

</html>