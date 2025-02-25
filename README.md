# 📚 Desarrollo de una Aplicación Web en PHP con el Modelo MVC para la Gestión de Libros y Autores

## 🏛️ Descripción
Este proyecto proporciona una base de datos MySQL para gestionar libros y autores, junto con un sistema en PHP que sigue el modelo MVC para la conexión y gestión de datos.

---

## 📁 Estructura del Proyecto
```
/config
├── bd.sql        # Script para la creación de las tablas
├── data.sql      # Script con datos de ejemplo
└── database.php  # Clase PHP para la conexión a MySQL
```

---

## ⚙️ Requisitos

- Tener instalado **MySQL** y **PHP**.
- Un servidor web como **Apache** (XAMPP, WAMP, LAMP, etc.).

---

## 🏋️ Configuración de la Base de Datos

1. **Iniciar el servidor MySQL**.
2. **Crear la base de datos** ejecutando el siguiente comando:

```sql
CREATE DATABASE bd_taller;
```

3. **Importar los scripts SQL** en el siguiente orden:

   - `bd.sql` para crear las tablas necesarias.
   - `data.sql` para insertar datos de ejemplo.

---

## 🔗 Conexión en PHP

Editar el archivo `database.php` para establecer las credenciales correctas de MySQL:

```php
private $host = "localhost";
private $db_name = "bd_taller";
private $username = "root";
private $password = "";
```

Uso del archivo `database.php` para conectarse a la base de datos:

```php
require_once "config/database.php";
$db = new Database();
$conn = $db->getConnection();
```

---

## 📊 Consultas SQL de Ejemplo

- **Obtener todos los autores:**

```sql
SELECT * FROM autores;
```

- **Obtener todos los libros con sus autores:**

```sql
SELECT libros.titulo, libros.fecha_publicacion, autores.nombre, autores.apellido
FROM libros
JOIN autores ON libros.autor_id = autores.id;
```

---

## 📦 Tablas Principales

- **autores**
- **libros**

**Relación:** Un autor puede tener múltiples libros.

**Integridad referencial:** Si un autor es eliminado, sus libros asociados también lo serán.

---

## 🌟 Integrantes del Proyecto

**Aplicación de Tecnologías Web**

- **Ing. Cudco Pomagualli Angel Geovanny** - NRC: 1382

### 👥 Integrantes:

- Harvey Joel Fonseca Escobar
- César Augusto Tamayo Ñaupa
- Mateo David Viracucha Armijos
- Kevin Israel Yugla Suntaxi

---
