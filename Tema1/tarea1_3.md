# Trabajando con Git y Markdown III
## Moisés Alejandro Luis Herrera
---
1. **Crear un directorio de trabajo llamado `/bloggalpon/` en el directorio del usuario:**

   ```bash
   mkdir ~/bloggalpon
   cd ~/bloggalpon
   ```

2. **Inicializar el repositorio vacío:**

   ```bash
   git init
   ```

3. **Crear el archivo `index.htm`:**

   ```bash
   touch index.htm
   ```

4. **Añadir la estructura básica de una web en `index.htm`:**

   ```html
   <!DOCTYPE html>
   <html>
   <head>
       <title>Mi Blog</title>
   </head>
   <body>
       <h1>Bienvenido a Mi Blog</h1>
   </body>
   </html>
   ```

5. **Crear un commit indicando que se crea el esqueleto básico del `index.htm`:**

   ```bash
   git add index.htm
   git commit -m "Se crea el esqueleto básico del index.htm"
   ```

6. **Añadir contenido al `head` entre `<head>` y `</head>`:**

   ```html
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   ```

7. **Crear un commit indicando que se añade la cabecera del `index.htm`:**

   ```bash
   git add index.htm
   git commit -m "Se añade la cabecera del index.htm"
   ```

8. **Añadir contenido al `body` entre `<body>` y `</body>`:**

   ```html
   <header>
       <h1>Mi Blog Personal</h1>
   </header>
   <section>
       <h2>Últimos Posts</h2>
   </section>
   <footer>
       <p>&copy; 2012 Mi Blog</p>
   </footer>
   ```

9. **Crear un commit indicando que se añade la estructura básica del `body`:**

   ```bash
   git add index.htm
   git commit -m "Se añade la estructura básica del body"
   ```

10. **Añadir contenido en `section`, entre `<section>` y `</section>`:**

   ```html
   <article>
       <h3>Post 1</h3>
       <p>Contenido del post 1...</p>
   </article>
   <article>
       <h3>Post 2</h3>
       <p>Contenido del post 2...</p>
   </article>
   ```

11. **Crear un commit indicando que se añade la estructura de la zona de posts:**

   ```bash
   git add index.htm
   git commit -m "Se añade toda la estructura de la zona de posts"
   ```

12. **Crear el archivo `style.css`:**

   ```bash
   touch style.css
   ```

13. **Añadir la siguiente información en `style.css` (CSS para `html` y `body`):**

   ```css
   html, body {
       margin: 0;
       padding: 0;
       font-family: Arial, sans-serif;
   }
   ```

14. **Crear un commit indicando que se añaden las CSS de `html` y `body`:**

   ```bash
   git add style.css
   git commit -m "Se añaden las CSS de html y body"
   ```

15. **Añadir CSS para elementos HTML5: `header`, `section`, `article`, `aside` y `footer`:**

   ```css
   header, section, article, aside, footer {
       display: block;
       margin: 10px;
   }
   ```

16. **Crear un commit indicando que se añaden las CSS de elementos HTML5:**

   ```bash
   git add style.css
   git commit -m "Se añaden las CSS de header, section, article, aside y footer"
   ```

17. **Añadir el logotipo `logo.png` en el directorio raíz:**

   ```bash
   cp /ruta/al/logo.png ~/bloggalpon/logo.png
   ```

18. **Crear un commit indicando que se añade el logotipo de Galpón:**

   ```bash
   git add logo.png
   git commit -m "Se añade el logotipo de Galpón"
   ```

19. **Añadir CSS para `section`:**

   ```css
   section {
       background-color: #f0f0f0;
       padding: 20px;
   }
   ```

20. **Crear un commit indicando que se añaden las CSS de `section`:**

   ```bash
   git add style.css
   git commit -m "Se añaden las CSS de section"
   ```

21. **Añadir CSS para el `footer`:**

   ```css
   footer {
       background-color: #333;
       color: #fff;
       text-align: center;
       padding: 10px;
   }
   ```

22. **Crear un commit indicando que se añaden las CSS del `footer`:**

   ```bash
   git add style.css
   git commit -m "Se añaden las CSS del footer"
   ```

23. **Añadir CSS para `h1` y enlaces (`a`):**

   ```css
   h1 {
       color: #333;
   }

   a {
       color: #0066cc;
       text-decoration: none;
   }
   ```

24. **Crear un commit indicando que se añaden las CSS del `h1` y de los enlaces:**

   ```bash
   git add style.css
   git commit -m "Se añaden las CSS del h1 y de los enlaces"
   ```

25. **Crear una etiqueta de `v1.0`:**

   ```bash
   git tag v1.0
   ```

---

### Rama de desarrollo:

26. **Crear la rama `desarrollo`:**

   ```bash
   git checkout -b desarrollo
   ```

27. **Crear el directorio `images` y mover el logotipo `logo.png`:**

   ```bash
   mkdir images
   mv logo.png images/
   ```

28. **Crear un commit indicando que se mueve el logotipo a la carpeta `images`:**

   ```bash
   git add images/logo.png
   git commit -m "Se mueve el logotipo a la carpeta images"
   ```

29. **Crear el directorio `CSS` y mover el archivo `style.css`:**

   ```bash
   mkdir CSS
   mv style.css CSS/
   ```

30. **Crear un commit indicando que se mueve la CSS a la carpeta `CSS`:**

   ```bash
   git add CSS/style.css
   git commit -m "Se mueve la CSS a la carpeta CSS"
   ```

31. **Cambiar las referencias a la CSS en `index.htm` y al logotipo `logo.png` en la CSS:**

   - En `index.htm`:

     ```html
     <link rel="stylesheet" href="CSS/style.css">
     ```

   - En `CSS/style.css`:

     ```css
     background-image: url('../images/logo.png');
     ```

32. **Crear un commit indicando que se cambian las referencias a las CSS y a las imágenes al reorganizarlas en directorios:**

   ```bash
   git add index.htm CSS/style.css
   git commit -m "Se cambian las referencias a las CSS y a las imágenes al reorganizarlas en directorios"
   ```

---

### Rama `bugfix`:

33. **Crear la rama `bugfix` a partir de `master`:**

   ```bash
   git checkout master
   git checkout -b bugfix
   ```

34. **Quitar los comentarios en las CSS de los punteados:**

   En `CSS/style.css`, eliminamos los comentarios `//border`.

35. **Crear un commit indicando que se introducen los punteados en la barra derecha y el footer:**

   ```bash
   git add CSS/style.css
   git commit -m "Se introducen los punteados en la barra derecha y el footer"
   ```

36. **Introducir como título “Galpon” en `index.htm`:**

   ```html
   <title>Galpon</title>
   ```

37. **Crear un commit indicando que se introduce el título en la página:**

   ```bash
   git add index.htm
   git commit -m "Se introduce el título en la página"
   ```

38. **Cambiar `2012` por `2014` en el footer y quitar `(c)` en `index.htm`:**

   ```html
   <footer>
       <p>2014 Mi Blog</p>
   </footer>
   ```

39. **Crear un commit indicando que se realizan pequeños ajustes en el footer:**

   ```bash
   git add index.htm
   git commit -m "Se realizan pequeños ajustes en el footer"
   ```

40. **Crear una etiqueta de `v1.1`:**

   ```bash
   git tag v1.1
   ```

41. **Llevar estos cambios a la rama `master`:**

   ```bash
   git checkout master
   git merge bugfix
   ```

42. **Borrar la rama `bugfix`:**

   ```bash
   git branch -d bugfix
   ```

43. **Llevar los cambios de la rama `desarrollo` a la rama `master` (resolver conflictos si existen)**

   ```bash
   git merge desarrollo
   ```

44. **Crear una etiqueta de `v1.2`:**

   ```bash
   git tag v1.2
   ```