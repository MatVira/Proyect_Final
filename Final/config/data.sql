-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS bd_taller;

-- Seleccionar la base de datos para usarla
USE bd_taller;

-- Crear la tabla de autores si no existe
CREATE TABLE IF NOT EXISTS autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    nacionalidad VARCHAR(100) NOT NULL
);

-- Crear la tabla de libros si no existe
CREATE TABLE IF NOT EXISTS libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_publicacion DATE NOT NULL,
    autor_id INT NOT NULL,
    FOREIGN KEY (autor_id) REFERENCES autores(id) ON DELETE CASCADE
);

-- Insertar 10 registros de ejemplo en la tabla autores
INSERT INTO autores (nombre, apellido, nacionalidad) VALUES 
('Gabriel', 'García Márquez', 'Colombiana'),
('Isabel', 'Allende', 'Chilena'),
('J.K.', 'Rowling', 'Británica'),
('George', 'Orwell', 'Británica'),
('Julio', 'Cortázar', 'Argentina'),
('Haruki', 'Murakami', 'Japonesa'),
('Stephen', 'King', 'Estadounidense'),
('Paulo', 'Coelho', 'Brasileña'),
('Jane', 'Austen', 'Británica'),
('Miguel', 'de Cervantes', 'Española');

-- Insertar 10 registros de ejemplo en la tabla libros
INSERT INTO libros (titulo, descripcion, fecha_publicacion, autor_id) VALUES 
('Cien años de soledad', 'Una de las novelas más importantes de la literatura hispanoamericana.', '1967-05-30', 1),
('La casa de los espíritus', 'Novela de realismo mágico ambientada en Chile.', '1982-10-01', 2),
('Harry Potter y la piedra filosofal', 'El inicio de la saga de Harry Potter.', '1997-06-26', 3),
('1984', 'Distopía clásica sobre un régimen totalitario.', '1949-06-08', 4),
('Rayuela', 'Novela experimental con múltiples formas de lectura.', '1963-06-28', 5),
('Kafka en la orilla', 'Novela surrealista y filosófica.', '2002-09-12', 6),
('El resplandor', 'Novela de terror psicológico.', '1977-01-28', 7),
('El alquimista', 'Historia sobre la búsqueda del destino.', '1988-04-15', 8),
('Orgullo y prejuicio', 'Historia de amor y crítica social en la Inglaterra del siglo XIX.', '1813-01-28', 9),
('Don Quijote de la Mancha', 'Obra maestra de la literatura española.', '1605-01-16', 10);
