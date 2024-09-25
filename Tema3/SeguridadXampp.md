# Securizar servidor Xampp
## Moisés Alejandro Luis Herrera
---
### 1. Cambiar la contraseña del usuario root en MySQL
El primer paso consiste en asignar una contraseña al usuario **root**, que por defecto no la tiene. Esto se puede hacer directamente desde **phpMyAdmin**:

- Iniciamos **XAMPP** y nos aseguramos de que el servicio de **MySQL** esté activo.
- Accedemos a **phpMyAdmin** abriendo nuestro navegador e ingresando la dirección: `http://localhost/phpmyadmin`.
- Una vez dentro, vamos a la pestaña **Usuarios**.
- Localizamos al usuario **root**.
- Editamos el usuario **root** para la entrada que corresponde a `localhost`.
- Cambiamos la contraseña ingresando una nueva y guardamos los cambios.

### 2. Configurar phpMyAdmin para solicitar credenciales
Ahora necesitamos modificar el archivo de configuración de phpMyAdmin para que nos pida usuario y contraseña cada vez que intentemos acceder.

- Vamos al directorio donde está instalado **XAMPP**. Normalmente, es algo como `C:\xampp\phpMyAdmin\` en Windows.
- Localizamos y abrimos el archivo `config.inc.php` con un editor de texto.
- Buscamos la línea que contiene `$cfg['Servers'][$i]['auth_type']` y cambiamos el valor `http`. Esto hará que phpMyAdmin nos pida las credenciales al intentar acceder.

```php
$cfg['Servers'][$i]['auth_type'] = 'http';
```

- Guardamos los cambios y cerramos el archivo.

### 3. Crear un nuevo usuario en MySQL
El siguiente paso es crear un nuevo usuario en MySQL, que utilizaremos para conectarnos a nuestras bases de datos de manera más segura.

- Volvemos a **phpMyAdmin** y nos dirigimos nuevamente a la pestaña **Usuarios**.
- Hacemos clic en **Agregar usuario nuevo**.
- Asignamos un nombre de usuario, especificamos el host (usualmente `localhost`), y creamos una contraseña segura.
- Seleccionamos los permisos que queremos otorgar a este nuevo usuario. Si solo queremos que tenga acceso a ciertas bases de datos, seleccionamos las opciones adecuadas.
- Guardamos el nuevo usuario.