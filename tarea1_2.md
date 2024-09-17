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

5. AÑADIR FICHERO 1.txt
```bash
    touch 1.txt
    git add .
    git commit -m "Creado fichero 1.txt"
```
6. CREAR EL TAG v0.1
```bash
    git tag v0.1
```
7. SUBIR EL TAG v0.1
```bash
    git push
```

| Nombre | Github |
|--------|---------|
| Julio | [https://github.com/JulioGlezGlez](https://github.com/JulioGlezGlez) |
| Owen | [https://github.com/OwenHernandez](https://github.com/OwenHernandez) |
| Angel | [https://github.com/Angel-L-G](https://github.com/Angel-L-G) |