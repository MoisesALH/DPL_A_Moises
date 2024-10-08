# Trabajando con Git y Markdown 3
## Moisés Alejandro Luis Herrera
---
1. **Crear directorio y repositorio:**
   ```bash
   mkdir ~/bloggalpon
   cd ~/bloggalpon
   git init
   ```

2. **Crear archivo `index.htm` y añadir estructura básica:**
   ```html
   <!DOCTYPE html>
   <html lang="es">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Blog de Galpón</title>
       <!-- Aquí se añaden las etiquetas meta, enlaces a CSS, etc. -->
   </head>
   <body>
       <!-- Contenido del body -->
   </body>
   </html>
   ```

3. **Crear commits:**
   ```bash
   git add index.htm
   git commit -m "Se crea el esqueleto básico del index.htm"

   # Añadir contenido al head
   # Añadir contenido al body
   # Añadir contenido de section
   git commit -am "Se añade la cabecera del index.htm"
   git commit -am "Se añade la estructura básica del body"
   git commit -am "Se añade toda la estructura de la zona de posts"
   ```

4. **Crear archivo `style.css` y añadir estilos:**
   ```css
   /* CSS para html y body */
   /* CSS para header, section, article, aside y footer */
   /* CSS para section */
   /* CSS para el footer */
   /* CSS para H1 y enlaces */
   ```

5. **Crear commits para CSS:**
   ```bash
   git add style.css
   git commit -m "Se añaden las CSS de html y body"
   git commit -m "Se añaden las CSS de varios elementos HTML5"
   git commit -m "Se añaden las CSS de section"
   git commit -m "Se añaden las CSS del footer"
   git commit -m "Se añaden las CSS del H1 y de los enlaces"
   ```

6. **Añadir logo `logo.png` y crear commit:**
   ```bash
   # Añadir logo.png al directorio raíz del proyecto
   git add logo.png
   git commit -m "Se añade el logotipo de Galpón"
   ```

7. **Crear etiqueta de versión v1.0:**
   ```bash
   git tag v1.0
   ```

8. **Crear rama `desarrollo` y realizar tareas:**
   ```bash
   git checkout -b desarrollo

   # Crear directorio images y mover logo.png
   # Crear directorio CSS y mover style.css
   git mv logo.png images/
   git commit -m "Se mueve el logotipo a la carpeta images"
   mkdir CSS
   git mv style.css CSS/
   git commit -m "Se mueve la CSS a la carpeta CSS"

   # Cambiar referencias en index.htm y CSS
   # Ajustar todas las referencias necesarias
   git commit -am "Se cambian las referencias a las CSS y a las imágenes al reorganizarlas en directorios"
   ```

9. **Crear rama `bugfix` desde `master`:**
   ```bash
   git checkout master
   git checkout -b bugfix

   # Realizar los cambios solicitados en los comentarios de las CSS y en el footer
   git commit -m "Se introducen los cambios en la barra derecha y en el footer"
   git commit -m "Se introduce el título 'Galpon' en la página"
   git commit -m "Se realizan pequeños ajustes en el footer"

   # Crear etiqueta de versión v1.1
   git tag v1.1
   ```

10. **Llevar cambios de `bugfix` a `master` y eliminar `bugfix`:**
    ```bash
    git checkout master
    git merge bugfix
    git tag v1.1   # Asegurarse de etiquetar v1.1 en la rama master también

    git branch -d bugfix
    ```

11. **Llevar cambios de `desarrollo` a `master`:**
    ```bash
    git checkout desarrollo
    git rebase master   # Rebase para aplicar cambios de desarrollo sobre master y resolver conflictos, si existen

    git checkout master
    git merge desarrollo
    git tag v1.2   # Crear etiqueta de versión v1.2 en master
    ```

¡Con estos pasos completarías la tarea según lo solicitado! Asegúrate de revisar y resolver los conflictos durante el rebase de `desarrollo` a `master` si es necesario.