# Interfaces de contacto con los ficheros php anteriores
## Moisés Alejandro Luis Herrera
---
### 1. `index.php` - Formulario de creación de usuario

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="insertar.php" method="post">
        <label for="nombre">Nombre: </label><input type="text" name="nombre" required>
        <br>
        <label for="email">Email: </label><input type="email" name="email" required>
        <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>
</html>
```

### 2. `insertar.php` - Insertar datos en la base de datos

```php
<?php
    // Conexión a la base de datos
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'prueba');

    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Recolectamos los datos enviados desde el formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    // Consulta SQL para insertar los datos
    $insert = "INSERT INTO users(nombre, email) VALUES('$nombre', '$email')";

    // Ejecutamos la consulta y verificamos el resultado
    if (mysqli_query($conn, $insert)) {
        echo "<h1>Usuario guardado con éxito</h1>";
    } else {
        echo "<h1>Error al guardar el usuario: " . mysqli_error($conn) . "</h1>";
    }

    // Cerramos la conexión
    mysqli_close($conn);
?>
```

### 3. `read.php` - Mostrar los usuarios guardados

```php
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
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <table border="1">
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
                        <a href='editar.php?id={$row['id']}'>Editar</a> |
                        <a href='eliminar.php?id={$row['id']}'>Eliminar</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
    // Cerramos la conexión
    mysqli_close($conn);
?>
```

### 4. `editar.php` - Formulario para actualizar un usuario

```php
<?php
    // Conexión a la base de datos
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'prueba');

    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Obtenemos el ID del usuario a editar
    $id = $_GET['id'];

    // Consulta para obtener los datos del usuario
    $select = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $select);
    $user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="actualizar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="nombre">Nombre: </label><input type="text" name="nombre" value="<?php echo $user['nombre']; ?>" required>
        <br>
        <label for="email">Email: </label><input type="email" name="email" value="<?php echo $user['email']; ?>" required>
        <br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>

<?php
    // Cerramos la conexión
    mysqli_close($conn);
?>
```

### 5. `actualizar.php` - Actualizar los datos en la base de datos

```php
<?php
    // Conexión a la base de datos
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'prueba');

    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Recolectamos los datos actualizados desde el formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    // Consulta para actualizar los datos
    $update = "UPDATE users SET nombre = '$nombre', email = '$email' WHERE id = $id";

    // Ejecutamos la consulta y verificamos el resultado
    if (mysqli_query($conn, $update)) {
        echo "<h1>Usuario actualizado con éxito</h1>";
    } else {
        echo "<h1>Error al actualizar el usuario: " . mysqli_error($conn) . "</h1>";
    }

    // Cerramos la conexión
    mysqli_close($conn);
?>
```

### 6. `eliminar.php` - Eliminar un usuario

```php
<?php
    // Conexión a la base de datos
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'prueba');

    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Obtenemos el ID del usuario a eliminar
    $id = $_GET['id'];

    // Consulta para eliminar el usuario
    $delete = "DELETE FROM users WHERE id = $id";

    // Ejecutamos la consulta y verificamos el resultado
    if (mysqli_query($conn, $delete)) {
        echo "<h1>Usuario eliminado con éxito</h1>";
    } else {
        echo "<h1>Error al eliminar el usuario: " . mysqli_error($conn) . "</h1>";
    }

    // Cerramos la conexión
    mysqli_close($conn);
?>
```