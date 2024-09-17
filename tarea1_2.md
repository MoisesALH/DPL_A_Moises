## Moises Alejandro Luis Herrera
### Tarea 1.2
---
1. CREAR UNA RAMA
```bash 
    git checkout -b v0.2
```

2. AÑADIR  EL FICHERO 2.txt
```bash
    touch 2.txt
```

3. SUBIR LOS CAMBIOS AL REPOSITORIO REMOTO
```bash
    git add .
    git commit -m "creado fiechero 2.txt"
    git push
```

4. MERGE DIRECTO
En mi caso no tengo rama master, sino main
```bash
    git checkout main
    git merge v0.2
    git push
```

5. MERGE CON CONFLICTO
```bash
    touch privado.txt
```
<img src="./Captura de pantalla de 2024-09-13 15-27-34.png">

6. MERGE CON CONFLICTO
<img src="./Captura de pantalla de 2024-09-17 15-11-13.png">

7. LISTADO DE RAMAS
<img src="./Captura de pantalla de 2024-09-17 15-13-54.png">

8. ARREGLAR  CONFLICTO
<img src="./Captura de pantalla de 2024-09-17 15-16-40.png">
```
Lo he arreglado a través de la herramienta de Visual Studio Code para arreglar conflictos. En el aparatado de git, entramos en el fichero con conflictos y le damos al botón de Resolver en el Merge Editor, luego aceptamos la combinacion de ambos ficheros para que aparezca hola y adios, hacemos git add y commit y pusheamos
```

9. BORRAR RAMA
```bash
    git tag v0.2
    git branch -d v0.2
    git push origin -d v0.2
```

8. ARREGLAR  CONFLICTO
<img src="./Captura de pantalla de 2024-09-17 15-28-49.png">

| Nombre | Github |
|--------|---------|
| Julio | [https://github.com/JulioGlezGlez](https://github.com/JulioGlezGlez) |
| Owen | [https://github.com/OwenHernandez](https://github.com/OwenHernandez) |
| Angel | [https://github.com/Angel-L-G](https://github.com/Angel-L-G) |