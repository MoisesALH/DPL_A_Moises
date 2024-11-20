# Configuración usuarios, logs, SSL de vsFTP
## Moisés Alejandro Luis Herrera
---

### **1. Configuración de usuarios**
Para gestionar el acceso de usuarios al servidor FTP:

1. **Habilitamos el acceso a usuarios locales**:
   En la configuración tenemos `local_enable=YES`, lo que permite que los usuarios del sistema puedan iniciar sesión.

2. **Restringimos a los usuarios a sus directorios home**:
   Usamos `chroot_local_user=YES`, lo que asegura que los usuarios locales no puedan salir de sus directorios home. Además, configuramos una lista de exclusión en `/etc/vsftpd.chroot_list` para especificar usuarios que no estarán restringidos.

3. **Controlamos el acceso mediante listas**:
   - `userlist_enable=YES` activa el uso de una lista de usuarios permitidos o denegados.
   - `userlist_deny=YES` asegura que los usuarios en `/etc/vsftpd.user_list` **no puedan** acceder al servidor.

   Creamos o editamos `/etc/vsftpd.user_list` para incluir los usuarios que queremos bloquear.

4. **Configuramos un directorio para usuarios anónimos**:
   - Permitimos el acceso anónimo (`anonymous_enable=YES`).
   - Definimos que su raíz será `/srv/ftp/anonimo`, especificada con `anon_root=/srv/ftp/anonimo`. Nos aseguramos de que este directorio exista y tenga los permisos adecuados.

---

### **2. Configuración de logs**
El registro de actividades nos permite monitorear las transferencias y la actividad del servidor:

1. **Habilitamos el registro de transferencias**:
   - Con `xferlog_enable=YES`, activamos el registro de todas las subidas y descargas.

2. **Especificamos la ubicación de los logs**:
   - Usamos `xferlog_file=/var/log/vsftpd.log` para guardar los registros en `/var/log/vsftpd.log`.

3. **Verificamos los permisos del archivo de log**:
   - Nos aseguramos de que el archivo `/var/log/vsftpd.log` tenga permisos de escritura y lectura para el usuario que ejecuta vsftpd.

---

### **3. Configuración de SSL**
Para garantizar la seguridad de las conexiones:

1. **Activamos SSL**:
   - Con `ssl_enable=YES`, habilitamos el uso de conexiones seguras.

2. **Especificamos los certificados**:
   - `rsa_cert_file=/etc/ssl/certs/vsftpd.pem` indica la ubicación del certificado público.
   - `rsa_private_key_file=/etc/ssl/private/vsftpd.pem` especifica la clave privada.

3. **Generamos los certificados si no existen**:
   Si no tenemos los archivos necesarios, los generamos con OpenSSL:
   ```bash
   sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
   -keyout /etc/ssl/private/vsftpd.pem \
   -out /etc/ssl/certs/vsftpd.pem
   ```
   Asegurémonos de que el directorio y los archivos sean seguros:
   ```bash
   sudo chmod 600 /etc/ssl/private/vsftpd.pem
   ```

4. **Probamos las conexiones seguras**:
   Usamos un cliente FTP que soporte FTPS para verificar que las conexiones cifradas funcionan correctamente.