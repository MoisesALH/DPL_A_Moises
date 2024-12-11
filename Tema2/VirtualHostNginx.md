# Instalar host virtuales en nginx
## Moisés Alejandro Luis Herrera
---

### Paso 1: Crear el directorio raíz del sitio
Primero, necesitamos un directorio donde estarán los archivos de nuestro sitio web. Lo creamos con:

```bash
sudo mkdir -p /var/www/misitio.com
```

A continuación, asignamos los permisos adecuados para que podamos trabajar cómodamente con los archivos:

```bash
sudo chown -R $USER:$USER /var/www/misitio.com
```

Para probar, creamos un archivo `index.html` con contenido básico dentro de este directorio:

```bash
echo "<h1>Bienvenidos a misitio.com</h1>" > /var/www/misitio.com/index.html
```

---

### Paso 2: Crear el archivo de configuración para el host virtual
En Nginx, los archivos de configuración de sitios web suelen estar en el directorio `/etc/nginx/sites-available`. Creamos uno para nuestro sitio:

```bash
sudo nano /etc/nginx/sites-available/misitio.com
```

Dentro del archivo, agregamos la siguiente configuración:

```nginx
server {
    listen 80;
    server_name misitio.com www.misitio.com;

    root /var/www/misitio.com;
    index index.html;

    location / {
        try_files $uri $uri/ =404;
    }
}
```

Esto le dice a Nginx que escuche en el puerto 80 y sirva el contenido del directorio `/var/www/misitio.com` cuando alguien visite `misitio.com` o `www.misitio.com`.

---

### Paso 3: Activar el host virtual
Para activar nuestro host virtual, creamos un enlace simbólico desde `sites-available` a `sites-enabled`:

```bash
sudo ln -s /etc/nginx/sites-available/misitio.com /etc/nginx/sites-enabled/
```

Esto permite que Nginx cargue la configuración del sitio.

---

### Paso 4: Probar y recargar la configuración de Nginx
Siempre verificamos que la configuración de Nginx no tenga errores antes de recargarlo:

```bash
sudo nginx -t
```

Si todo está bien, recargamos Nginx para aplicar los cambios:

```bash
sudo systemctl reload nginx
```

---

### Paso 5: Configurar el archivo `hosts` (opcional para pruebas locales)
Si estamos trabajando en un entorno local y aún no tenemos un dominio público configurado, añadimos una entrada en el archivo `hosts` para apuntar el nombre del dominio a nuestra máquina:

1. Abrimos el archivo `hosts`:
   ```bash
   sudo nano /etc/hosts
   ```

2. Añadimos esta línea:
   ```
   127.0.0.1 misitio.com www.misitio.com
   ```