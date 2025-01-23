# Instalar servidor DNS en ubuntu
## Moisés Alejandro Luis Herrera
---
### **1. Instalamos BIND9**
Para instalar el paquete de BIND9 y herramientas adicionales, escribimos:

```bash
sudo apt install bind9 bind9-utils
```

También podemos instalar `nano`, que nos ayudará a editar los archivos de configuración si no lo tenemos ya instalado.

---
### **2. Configuramos BIND9**
Vamos a editar el archivo principal de configuración de opciones para BIND9. Abrimos el archivo con el siguiente comando:

```bash
sudo nano /etc/bind/named.conf.options
```

Aquí, configuramos las siguientes opciones básicas:

```plaintext
options {
    directory "/var/cache/bind";

    listen-on { any; };                // Escuchamos en todas las interfaces
    allow-query { localhost; 192.168.1.0/24; };  // Permitimos consultas desde nuestra red
    forwarders {                       // Configuramos servidores DNS externos
        8.8.8.8;
        8.8.4.4;
    };
    dnssec-validation no;              // Desactivamos la validación DNSSEC
};
```

Guardamos el archivo y salimos.

---

### **3. Configuramos las zonas DNS**
Ahora añadimos nuestras zonas al archivo de configuración de BIND. Editamos el archivo:

```bash
sudo nano /etc/bind/named.conf.local
```

Y agregamos las zonas:

```plaintext
zone "midominio.local" IN {
    type master;
    file "/etc/bind/zonas/db.midominio.local";
};

zone "1.168.192.in-addr.arpa" {
    type master;
    file "/etc/bind/zonas/db.192.168.1";
};
```

En este caso:
- **`midominio.local`** es el dominio que queremos configurar.
- **`192.168.1.0/24`** es nuestra red local.
- Creamos un archivo de zona para la resolución directa y otro para la inversa.

---

### **4. Creamos los archivos de zona**
Primero creamos el directorio donde guardaremos los archivos de zona:

```bash
sudo mkdir /etc/bind/zonas
```

Luego creamos el archivo de zona directa:

```bash
sudo nano /etc/bind/zonas/db.midominio.local
```

Escribimos lo siguiente:

```plaintext
$TTL 1D
@       IN SOA  ns1.midominio.local. admin.midominio.local. (
                1       ; Serial
                12h     ; Refresh
                15m     ; Retry
                3w      ; Expire
                2h )    ; Negative Cache TTL

        IN NS   ns1.midominio.local.
ns1     IN A    192.168.1.1
www     IN A    192.168.1.100
```

Después, creamos el archivo de zona inversa:

```bash
sudo nano /etc/bind/zonas/db.192.168.1
```

Y escribimos lo siguiente:

```plaintext
$TTL 1D
@       IN SOA  ns1.midominio.local. admin.midominio.local. (
                1       ; Serial
                12h     ; Refresh
                15m     ; Retry
                3w      ; Expire
                2h )    ; Negative Cache TTL

        IN NS   ns1.midominio.local.
1       IN PTR  ns1.midominio.local.
100     IN PTR  www.midominio.local.
```

---

### **5. Verificamos la configuración**
Comprobamos que los archivos de configuración y las zonas no tengan errores:

```bash
sudo named-checkconf
sudo named-checkzone midominio.local /etc/bind/zonas/db.midominio.local
sudo named-checkzone 1.168.192.in-addr.arpa /etc/bind/zonas/db.192.168.1
```

Si no hay errores, podemos continuar.

---

### **6. Reiniciamos el servicio**
Reiniciamos el servicio de BIND9 para que tome los cambios:

```bash
sudo systemctl restart bind9
```

Podemos comprobar su estado con:

```bash
sudo systemctl status bind9
```

---

### **7. Probamos el servidor DNS**
Desde otra máquina de la red, configuramos el servidor DNS apuntando a la IP del servidor (por ejemplo, `192.168.1.1`). Luego, verificamos la resolución de nombres:

```bash
ping www.midominio.local
nslookup www.midominio.local 192.168.1.1
```