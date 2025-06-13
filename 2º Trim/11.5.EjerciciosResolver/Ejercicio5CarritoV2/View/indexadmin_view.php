<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Panel Admin - Gestión de Productos</title>
    <style>
        /* Reset básico */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 30px;
            color: #333;
        }

        h2 {
            font-weight: 700;
            color: #222;
            margin-bottom: 15px;
            text-align: center;
        }

        h3 {
            font-weight: 600;
            color: #444;
            margin-bottom: 15px;
            border-bottom: 2px solid #4a90e2;
            padding-bottom: 5px;
            max-width: 400px;
        }

        form {
            background: white;
            max-width: 400px;
            margin-bottom: 40px;
            padding: 20px 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgb(0 0 0 / 0.1);
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-weight: 600;
            color: #555;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            font-size: 1rem;
            border: 1.8px solid #ccc;
            border-radius: 6px;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #4a90e2;
            outline: none;
        }

        button {
            display: inline-block;
            background: #4a90e2;
            color: white;
            font-weight: 700;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.25s ease;
        }

        button:hover {
            background: #357ABD;
        }

        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 40px 0;
            max-width: 900px;
        }

        table {
            width: 100%;
            max-width: 900px;
            border-collapse: separate;
            border-spacing: 0 12px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgb(0 0 0 / 0.1);
            overflow: hidden;
            margin: 0 auto;
        }

        thead tr {
            background: #4a90e2;
            color: white;
            font-weight: 600;
            text-align: left;
        }

        thead th {
            padding: 15px 20px;
        }

        tbody tr {
            background: #fafafa;
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background: #e1eaff;
        }

        tbody td {
            padding: 14px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #eee;
        }

        /* Formularios inline para acciones */
        form.inline {
            display: inline-flex;
            align-items: center;
            margin-right: 8px;
        }

        form.inline input[type="number"] {
            width: 60px;
            margin-right: 8px;
            font-size: 1rem;
            padding: 6px 8px;
        }

        form.inline button {
            padding: 7px 14px;
            font-size: 0.9rem;
            border-radius: 6px;
        }

        form.inline.update button {
            background: #27ae60;
        }

        form.inline.update button:hover {
            background: #1e8449;
        }

        form.inline.delete button {
            background: #e74c3c;
        }

        form.inline.delete button:hover {
            background: #b03a2e;
        }

        a.logout {
            display: block;
            text-align: center;
            margin: 40px auto 0;
            max-width: 900px;
            color: #4a90e2;
            font-weight: 700;
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        a.logout:hover {
            color: #357ABD;
        }
    </style>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <h2>Panel de Administración - Productos</h2>

    <h3>Añadir nuevo producto</h3>
    <form method="POST" action="../Controller/nuevoProducto.php">
        <button type="submit">Añadir producto</button>
    </form>

    <hr />

    <h3>Productos existentes</h3>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['productos'] as $producto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($producto->getCodigo()); ?></td>
                    <td><?php echo htmlspecialchars($producto->getNombre()); ?></td>
                    <td><?php echo number_format($producto->getPrecio(), 2); ?> €</td>
                    <td><?php echo (int)$producto->getStock(); ?></td>
                    <td>
                        <form class="inline update" method="POST" action="../Controller/actualizaProducto.php">
                            <input type="hidden" name="codigo" value="<?php echo $producto->getCodigo(); ?>" />
                            <input type="number" name="stock" min="0" value="<?php echo $producto->getStock(); ?>" required />
                            <button type="submit">Actualizar</button>
                        </form>

                        <form class="inline delete" method="POST" action="../Controller/borraProducto.php"
                            onsubmit="return confirm('¿Seguro que quieres eliminar este producto?');">
                            <input type="hidden" name="codigo" value="<?php echo $producto->getCodigo(); ?>" />
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>