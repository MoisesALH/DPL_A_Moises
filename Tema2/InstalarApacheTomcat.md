# Tarea 1.1- Instalación de servidor web Apache y servidor de Aplicaciones Tomcat
## Moisés Alejandro Luis Herrera
---

En este ejercicio, analizaremos y ejecutaremos los pasos necesarios para configurar una máquina en el contexto de una arquitectura web, explorando tanto las capas de la arquitectura como el uso de plataformas y comandos específicos.

### 1. Arquitectura Web: Las tres capas

La arquitectura web se organiza en tres capas fundamentales:

1. **Capa de presentación:** Es la interfaz que ve el usuario, generalmente en forma de HTML, CSS y JavaScript. Su función es facilitar la interacción con la aplicación, proporcionando una experiencia visual y de navegación.

2. **Capa de lógica o negocio:** Aquí se procesan las reglas de negocio y la lógica de la aplicación. Se implementan en el backend y son responsables de realizar cálculos, gestionar datos y comunicar la información entre la presentación y la base de datos.

3. **Capa de datos:** Es la capa de almacenamiento, generalmente administrada por un sistema de bases de datos. Almacena la información de manera estructurada y permite el acceso a los datos necesarios para la lógica de negocio.

### 2. Plataformas web: LAMP y WISA

1. **LAMP (Linux, Apache, MySQL, PHP):** Es una plataforma de software libre ampliamente utilizada para desarrollar sitios web. Se compone de Linux como sistema operativo, Apache como servidor web, MySQL como gestor de bases de datos y PHP (o Python/Perl) para el desarrollo del backend. LAMP es valorado por su flexibilidad, estabilidad y costo reducido.

2. **WISA (Windows, IIS, SQL Server, ASP.NET):** Esta plataforma está basada en productos de Microsoft. Utiliza Windows como sistema operativo, IIS (Internet Information Services) como servidor web, SQL Server como sistema de bases de datos, y ASP.NET como framework de desarrollo. WISA es conocida por su integración y soporte con otros productos de Microsoft.

### 3. Instalación y configuración en una máquina Ubuntu LTS

Contando con una máquina Ubuntu actualizada y con privilegios root, seguimos los pasos siguientes:

#### a) Instalación del servidor web Apache

1. Actualizamos el sistema y los repositorios:

   ```bash
   apt update
   apt upgrade
   ```

2. Instalamos Apache:

   ```bash
   apt install apache2
   ```

#### b) Comprobación del funcionamiento de Apache desde terminal

Para verificar que Apache está funcionando, utilizamos el siguiente comando:

```bash
systemctl status apache2
```

Si vemos un mensaje que indica “active (running)”, Apache está funcionando correctamente.

#### c) Comprobación del funcionamiento de Apache desde el navegador

Abrimos un navegador e ingresamos la dirección IP de la máquina o `localhost`:

```
http://localhost
```

Deberíamos ver la página de bienvenida de Apache.

#### d) Cambiar el puerto de Apache al 82

1. Editamos el archivo de configuración de Apache:

   ```bash
   nano /etc/apache2/ports.conf
   ```

2. Cambiamos la línea que especifica el puerto de escucha de `80` a `82`:

   ```apache
   Listen 82
   ```

3. Modificamos el archivo de configuración del sitio principal en `/etc/apache2/sites-enabled/000-default.conf`, cambiando `<VirtualHost *:80>` a `<VirtualHost *:82>`.

4. Guardamos los cambios y reiniciamos Apache:

   ```bash
   systemctl restart apache2
   ```

5. Comprobamos en el navegador con la URL:

   ```
   http://localhost:82
   ```

#### e) Instalación del servidor de aplicaciones Tomcat

1. Actualizamos los paquetes e instalamos OpenJDK (necesario para Tomcat):

   ```bash
   apt install openjdk-11-jdk
   ```

2. Descargamos e instalamos Apache Tomcat desde los repositorios de Ubuntu:

   ```bash
   apt install tomcat9
   ```

3. Verificamos que Tomcat esté en ejecución:

   ```bash
   systemctl status tomcat9
   ```

Con estos pasos, habremos instalado y configurado tanto Apache como Tomcat, y modificado el puerto de escucha para Apache en una máquina Ubuntu LTS.