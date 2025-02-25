# 📚 Desarrollo de una Aplicación Web en PHP con el Modelo MVC para la Gestión de Libros y Autores

## 🏛️ Descripción
Este proyecto proporciona una base de datos MySQL para gestionar libros y autores, junto con un sistema en PHP que sigue el modelo MVC para la conexión y gestión de datos.

---

## 📁 Estructura del Proyecto

```
Final/
├── app/
│   ├── controllers/      # Controladores que manejan las solicitudes HTTP
│   │   ├── AutorController.php
│   │   └── LibroController.php
│   ├── core/             # Núcleo del proyecto, incluye el enrutador principal
│   │   └── Router.php
│   ├── models/           # Modelos que representan las entidades del sistema
│   │   ├── Autor.php
│   │   └── Libro.php
│   ├── repositories/     # Encargados de la interacción con la base de datos
│   │   ├── AutorRepository.php
│   │   └── LibroRepository.php
│   └── services/         # Lógica de negocio entre los controladores y repositorios
│       ├── AutorService.php
│       └── LibroService.php
├── config/               # Archivos de configuración y scripts de base de datos
│   ├── bd.sql
│   ├── data.sql
│   └── database.php
├── node_modules/         # Dependencias gestionadas por npm (si aplica)
├── public/               # Archivos públicos accesibles desde el navegador
│   ├── js/               # Scripts JavaScript
│   │   ├── appAutor.js
│   │   └── appLibro.js
│   ├── styles/           # Archivos de estilos CSS
│   │   └── style.css
│   └── templates/        # Plantillas reutilizables para las vistas
│       ├── footer.php
│       ├── header.php
│       ├── gestionar_autores.php
│       ├── gestionar_libros.php
│       ├── index.php
│       └── indexinicio.php
├── .htaccess             # Configuración del servidor Apache para las rutas amigables
├── package.json          # Información y gestión de las dependencias del proyecto
├── package-lock.json     # Archivo de bloqueo de versiones de npm
```

## Instalación
1. **Clonar el repositorio:**
   ```bash
   git clone (https://github.com/MatVira/Proyect_Final)
   ```
2. **Configurar la base de datos:**
   - Importar el archivo `bd.sql` y `data.sql` en tu gestor de base de datos.
   - Configurar las credenciales en `config/database.php`.

## Uso
- **Gestión de Autores:** Permite crear, editar y eliminar autores.
- **Gestión de Libros:** Permite registrar libros y asociarlos a autores.
- **Vistas:** El sistema tiene vistas intuitivas para la administración.

## Tecnologías Utilizadas
- PHP
- JavaScript
- HTML & CSS
- MySQL
- Apache (para la configuración con `.htaccess`)

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
