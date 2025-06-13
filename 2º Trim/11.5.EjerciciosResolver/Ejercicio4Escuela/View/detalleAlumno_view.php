<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Detalles del Alumno</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f2f5;
      color: #2c3e50;
      margin: 0;
      padding: 20px;
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
    }

    h1 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 40px;
      font-size: 2em;
    }

    h2 {
      color: #34495e;
      margin-bottom: 15px;
      border-left: 5px solid #2980b9;
      padding-left: 10px;
    }

    .acciones {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-bottom: 30px;
    }

    .acciones a {
      text-decoration: none;
      background-color: #3498db;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      transition: background-color 0.3s ease;
      font-weight: 600;
    }

    .acciones a:hover {
      background-color: #2980b9;
    }

    ul {
      list-style-type: none;
      padding-left: 0;
      margin-bottom: 30px;
    }

    ul li {
      background: #ffffff;
      margin-bottom: 10px;
      padding: 14px 18px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    ul li a {
      text-decoration: none;
      color: #e74c3c;
      border: 1px solid #e74c3c;
      padding: 6px 12px;
      border-radius: 6px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    ul li a:hover {
      background-color: #e74c3c;
      color: white;
    }

    form {
      background: #ffffff;
      padding: 25px 20px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    select {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1em;
      margin-bottom: 20px;
      box-sizing: border-box;
      transition: border-color 0.3s ease;
    }

    select:focus {
      border-color: #2980b9;
      outline: none;
    }

    input[type="submit"] {
      background-color: #27ae60;
      color: white;
      border: none;
      padding: 12px;
      font-size: 1em;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      width: 100%;
      font-weight: bold;
    }

    input[type="submit"]:hover {
      background-color: #1e8449;
    }

    em {
      display: block;
      text-align: center;
      color: #888;
      margin-bottom: 30px;
    }
  </style>
</head>

<body>
  <h1>Asignaturas de <?= htmlspecialchars($data['alumno']->getNombre()) ?></h1>

  <div class="acciones">
    <a href="../Controller/index.php">← Ver Alumnos</a>
    <a href="../Controller/listadoAsignaturas.php">📘 Ver Asignaturas</a>
  </div>

  <h2>Asignaturas matriculadas</h2>
  <?php if (count($data['asignaturasMatriculadas']) > 0): ?>
    <ul>
      <?php foreach ($data['asignaturasMatriculadas'] as $asignatura): ?>
        <li>
          <?= htmlspecialchars($asignatura->getNombre()) ?>
          <a href="desmatricularAsignatura.php?matricula=<?= urlencode($data['alumno']->getMatricula()) ?>&codigo_asignatura=<?= urlencode($asignatura->getCodigo()) ?>">Desmatricular</a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <em>Este alumno no está matriculado en ninguna asignatura.</em>
  <?php endif; ?>

  <h2>Matricular en una nueva asignatura</h2>
  <form action="matricularAsignatura.php" method="POST">
    <input type="hidden" name="matricula" value="<?= htmlspecialchars($data['alumno']->getMatricula()) ?>" />
    <?php
    // Evitar mostrar asignaturas repetidas
    $codigosMatriculados = array_map(fn($asig) => $asig->getCodigo(), $data['asignaturasMatriculadas']);
    ?>
    <select name="codigo_asignatura" required>
      <?php foreach ($data['todasAsignaturas'] as $asig): ?>
        <?php if (!in_array($asig->getCodigo(), $codigosMatriculados)): ?>
          <option value="<?= $asig->getCodigo() ?>"><?= htmlspecialchars($asig->getNombre()) ?></option>
        <?php endif; ?>
      <?php endforeach; ?>
    </select>
    <input type="submit" value="Matricular" />
  </form>
</body>

</html>
