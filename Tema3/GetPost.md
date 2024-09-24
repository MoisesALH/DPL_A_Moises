# Métodos GET y POST para pasar variables desde formularios:
## Moisés Alejandro Luis Herrera
--- 
### Características

1. **GET**:
   - Se usa la URL para enviar las variables. Los datos declaran en la URL como parámetros.
   - Los datos enviados son visibles en la barra de direcciones del navegador, por lo que no es seguro para enviar información sensible.
   - Es útil para enviar pequeñas cantidades de datos, como filtros o búsquedas.
   
2. **POST**:
   - Envía los datos en el cuerpo de la solicitud HTTP, no son visibles en la URL.
   - Es más seguro que GET para enviar información sensible.
   - Puede enviar una mayor cantidad de datos, incluyendo archivos.

### Ejemplo

#### 1. Formulario (`index.php`):

```html
<form action="get-post.php" method="post" enctype="multipart/form-data">
    <label for="usuario">Nombre: </label>
    <input type="text" name="usuario">
    <br>
    <label for="fichero">Fichero: </label>
    <input type="file" name="fichero" id="fichero">
    <input type="submit" value="enviar" name="enviar">
</form>
```

Este formulario envía dos variables al archivo `get-post.php` mediante `POST`:
- Un campo de texto `usuario`.
- Un archivo `fichero`.

El atributo `enctype="multipart/form-data"` es necesario para que el formulario pueda enviar archivos.

#### 2. Procesamiento de los datos (`get-post.php`):

```php
<?php
    print_r($_POST["usuario"]);
    echo "<br>";
    print_r($_FILES);
    echo "<br>";
    print_r($_FILES["fichero"]["name"]);
?>
```

- `$_POST["usuario"]`: Obtiene el valor del campo `usuario` enviado.
- `$_FILES`: Contiene la información del archivo enviado.
- `$_FILES["fichero"]["name"]`: Muestra el nombre del archivo subido.

### Pasos a realizar para procesar formularios con GET y POST:

#### Para `GET`:
1. Configuramos el atributo `method="get"` en el formulario.
2. Los datos serán enviados en la URL como parámetros (ej: `get-post.php?usuario=Juan`).
3. En PHP, usamos `$_GET["campo"]` para obtener los datos enviados.

#### Para `POST`:
1. Configura el atributo `method="post"` en el formulario.
2. Envía los datos a través del cuerpo de la solicitud HTTP.
3. En PHP, usa `$_POST["campo"]` para acceder a los datos enviados.
4. Si estás enviando archivos, asegúrate de configurar `enctype="multipart/form-data"`, y usa `$_FILES` para acceder a la información del archivo.