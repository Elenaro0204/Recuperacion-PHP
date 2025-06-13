<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Iniciar sesión</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 320px;
            text-align: center;
        }

        h2 {
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 6px;
            font-weight: 600;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1.5px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px 0;
            background-color: #007bff;
            border: none;
            color: white;
            font-weight: 700;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: #d93025;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .success-message {
            color: #2e7d32;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .register-link {
            margin-top: 20px;
            font-size: 14px;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>

        <?php if (isset($error)) : ?>
            <p class="error-message"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <?php if (!empty($success)) : ?>
            <p class="success-message"><?php echo $success; ?></p>
        <?php endif; ?>

        <form action="../Controller/login.php" method="POST" autocomplete="off">
            <label for="nombre">Nombre de usuario</label>
            <input type="text" id="nombre" name="nombre" required autofocus />

            <label for="pass">Contraseña</label>
            <input type="password" id="pass" name="pass" required />

            <button type="submit">Entrar</button>
        </form>

        <p class="register-link">¿No tienes cuenta? <a href="../Controller/registrar.php">Regístrate aquí</a></p>
    </div>
</body>

</html>
