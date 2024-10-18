# Trabajando con con el Visual Studio y nuestro repositorio en Github.
## Moisés Alejandro Luis Herrera
---
1. **Crear una cuenta en GitHub**  
   Primero, accedemos a [GitHub](https://github.com) y creamos una cuenta si no la tenemos ya. Nos aseguramos de verificar el correo electrónico para activar la cuenta correctamente.

2. **Crear un repositorio llamado "banco"**  
   Una vez dentro de nuestra cuenta, vamos al botón que dice "New" o "Nuevo" en la esquina superior derecha para crear un nuevo repositorio. Lo llamamos “banco”, y podemos marcarlo como público o privado según nuestras necesidades. También podemos añadir un archivo README si lo deseamos.

3. **Clonar el repositorio desde la línea de comandos**  
   Después de crear el repositorio, GitHub nos proporcionará la URL para clonarlo. Copiamos la URL y, desde la línea de comandos, ejecutamos:

   ```bash
   git clone https://github.com/MoisesALH/banco.git
   ```

   Esto descargará el repositorio vacío a nuestra máquina local en una carpeta llamada "banco".
4. **Crear un proyecto llamado “banco” en otra carpeta**  
   En una carpeta diferente en nuestro sistema, creamos un nuevo proyecto con el mismo nombre. Si estamos trabajando con un lenguaje específico, por ejemplo, si es un proyecto en Python, podríamos ejecutar:

   ```bash
   mkdir banco
   cd banco
   touch main.py
   ```

   Esto creará la carpeta "banco" y un archivo principal `main.py`.

5. **Copiar la carpeta del proyecto "banco" al repositorio clonado**  
   Después de crear nuestro proyecto, copiamos la carpeta completa del proyecto "banco" que hemos creado, dentro de la carpeta del repositorio que clonamos en el paso 3. Podríamos usar comandos como:

   ```bash
   cp -r /ruta/del/proyecto/banco/* /ruta/del/repositorio/banco/
   ```

   Ahora todo el contenido de nuestro proyecto está en el repositorio clonado.

6. **Hacer commit y push desde Visual Studio Code**

Abrimos **Visual Studio Code** y cargamos el proyecto del repositorio que hemos clonado. 

- En el menú de la izquierda, seleccionamos el icono de **Source Control** (Control de código fuente), que es el símbolo de una ramita con tres puntos conectados.
  
- Veremos los archivos del proyecto listados como "Unstaged Changes" o "Cambios sin registrar". Para añadir estos archivos al área de staging (prepararlos para el commit), hacemos clic en el icono "+" al lado de cada archivo o usamos el botón “+” en la sección "Cambios".

- Luego, escribimos un mensaje de commit en el cuadro de texto que aparece en la parte superior, por ejemplo: `"Añadir proyecto inicial de banco"`.

- Presionamos el botón de check (✓) para confirmar el commit.

- Finalmente, hacemos un **push** de los cambios a GitHub haciendo clic en los tres puntos en la parte superior de la pestaña de control de código fuente y seleccionamos **Push** en el menú desplegable. Esto subirá los cambios al repositorio remoto en GitHub.

7. **Borrar todo el código del disco duro**  
   Luego de asegurarnos de que todo está subido a GitHub, eliminamos el proyecto "banco" de nuestro disco duro. Simplemente navegamos a la carpeta y la borramos.

8. **Clonar el proyecto de nuevo desde GitHub**  
   Como ya hemos subido todo a GitHub, ahora podemos clonar el proyecto de nuevo desde el repositorio remoto. Abrimos la terminal y ejecutamos:

   ```bash
   git clone https://github.com/usuario/banco.git
   ```

   Esto descargará el proyecto completo en una nueva carpeta local.

9. **Hacer una modificación del código y subirla a GitHub**  
   Una vez clonado el proyecto, hacemos alguna modificación en el código, por ejemplo, agregamos una función en el archivo `main.py`. Luego, repetimos el proceso de commit y push:

   - Guardamos los cambios.
   - Ejecutamos los comandos desde la línea de comandos o Visual Studio:
   
     ```bash
     git add .
     git commit -m "Añadir nueva funcionalidad"
     git push origin main
     ```