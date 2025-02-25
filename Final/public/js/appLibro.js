// Ruta base de la API (ajústala según tu entorno).
const apiUrl = 'http://localhost/proyecto/public';

// Al cargar la página, se ejecuta la función para obtener todos los libros.
document.addEventListener('DOMContentLoaded', () => {
  getLibros();
  getAutoresForLibro(); // Obtener los autores cuando cargue la página
});

/**
 * Obtiene todos los libros desde la API y actualiza la tabla.
 */
const getLibros = () => {
  axios.get(`${apiUrl}/libros`)
    .then(response => {
      const libros = response.data;
      const tbody = document.querySelector('#librosTable tbody');
      tbody.innerHTML = '';
      libros.forEach(libro => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${libro.id}</td>
          <td>${libro.titulo}</td>
          <td>${libro.descripcion}</td>
          <td>${libro.fecha_publicacion}</td>
          <td>${libro.autor_nombre}</td>
          <td>
            <button class="btn btn-sm btn-info" onclick="editLibro(${libro.id})">Editar</button>
            <button class="btn btn-sm btn-danger" onclick="deleteLibro(${libro.id})">Eliminar</button>
          </td>
        `;
        tbody.appendChild(tr);
      });
    })
    .catch(error => console.error(error));
};

/**
 * Obtiene todos los autores para llenar el select de autores en el modal de libros.
 */
const getAutoresForLibro = () => {
  axios.get(`${apiUrl}/autores`)
    .then(response => {
      const autores = response.data;
      const select = document.getElementById('libroAutor');
      select.innerHTML = ''; // Limpiar el select antes de agregar los nuevos autores
      autores.forEach(autor => {
        const option = document.createElement('option');
        option.value = autor.id;
        option.innerText = `${autor.nombre} ${autor.apellido}`;
        select.appendChild(option);
      });
    })
    .catch(error => console.error(error));
};

/**
 * Abre el modal para agregar un nuevo libro.
 */
const openModalLibro = () => {
  document.getElementById('libroForm').reset();
  document.getElementById('libroId').value = '';
  document.getElementById('libroModalLabel').innerText = 'Agregar Libro';
};

/**
 * Envía el formulario para crear o actualizar un libro.
 */
document.getElementById('libroForm').addEventListener('submit', e => {
  e.preventDefault();
  const id = document.getElementById('libroId').value;
  const titulo = document.getElementById('libroTitulo').value;
  const descripcion = document.getElementById('libroDescripcion').value;
  const precio = document.getElementById('libroPrecio').value;
  const autor_id = document.getElementById('libroAutor').value;

  if (id) {
    axios.put(`${apiUrl}/libros`, { id, titulo, descripcion, precio, autor_id })
      .then(response => {
        $('#libroModal').modal('hide');
        getLibros();
      })
      .catch(error => console.error(error));
  } else {
    axios.post(`${apiUrl}/libros`, { titulo, descripcion, precio, autor_id })
      .then(response => {
        $('#libroModal').modal('hide');
        getLibros();
      })
      .catch(error => console.error(error));
  }
});

/**
 * Carga los datos de un libro en el formulario para editar.
 */
const editLibro = id => {
  axios.get(`${apiUrl}/libros/${id}`)
    .then(response => {
      const libro = response.data;
      document.getElementById('libroId').value = libro.id;
      document.getElementById('libroTitulo').value = libro.titulo;
      document.getElementById('libroDescripcion').value = libro.descripcion;
      document.getElementById('libroPrecio').value = libro.precio;
      document.getElementById('libroAutor').value = libro.autor_id;
      document.getElementById('libroModalLabel').innerText = 'Editar Libro';
      $('#libroModal').modal('show');
    })
    .catch(error => console.error(error));
};

/**
 * Elimina un libro.
 */
const deleteLibro = id => {
  if (confirm('¿Estás seguro de eliminar este libro?')) {
    axios.delete(`${apiUrl}/libros`, { data: { id } })
      .then(response => getLibros())
      .catch(error => console.error(error));
  }
};
