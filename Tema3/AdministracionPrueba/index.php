<?php
    // Conexión a la base de datos
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'prueba');

    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Consulta para obtener todos los usuarios
    $select = "SELECT * FROM users";
    $result = mysqli_query($conn, $select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="users">
        <h1>Lista de Usuarios</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <a href='delete.php?id={$row['id']}'>Eliminar</a>
                        </td>
                    </tr>";
            }
            ?>
        </table>
    </div>

    <div class="forms">
        <div class="create">
            <h1>Crear Usuario</h1>
            <form action="create.php" method="post">
                <label for="nombre">Nombre: </label><input type="text" name="nombre" required>
                <br>
                <label for="email">Email: </label><input type="email" name="email" required>
                <br>
                <input type="submit" value="Crear" name="enviar">
            </form>
        </div>

        <div class="update">
            <h1>Editar Usuario</h1>
            <form action="update.php" method="post">
                <label for="id">ID: </label><input type="number" name="id"><br>
                <label for="nombre">Nombre: </label><input type="text" name="nombre" required>
                <br>
                <label for="email">Email: </label><input type="email" name="email" required>
                <br>
                <input type="submit" value="Actualizar">
            </form>
        </div>
    </div>
</body>
</html>

<?php
    // Cerramos la conexión
    mysqli_close($conn);
?>
