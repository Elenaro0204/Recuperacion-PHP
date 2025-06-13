<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Nueva Asignatura - Escuela</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      padding: 0;
      background-color: #f9f9f9;
    }

    form {
      background-color: #fff;
      padding: 25px;
      border-radius: 10px;
      max-width: 700px;
      margin: 0 auto;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border: 1px solid #ccc;
    }

    h2 {
      color: #336699;
      margin-top: 0;
    }

    label {
      font-weight: bold;
      color: #333;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    textarea {
      resize: vertical;
    }

    input[type="submit"] {
      background-color: #336699;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #254d73;
    }
  </style>
</head>

<body>
  <form action="../Controller/grabaAsignatura.php" method="POST">
    <h2>Nueva Asignatura</h2>

    <h3>Nombre</h3>
    <input type="text" name="nombre"required>

    <input type="submit" value="Añadir Asignatura">
  </form>
</body>

</html>