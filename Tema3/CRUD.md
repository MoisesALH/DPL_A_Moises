# Inserción, lectura, modificación y borrado de registros con **PHP (mysqli)**
## Moisés Alejandro Luis Herrera
---

#### 1. Insertar registros en la tabla con **PHP**:

Para insertar un registro en la tabla que hemos creado (por ejemplo, la tabla `users`), podemos hacerlo utilizando la siguiente estructura en PHP con **mysqli**.

```php
<?php
// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "prueba";

$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificamos si la conexión es exitosa
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Insertar un nuevo user
$sql = "INSERT INTO users (nombre, correo) VALUES ('Perry', 'perry@gmail.com')";

if (mysqli_query($conexion, $sql)) {
    echo "Registro insertado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
```

Este codigo inserta un nuevo user en la tabla **users**. Si la inserción es exitosa, se mostrará el mensaje "Registro insertado exitosamente".

#### 2. Leer registros de la base de datos (consulta) con **PHP**:

Ahora vamos a leer los registros de la tabla **users** usando una consulta `SELECT` en **PHP**.

```php
<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "tienda_online");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Consulta para obtener los users
$sql = "SELECT * FROM users";
$resultado = $conexion->query($sql);

// Verificamos si hay resultados
if ($resultado->num_rows > 0) {
    // Imprimimos cada fila de la consulta
    while($fila = $resultado->fetch_assoc()) {
        echo "ID: " . $fila["id"]. " - Nombre: " . $fila["nombre"]. " - email: $" . $fila["email"]. " - created: " . $fila["created"]. "<br>";
    }
} else {
    echo "No hay registros en la tabla";
}

// Cerramos la conexión
$conexion->close();
?>
```

En este codigo, realizamos una consulta para obtener todos los users de la tabla y mostramos sus detalles. Si no hay users, se muestra el mensaje "No hay registros en la tabla".

#### 3. Modificar registros en la base de datos con **PHP**:

Para modificar un registro (por ejemplo, actualizar el email de un user), utilizamos una sentencia `UPDATE` en **PHP**.

```php
<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "tienda_online");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Actualizamos el email y created de un user
$sql = "UPDATE users SET email=puerro@gmail.com WHERE nombre='Perry'";

if (mysqli_query($conexion, $sql)) {
    echo "Registro actualizado correctamente";
} else {
    echo "Error actualizando el registro: " . $conexion->error;
}

// Cerramos la conexión
$conexion->close();
?>
```

Aquí actualizamos el email y created del user cuyo nombre es "Perry". Si la operación es exitosa, veremos el mensaje "Registro actualizado correctamente".

#### 4. Borrar registros en la base de datos con **PHP**:

Para eliminar un registro de la tabla **users**, usamos la sentencia `DELETE` en **PHP**.

```php
<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "tienda_online");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Borramos el user con nombre "Mouse"
$sql = "DELETE FROM users WHERE nombre='Perry'";

if (mysqli_query($conexion, $sql)) {
    echo "Registro eliminado correctamente";
} else {
    echo "Error eliminando el registro: " . $conexion->error;
}

// Cerramos la conexión
$conexion->close();
?>
```

Este codigo borra el user "Mouse" de la tabla **users**. Si se ejecuta correctamente, se mostrará el mensaje "Registro eliminado correctamente".