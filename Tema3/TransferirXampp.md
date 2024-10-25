# Describe los pasos a realizar para alojar en Infinity free, lo que tienes en xampp
## Moisés Alejandro Luis Herrera
---

1. **Abrir FileZilla**: Primero, abrimos FileZilla. Este programa nos permitirá conectar nuestro ordenador local con el servidor de Infinity Free para transferir los archivos.

2. **Conectar con Infinity Free**:
   - En FileZilla, en la parte superior, tenemos varios campos: "Host", "Nombre de usuario", "Contraseña" y "Puerto".
   - Vamos a acceder a nuestro panel de control de Infinity Free. En la sección FTP, encontraremos los datos que necesitamos: 
     - **Host (Servidor FTP)**: Puede ser algo como `ftpupload.net` o el servidor que nos haya proporcionado Infinity Free.
     - **Nombre de usuario**: También lo veremos en la sección de FTP de Infinity Free.
     - **Contraseña**: Es la contraseña que configuramos al crear la cuenta o la que configuramos específicamente para FTP.
     - **Puerto**: En la mayoría de los casos, el puerto será `21` para FTP.

3. **Navegar por los directorios**:
   - A la izquierda de FileZilla, vemos la estructura de carpetas de nuestro equipo local. Aquí vamos a buscar la carpeta donde tenemos los archivos de nuestro proyecto XAMPP.
   - A la derecha, veremos la estructura del servidor remoto. Aquí buscamos el directorio donde debemos subir los archivos, que normalmente es `htdocs`.

4. **Subir los archivos**:
   - Una vez que hayamos localizado las carpetas adecuadas, seleccionamos todos los archivos y carpetas de nuestro proyecto local (de la carpeta `/opt/lampp/htdocs` de XAMPP en nuestro equipo).
   - Arrastramos y soltamos esos archivos en la carpeta del servidor remoto (`htdocs`) en el panel derecho.

5. **Esperar la transferencia**: FileZilla mostrará el progreso de la transferencia. Dependiendo del tamaño de nuestro proyecto, esto puede tardar un poco.

6. **Actualizar configuraciones**:
   - Finalmente, revisamos los archivos de configuración de nuestro proyecto (como `config.php` o los que estemos usando) para asegurarnos de que los datos de conexión a la base de datos y otros ajustes estén correctos para el entorno de Infinity Free.