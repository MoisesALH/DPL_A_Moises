# Instalar en Lamp nuestra página implementada en xampp
## Moisés Alejandro Luis Herrera

---

1. **Preparar el entorno en el servidor LAMP**  
   Asegurémonos de que el servidor LAMP esté instalado y funcionando correctamente. Verificamos que los servicios de Apache, MySQL y PHP estén activos. Podemos usar los siguientes comandos para comprobarlo:  
   ```bash
   sudo systemctl status apache2
   sudo systemctl status mysql
   ```

2. **Copiar los archivos de XAMPP a LAMP**  
   Localizamos los archivos que tenemos en el directorio `htdocs` de XAMPP. Este directorio suele estar en la ruta:  
   ```
   /opt/lampp/htdocs/
   ```
   Los copiamos al directorio `/var/www/html/` de LAMP usando el comando `cp`. Por ejemplo:  
   ```bash
   sudo cp -r /opt/lampp/htdocs/* /var/www/html/
   ```
   Si queremos preservar los permisos y propietarios originales de los archivos, añadimos la opción `-p`:  
   ```bash
   sudo cp -rp /opt/lampp/htdocs/* /var/www/html/
   ```

3. **Ajustar permisos y propietarios**  
   Una vez copiados, debemos asegurarnos de que los archivos tengan los permisos correctos para que Apache pueda acceder a ellos. Ejecutamos:  
   ```bash
   sudo chown -R www-data:www-data /var/www/html/
   sudo chmod -R 755 /var/www/html/
   ```

4. **Exportar e importar la base de datos**  
   Desde el servidor XAMPP, exportamos nuestras bases de datos usando phpMyAdmin o el comando `mysqldump`. Por ejemplo:  
   ```bash
   mysqldump -u root -p nombre_base_datos > backup.sql
   ```
   Luego, transferimos este archivo SQL al servidor LAMP. Podemos usar `scp` si estamos en máquinas diferentes:  
   ```bash
   scp backup.sql usuario@ip-servidor:/ruta/destino/
   ```
   En el servidor LAMP, importamos la base de datos con:  
   ```bash
   mysql -u root -p nombre_base_datos < /ruta/destino/backup.sql
   ```

5. **Verificar que todo funcione correctamente**  
   Finalmente, verificamos que la aplicación esté operativa tanto en lo que respecta a los archivos como a la base de datos.