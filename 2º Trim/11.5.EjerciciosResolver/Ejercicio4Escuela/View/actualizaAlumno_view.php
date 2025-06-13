<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Editar Alumno</title>
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
    select {
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
    }

    input[type="text"]:focus,
    select:focus {
      border-color: #336699;
      outline: none;
      box-shadow: 0 0 6px #a3c1e5;
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
  <form action="../Controller/updateAlumno.php" method="POST">
    <h2>Editar Alumno</h2>

    <label for="matricula">Matrícula</label>
    <input type="text" id="matricula" name="matricula" value="<?= $data['alumno']->getMatricula() ?>" readonly>

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="<?= $data['alumno']->getNombre() ?>" required>

    <label for="apellidos">Apellidos</label>
    <input type="text" id="apellidos" name="apellidos" value="<?= $data['alumno']->getApellidos() ?>" required>

    <label for="curso">Curso</label>
    <input type="text" id="curso" name="curso" value="<?= $data['alumno']->getCurso() ?>" required>

    <input type="submit" value="Actualizar Alumno">
  </form>
</body>

</html>
