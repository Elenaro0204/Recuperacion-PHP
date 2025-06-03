<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Blog</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      padding: 0;
    }

    h1 {
      color: #336699;
    }

    .articulo {
      margin-bottom: 20px;
      border: 1px solid #ccc;
      padding: 15px;
      border-radius: 5px;
      background-color: #f9f9f9;
    }

    .articulo h3 {
      margin-top: 0;
    }

    .fecha {
      font-size: 0.9em;
      color: #888;
      margin-bottom: 10px;
    }

    .acciones {
      margin-top: 15px;
    }

    .acciones a {
      display: inline-block;
      padding: 5px 10px;
      margin-right: 10px;
      text-decoration: none;
      color: #336699;
      border: 1px solid #336699;
      border-radius: 5px;
    }

    .acciones a:hover {
      background-color: #336699;
      color: #fff;
    }

    .nuevo-articulo {
      text-decoration: none;
      color: white;
      padding: 8px 15px;
      background-color: #28a745;
      border-radius: 5px;
    }

    .nuevo-articulo:hover {
      background-color: #218838;
    }

    footer {
      margin-top: 40px;
      border-top: 1px solid #ccc;
      padding-top: 10px;
      font-size: 0.8em;
      color: #666;
    }
  </style>
</head>

<body>
  <h1>Mi Blog Personal</h1>
  <a href="../Controller/nuevoArticulo.php" class="nuevo-articulo">Nuevo artículo</a>
  <hr>

  <?php foreach ($data['articulos'] as $articulo) { ?>
    <div class="articulo">
      <h3><?= $articulo->getTitulo() ?></h3>
      <div class="fecha">Publicado el <?= $articulo->getFecha() ?></div>
      <p><?= nl2br($articulo->getContenido()) ?></p> <!--nl2br hace que los saltos de linea se mantengan-->
      <div class="acciones">
        <a href="../Controller/actualizaArticulo.php?id=<?= $articulo->getId() ?>">Actualizar</a>
        <a href="../Controller/borraArticulo.php?id=<?= $articulo->getId() ?>">Borrar</a>
      </div>
    </div>
  <?php } ?>

  <footer>
    &copy; <?= date("Y") ?> Mi Blog. Todos los derechos reservados.
  </footer>
</body>

</html>