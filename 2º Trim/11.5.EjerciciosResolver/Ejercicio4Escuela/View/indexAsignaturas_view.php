<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Listado de Asignaturas</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 30px;
      background-color: #f9fafb;
      color: #1e293b;
    }

    h1 {
      text-align: center;
      font-weight: 700;
      font-size: 2.4rem;
      margin-bottom: 50px;
      color: #0f172a;
      letter-spacing: 0.03em;
    }

    .nav-actions {
      display: flex;
      justify-content: center;
      gap: 16px;
      margin-bottom: 40px;
      flex-wrap: wrap;
    }

    .nav-actions a {
      background-color: #2563eb;
      color: white;
      padding: 14px 24px;
      border-radius: 6px;
      font-weight: 600;
      font-size: 1.05rem;
      text-decoration: none;
      box-shadow: 0 3px 7px rgb(37 99 235 / 0.3);
      transition: background-color 0.25s ease;
    }

    .nav-actions a:hover {
      background-color: #1e40af;
    }

    .cards-container {
      max-width: 720px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 18px;
    }

    .card {
      background-color: white;
      border-radius: 12px;
      padding: 18px 24px;
      box-shadow: 0 2px 10px rgb(0 0 0 / 0.07);
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: box-shadow 0.3s ease;
    }

    .card:hover {
      box-shadow: 0 4px 16px rgb(37 99 235 / 0.25);
    }

    .info {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .codigo {
      font-weight: 700;
      font-size: 1.15rem;
      color: #1e293b;
    }

    .nombre {
      font-size: 1rem;
      color: #475569;
    }

    .actions {
      display: flex;
      gap: 14px;
    }

    .actions a {
      background-color: #2563eb;
      color: white;
      padding: 8px 14px;
      border-radius: 6px;
      font-weight: 600;
      font-size: 0.9rem;
      text-decoration: none;
      box-shadow: 0 2px 7px rgb(37 99 235 / 0.4);
      transition: background-color 0.3s ease;
      user-select: none;
    }

    .actions a.delete {
      background-color: #dc2626;
      box-shadow: 0 2px 7px rgb(220 38 38 / 0.4);
    }

    .actions a:hover {
      background-color: #1e40af;
    }

    .actions a.delete:hover {
      background-color: #991b1b;
    }

    footer {
      margin-top: 60px;
      text-align: center;
      font-size: 0.9rem;
      color: #64748b;
      padding-top: 20px;
      border-top: 1px solid #cbd5e1;
    }

    /* Responsive */
    @media (max-width: 480px) {
      body {
        padding: 20px 15px;
      }

      .cards-container {
        max-width: 100%;
      }

      .card {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
      }

      .actions {
        width: 100%;
        justify-content: flex-start;
      }

      .actions a {
        flex: 1;
        text-align: center;
      }
    }
  </style>
</head>

<body>
  <h1>Listado de Asignaturas</h1>

  <nav class="nav-actions">
    <a href="../Controller/index.php">Ver Alumnos</a>
    <a href="../Controller/nuevaAsignatura.php">Añadir Asignatura</a>
  </nav>

  <section class="cards-container">
    <?php foreach ($data['asignaturas'] as $asignatura) { ?>
      <article class="card">
        <div class="info">
          <span class="codigo"><?= htmlspecialchars($asignatura->getCodigo()) ?></span>
          <span class="nombre"><?= htmlspecialchars($asignatura->getNombre()) ?></span>
        </div>
        <div class="actions">
          <a href="actualizaAsignatura.php?codigo=<?= urlencode($asignatura->getCodigo()) ?>" title="Editar">Editar</a>
          <a href="borraAsignatura.php?codigo=<?= urlencode($asignatura->getCodigo()) ?>" title="Eliminar" class="delete" onclick="return confirm('¿Seguro que quieres eliminar esta asignatura?');">Eliminar</a>
        </div>
      </article>
    <?php } ?>
  </section>

  <footer>
    &copy; <?= date("Y") ?> Escuela. Todos los derechos reservados.
  </footer>
</body>

</html>
