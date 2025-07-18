# Registro de Instituto en PHP + PostgreSQL

Este proyecto es una aplicación sencilla desarrollada en **PHP puro**, diseñada para registrar el nombre de un instituto y almacenar automáticamente la dirección IP desde la cual se realizó el registro.

---

## 📁 Estructura del Proyecto

```
registro_instituto/
├── config.php       # Configuración de la base de datos
├── logic.php        # Lógica para guardar en la base de datos
├── index.php        # Interfaz HTML con formulario
```

---

## ⚙️ Requisitos

- PHP 7.x o superior
- Extensión `pdo_pgsql` habilitada
- PostgreSQL

---

## 🧪 Consulta SQL para crear la tabla

Ejecuta esto en tu base de datos PostgreSQL:

```sql
CREATE TABLE institutos (
    id SERIAL PRIMARY KEY,
    nombre TEXT NOT NULL,
    ip_registro VARCHAR(45),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 🚀 Pasos para ejecutar el proyecto localmente

1. **Clona o descarga** el proyecto y colócalo en una carpeta:
   ```bash
   cd ruta/a/registro_instituto
   ```

2. **Configura tu base de datos** en `config.php`:
   ```php
   $host = "localhost";
   $dbname = "tubasededatos";
   $user = "tuusuario";
   $pass = "tucontraseña";
   ```

3. **Ejecuta un servidor PHP local**:
   ```bash
   php -S localhost:8000
   ```

4. Abre tu navegador en [http://localhost:8000](http://localhost:8000)

---

## 🎨 Funcionalidades

- Convierte automáticamente el nombre ingresado a **mayúsculas**.
- Guarda la **IP del visitante**, incluso si es `localhost` (`::1` se convierte a `127.0.0.1`).
- Muestra un **popup de confirmación flotante**, centrado bajo el formulario.
- La lógica está separada del HTML para facilitar el mantenimiento.

---

## 🛡️ Seguridad

- Asegúrate de que `config.php` no sea accesible públicamente si subes esto a un servidor.
- Puedes protegerlo con `.htaccess` si usas Apache.

---
