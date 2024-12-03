# Instalación y configuración básica de nginx
## Moisés Alejandro Luis Herrera
---
1. **Actualizar los paquetes del sistema:**

   Primero, nos aseguramos de que nuestro sistema tenga los paquetes más recientes. Abrimos una terminal y ejecutamos:

   ```bash
   sudo apt update 
   ```
---
2. **Instalar NGINX:**

   Luego, instalamos NGINX con el siguiente comando:

   ```bash
   sudo apt install nginx -y
   ```

   Una vez que se complete la instalación, podemos verificar que el servicio está funcionando con:

   ```bash
   sudo systemctl status nginx
   ```

   Deberíamos ver algo que indique que el servicio está activo y ejecutándose.
---
3. **Acceder al directorio de configuración y archivos:**

   Ahora nos dirigimos al directorio donde NGINX guarda los archivos predeterminados del servidor web. Este suele ser `/var/www/html`. Usamos el siguiente comando para acceder:

   ```bash
   cd /var/www/html
   ```
---
4. **Editar el archivo `index.html`:**

   Aquí es donde modificaremos el archivo principal. Si ya existe un archivo `index.html`, podemos editarlo directamente con nuestro editor de texto favorito. Por ejemplo, con `nano`:

   ```bash
   sudo nano index.html
   ```

   Dentro de este archivo, escribimos o modificamos el contenido HTML que queremos mostrar. Por ejemplo, podríamos cambiar el contenido a algo simple:

   ```html
   <!DOCTYPE html>
   <html>
   <head>
       <title>Bienvenidos a nuestro sitio</title>
   </head>
   <body>
       <h1>¡Hola! Bienvenidos a nuestra página servida con NGINX.</h1>
   </body>
   </html>
   ```

   Guardamos los cambios presionando `Ctrl + O`, luego `Enter` y finalmente salimos con `Ctrl + X`.
---
5. **Reiniciar NGINX (opcional):**

   Si realizamos cambios significativos en la configuración o simplemente queremos asegurarnos de que todo esté actualizado, reiniciamos el servicio:

   ```bash
   sudo systemctl restart nginx
   ```
---
6. **Sites-available y sites-enabled**

    * `sites-availables`: Aquí se almacenan todos los archivos de configuración de sitios disponibles en el servidor. Cada archivo define un "bloque de servidor" (virtual host), indicando configuraciones como dominios, puertos, rutas, etc. Por ejemplo, podríamos tener un archivo llamado `/etc/nginx/sites-available/misitio`.
    * `sites-enabled`: Aquí se almacenan enlaces simbólicos a los sitios activos. Solo los sitios con configuraciones enlazadas en este directorio serán gestionados por Nginx.