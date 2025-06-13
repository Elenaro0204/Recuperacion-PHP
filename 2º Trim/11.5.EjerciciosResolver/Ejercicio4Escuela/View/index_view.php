<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Listado de Alumnos</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 30px;
      background-color: #f0f2f5;
      color: #333;
    }

    h1 {
      color: #2c3e50;
      text-align: center;
      margin-bottom: 40px;
      font-size: 2em;
      font-weight: 700;
    }

    .acciones {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-bottom: 30px;
      flex-wrap: wrap;
    }

    .acciones a {
      padding: 12px 28px;
      text-decoration: none;
      color: white;
      background-color: #3498db;
      border-radius: 8px;
      font-weight: 700;
      font-size: 1rem;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 8px rgba(52, 152, 219, 0.3);
      user-select: none;
    }

    .acciones a:hover,
    .acciones a:focus-visible {
      background-color: #2980b9;
      box-shadow: 0 6px 14px rgba(41, 128, 185, 0.6);
      outline: none;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 8px; /* separa filas para efecto "card" */
      background-color: transparent;
    }

    thead tr th {
      background-color: #f8f9fa;
      font-weight: 700;
      color: #34495e;
      padding: 16px 20px;
      text-align: left;
      border-radius: 10px 10px 0 0;
      border-bottom: 2px solid #e1e4e8;
      user-select: none;
    }

    tbody tr {
      background-color: #fff;
      box-shadow: 0 2px 6px rgb(0 0 0 / 0.08);
      transition: box-shadow 0.25s ease, transform 0.2s ease;
      border-radius: 10px;
    }

    tbody tr:hover,
    tbody tr:focus-within {
      box-shadow: 0 6px 18px rgb(52 152 219 / 0.25);
      transform: translateY(-3px);
      outline: none;
    }

    tbody tr td {
      padding: 16px 20px;
      vertical-align: middle;
      border-bottom: none; /* elimina línea entre filas */
      color: #2c3e50;
      font-size: 1rem;
    }

    tbody tr td:last-child {
      display: flex;
      gap: 10px;
      justify-content: flex-start;
      flex-wrap: wrap;
    }

    .btn {
      display: inline-block;
      padding: 8px 16px;
      font-size: 0.9rem;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 600;
      transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
      user-select: none;
      cursor: pointer;
      border: 2px solid transparent;
      white-space: nowrap;
    }

    .btn-detalles {
      color: #2980b9;
      border-color: #2980b9;
      background-color: transparent;
      box-shadow: inset 0 0 0 0 #2980b9;
    }

    .btn-detalles:hover,
    .btn-detalles:focus-visible {
      background-color: #2980b9;
      color: white;
      box-shadow: 0 4px 12px rgba(41, 128, 185, 0.6);
      outline: none;
    }

    .btn-editar {
      color: #e67e22;
      border-color: #e67e22;
      background-color: transparent;
      box-shadow: inset 0 0 0 0 #e67e22;
    }

    .btn-editar:hover,
    .btn-editar:focus-visible {
      background-color: #e67e22;
      color: white;
      box-shadow: 0 4px 12px rgba(230, 126, 34, 0.6);
      outline: none;
    }

    .btn-eliminar {
      color: #c0392b;
      border-color: #c0392b;
      background-color: transparent;
      box-shadow: inset 0 0 0 0 #c0392b;
    }

    .btn-eliminar:hover,
    .btn-eliminar:focus-visible {
      background-color: #c0392b;
      color: white;
      box-shadow: 0 4px 12px rgba(192, 57, 43, 0.6);
      outline: none;
    }

    footer {
      margin-top: 50px;
      text-align: center;
      font-size: 0.85em;
      color: #777;
      padding-top: 20px;
      border-top: 1px solid #ddd;
      user-select: none;
    }

    /* Responsive */
    @media (max-width: 600px) {
      .acciones {
        flex-direction: column;
        align-items: center;
      }

      tbody tr td:last-child {
        justify-content: center;
        gap: 8px;
      }

      .btn {
        padding: 8px 12px;
        font-size: 0.85rem;
      }
    }
  </style>
</head>

<body>
  <h1>Listado de Alumnos</h1>

  <div class="acciones">
    <a href="../Controller/nuevoAlumno.php">➕ Añadir Alumno</a>
    <a href="../Controller/listadoAsignaturas.php">📚 Asignaturas</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>Matrícula</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Curso</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['alumnos'] as $alumno) { ?>
        <tr tabindex="0" class="alumno">
          <td><?= htmlspecialchars($alumno->getMatricula()) ?></td>
          <td><?= htmlspecialchars($alumno->getNombre()) ?></td>
          <td><?= htmlspecialchars($alumno->getApellidos()) ?></td>
          <td><?= htmlspecialchars($alumno->getCurso()) ?></td>
          <td>
            <a class="btn btn-detalles" href="../Controller/detallesAlumno.php?matricula=<?= urlencode($alumno->getMatricula()) ?>">Detalles</a>
            <a class="btn btn-editar" href="../Controller/actualizaAlumno.php?matricula=<?= urlencode($alumno->getMatricula()) ?>">Editar</a>
            <a class="btn btn-eliminar" href="../Controller/borraAlumno.php?matricula=<?= urlencode($alumno->getMatricula()) ?>" onclick="return confirm('¿Seguro que quieres eliminar este alumno?');">Eliminar</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <footer>
    &copy; <?= date("Y") ?> Escuela. Todos los derechos reservados.
  </footer>
</body>

</html>
