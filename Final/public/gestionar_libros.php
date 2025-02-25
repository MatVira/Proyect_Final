<?php include 'templates/header.php'; ?>

<h1>Gestión de Libros</h1>
<div class="mb-3">
  <button class="btn btn-primary" data-toggle="modal" data-target="#libroModal" onclick="openModalLibro();">Agregar Libro</button>
</div>
<table class="table table-bordered" id="librosTable">
  <thead>
    <tr>
      <th>ID</th>
      <th>Titulo</th>
      <th>Descripción</th>
      <th>Fecha_Publicacion</th>
      <th>Autor</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <!-- Se llenarán dinámicamente mediante JavaScript -->
  </tbody>
</table>

<!-- Modal para Libros -->
<div class="modal fade" id="libroModal" tabindex="-1" role="dialog" aria-labelledby="libroModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="libroModalLabel" class="modal-title">Agregar Libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="libroForm">
          <input type="hidden" id="libroId">
          <div class="form-group">
            <label for="libroTitulo">Título</label>
            <input type="text" class="form-control" id="libroTitulo" required>
          </div>
          <div class="form-group">
            <label for="libroDescripcion">Descripción</label>
            <textarea class="form-control" id="libroDescripcion" required></textarea>
          </div>
          <div class="form-group">
            <label for="libroPrecio">Fecha_Publicacion</label>
            <input type="number" class="form-control" id="libroPrecio" required>
          </div>
          <div class="form-group">
            <label for="libroAutor">Autor</label>
            <select class="form-control" id="libroAutor" required>
              <!-- Los autores se llenarán dinámicamente mediante JavaScript -->
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'templates/footer.php'; ?>
