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
        header('Location: index.php');
    } else {
        echo "<h1>Error al eliminar el usuario: " . mysqli_error($conn) . "</h1>";
    }

    // Cerramos la conexión
    mysqli_close($conn);
?>