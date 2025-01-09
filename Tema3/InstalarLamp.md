# Instalación de LAMP en Ubuntu Server
## Moisés Alejandro Luis Herrera
---

### Paso 1: Actualizamos nuestro sistema
Primero, asegurémonos de que todo esté actualizado:

```bash
sudo apt update && sudo apt upgrade -y
```

---

### Paso 2: Instalamos Apache
A continuación, instalamos Apache, que será nuestro servidor web:

```bash
sudo apt install apache2 -y
```

Cuando termine, verificamos que Apache esté funcionando abriendo en nuestro navegador:  
`http://localhost` o `http://127.0.0.1`.  
Deberíamos ver la página predeterminada de Apache.

---

### Paso 3: Instalamos MySQL
Luego, instalamos MySQL para gestionar nuestras bases de datos:

```bash
sudo apt install mysql-server -y
```

Aquí seguimos las instrucciones para establecer una contraseña de root y otras configuraciones.

---

### Paso 4: Instalamos PHP
Instalamos PHP junto con el módulo que lo conecta con Apache:

```bash
sudo apt install php libapache2-mod-php php-mysql -y
```

Para comprobar que PHP está funcionando, creamos un archivo de prueba:

```bash
sudo nano /var/www/html/info.php
```

Dentro del archivo, escribimos lo siguiente:

```php
<?php
phpinfo();
?>
```

Guardamos el archivo y luego visitamos `http://localhost/info.php` en nuestro navegador. Deberíamos ver una página con la información de PHP.

---

### Paso 5: Reiniciamos Apache
Cada vez que hacemos cambios importantes, reiniciamos Apache para aplicarlos:

```bash
sudo systemctl restart apache2
```

---

### Paso 6: Probamos nuestro servidor LAMP
Para finalizar, volvemos a visitar `http://localhost/info.php` en nuestro navegador. Si todo salió bien, nuestro servidor LAMP ya está listo para ser usado.

---

Si encontramos problemas o tenemos dudas, podemos revisar los logs de Apache para obtener más información:

```bash
sudo tail -f /var/log/apache2/error.log
```