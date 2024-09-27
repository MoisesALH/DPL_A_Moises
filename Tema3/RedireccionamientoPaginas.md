# Redireccionar Páginas entre Archivos PHP
## Moisés Alejandro Luis Herrera
---
Cuando queremos redireccionar a otra página en un proyecto PHP, seguimos unos pasos sencillos. Aquí están los pasos que realizamos, junto con ejemplos:

## 1. Usar la Función `header()`

Debemos de utilizar la función `header()` de PHP, que nos permite enviar encabezados HTTP al navegador. Es importante recordar que esta función debe ser llamada antes de que se envíe cualquier salida al navegador.

### Ejemplo

Si queremos redireccionar desde `pagina1.php` a `pagina2.php`, escribimos lo siguiente en `pagina1.php`:

```php
<?php
// Redireccionamos a pagina2.php
header("Location: pagina2.php");
exit(); // Aseguramos que el script se detenga aquí
?>
```

## 2. Asegurarnos de no tener Salida Antes de `header()`

Es fundamental que no haya ninguna salida (como HTML o incluso espacios en blanco) antes de llamar a `header()`. Si hay salida, obtendremos un error.

### Ejemplo Incorrecto

```php
<?php
echo "Redirigiendo..."; // Esto causará un error
header("Location: pagina2.php");
exit();
?>
```

## 3. Usar Código de Estado HTTP (Opcional)

Podemos especificar un código de estado HTTP opcional en la redirección. Por ejemplo, `302` es el código por defecto para una redirección temporal, y `301` es para redirecciones permanentes.

### Ejemplo

Para una redirección permanente:

```php
<?php
header("Location: pagina2.php", true, 301);
exit();
?>
```

## 4. Verificar el Funcionamiento

Después de implementar la redirección, debemos probarla. Accedemos a `pagina1.php` y verificamos si somos llevados a `pagina2.php` correctamente.