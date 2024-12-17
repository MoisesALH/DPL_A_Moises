# Instalar ssl en los host virtuales de la anterior tarea, con OpenSSL
## Moisés Alejandro Luis Herrera
---

### 1. Generar un certificado autofirmado con OpenSSL
Primero, creamos un certificado autofirmado y su clave privada. Ejecutamos el siguiente comando:

```bash
sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
-keyout /etc/ssl/private/empresa2.key \
-out /etc/ssl/certs/empresa2.crt
```

Durante la ejecución, se nos pedirá completar información como:
- **Country Name (2 letter code)**: ES  
- **State or Province Name**: Madrid  
- **Organization Name**: MiEmpresa  
- **Common Name**: empresa2.com  

Una vez completado, tendremos:
- La clave privada: `/etc/ssl/private/empresa2.key`.
- El certificado: `/etc/ssl/certs/empresa2.crt`.

---

### 2. Configurar el host virtual en Nginx
Abrimos el archivo de configuración del sitio web para `empresa2.com`:

```bash
sudo nano /etc/nginx/sites-available/empresa2.com
```

Editamos el bloque `server` para habilitar SSL:

```nginx
server {
    listen 443 ssl;
    server_name empresa2.com www.empresa2.com;

    ssl_certificate /etc/ssl/certs/empresa2.crt;
    ssl_certificate_key /etc/ssl/private/empresa2.key;

    root /var/www/empresa2;
    index index.html;

    location / {
        try_files $uri $uri/ =404;
    }
}

# Redirigir tráfico HTTP a HTTPS
server {
    listen 80;
    server_name empresa2.com www.empresa2.com;

    return 301 https://$host$request_uri;
}
```

- El bloque `listen 443 ssl` habilita HTTPS.
- **`ssl_certificate`** apunta al certificado.
- **`ssl_certificate_key`** apunta a la clave privada.
- Añadimos un bloque para redirigir todo el tráfico HTTP a HTTPS.

---

### 3. Activar el sitio y probar la configuración
Nos aseguramos de que el archivo esté activado creando un enlace simbólico:

```bash
sudo ln -s /etc/nginx/sites-available/empresa2.com /etc/nginx/sites-enabled/
```

Verificamos que la configuración de Nginx no tenga errores:

```bash
sudo nginx -t
```

Si todo está correcto, recargamos Nginx:

```bash
sudo systemctl reload nginx
```

---

### 4. Probar el certificado SSL
Abrimos un navegador y visitamos:

```
https://empresa2.com
```

Es posible que el navegador nos muestre una advertencia porque el certificado está **autofirmado**. Esto es normal, ya que no está emitido por una autoridad certificadora reconocida. Podemos continuar y verificar que la conexión sea segura (HTTPS).

