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
        header('Location: index.php');
    } else {
        echo "<h1>Error al guardar el usuario: " . mysqli_error($conn) . "</h1>";
    }

    // Cerramos la conexión
    mysqli_close($conn);
?>