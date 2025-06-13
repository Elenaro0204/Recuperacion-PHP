<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Asignatura</title>
  <style>
    /* Reset básico */
    *, *::before, *::after {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 20px;
      background: linear-gradient(135deg, #e0eafc, #cfdef3);
      color: #333;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    form {
      background-color: #fff;
      padding: 30px 40px;
      border-radius: 16px;
      max-width: 480px;
      width: 100%;
      box-shadow:
        0 10px 15px rgba(0, 0, 0, 0.1),
        0 4px 6px rgba(0, 0, 0, 0.05);
      transition: box-shadow 0.3s ease;
    }

    form:hover,
    form:focus-within {
      box-shadow:
        0 15px 30px rgba(0, 0, 0, 0.15),
        0 6px 10px rgba(0, 0, 0, 0.08);
    }

    h2 {
      color: #2c3e50;
      margin: 0 0 25px;
      font-weight: 700;
      font-size: 2.2rem;
      text-align: center;
      letter-spacing: 1px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 600;
      font-size: 1rem;
      color: #555;
      user-select: none;
    }

    input[type="text"] {
      width: 100%;
      padding: 14px 18px;
      font-size: 1rem;
      border: 2px solid #ccc;
      border-radius: 10px;
      margin-bottom: 24px;
      font-family: inherit;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
      outline-offset: 2px;
    }

    input[type="text"]:focus {
      border-color: #336699;
      box-shadow: 0 0 8px #a3c1e5;
      outline: none;
    }

    input[readonly] {
      background-color: #f4f6f8;
      color: #999;
      cursor: not-allowed;
    }

    input[type="submit"] {
      display: block;
      width: 100%;
      max-width: 320px;
      margin: 0 auto;
      padding: 14px 0;
      background-color: #336699;
      border: none;
      border-radius: 12px;
      color: #fff;
      font-size: 1.15rem;
      font-weight: 700;
      cursor: pointer;
      letter-spacing: 0.8px;
      transition: background-color 0.3s ease, box-shadow 0.2s ease;
      user-select: none;
      box-shadow: 0 5px 12px rgba(51, 102, 153, 0.3);
    }

    input[type="submit"]:hover,
    input[type="submit"]:focus {
      background-color: #254d73;
      box-shadow: 0 8px 16px rgba(37, 77, 115, 0.5);
      outline: none;
    }

    /* Responsive */
    @media (max-width: 520px) {
      form {
        padding: 25px 30px;
      }
    }
  </style>
</head>

<body>
  <form action="../Controller/updateAsignatura.php" method="POST" novalidate>
    <h2>Editar Asignatura</h2>

    <label for="codigo">Código</label>
    <input type="text" id="codigo" name="codigo" value="<?= htmlspecialchars($data['asignatura']->getCodigo()) ?>" readonly aria-readonly="true" />

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($data['asignatura']->getNombre()) ?>" required minlength="2" maxlength="100" aria-required="true" />

    <input type="submit" value="Actualizar Asignatura" />
  </form>
</body>

</html>
