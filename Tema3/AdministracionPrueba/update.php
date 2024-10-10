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
        header('Location: index.php');
    } else {
        echo "<h1>Error al actualizar el usuario: " . mysqli_error($conn) . "</h1>";
    }

    // Cerramos la conexión
    mysqli_close($conn);
?>