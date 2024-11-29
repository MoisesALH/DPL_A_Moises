# SSL en Apache
## Moisés Alejandro Luis Herrera

---

### **1. Habilitamos el módulo SSL en Apache**
Lo primero que hacemos es asegurarnos de que Apache tenga habilitado el módulo SSL. Ejecutamos:

```bash
sudo a2enmod ssl
sudo systemctl restart apache2
```

Esto activa el módulo y reinicia Apache para aplicar los cambios.

---

### **2. Creamos el certificado SSL**
Para entornos de desarrollo o pruebas, podemos crear un certificado autofirmado. Lo hacemos con OpenSSL:

#### a) Generamos una clave privada
```bash
openssl genrsa -out /etc/ssl/mi-sitio.key 2048
```

#### b) Creamos el certificado
Con la clave generada, creamos un certificado autofirmado válido por un año (365 días):

```bash
openssl req -new -x509 -key /etc/ssl/mi-sitio.key -out /etc/ssl/mi-sitio.crt -days 365
```

Durante este proceso, OpenSSL nos pedirá información básica, como el nombre común (Common Name o CN). Aquí, usamos nuestro dominio, por ejemplo, `mi-sitio.com`.

---

### **3. Configuramos el VirtualHost para SSL**
Editamos el archivo de configuración del VirtualHost de nuestro sitio, que generalmente está en `/etc/apache2/sites-available/mi-sitio.conf`:

```bash
sudo nano /etc/apache2/sites-available/mi-sitio.conf
```

Modificamos el bloque para conexiones HTTPS. La configuración queda así:

```apache
<VirtualHost *:443>
    ServerName mi-sitio.com
    ServerAlias www.mi-sitio.com
    DocumentRoot /var/www/mi-sitio

    SSLEngine on
    SSLCertificateFile /etc/ssl/mi-sitio.crt
    SSLCertificateKeyFile /etc/ssl/mi-sitio.key

    <Directory /var/www/mi-sitio>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/mi-sitio-error.log
    CustomLog ${APACHE_LOG_DIR}/mi-sitio-access.log combined
</VirtualHost>
```

---

### **4. Habilitamos el sitio y reiniciamos Apache**
Nos aseguramos de habilitar el sitio y aplicamos los cambios reiniciando Apache:

```bash
sudo a2ensite mi-sitio.conf
sudo systemctl restart apache2
```

---

### **5. Probamos nuestra configuración**
Abrimos un navegador y accedemos a `https://mi-sitio.com`. Si usamos un certificado autofirmado, el navegador mostrará una advertencia de seguridad, que es normal para este tipo de certificados. Si esto ocurre, podemos agregar el certificado como confiable en nuestro sistema o navegador.
