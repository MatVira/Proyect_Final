<?php include 'templates/header.php'; ?>

<h1>Gestión de Autores</h1>
<div class="mb-3">
  <button class="btn btn-primary" data-toggle="modal" data-target="#autorModal" onclick="openModalAutor();">Agregar
    Autor</button>
</div>
<table class="table table-bordered" id="autoresTable">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Nacionalidad</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <!-- Se llenarán dinámicamente mediante JavaScript -->
  </tbody>
</table>

<!-- Modal para agregar/editar Autor -->
<div class="modal fade" id="autorModal" tabindex="-1" aria-labelledby="autorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="autorModalLabel">Agregar Autor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="autorForm">
          <input type="hidden" id="autorId">
          <div class="form-group">
            <label for="autorNombre">Nombre</label>
            <input type="text" class="form-control" id="autorNombre" required>
          </div>
          <div class="form-group">
            <label for="autorApellido">Apellido</label>
            <input type="text" class="form-control" id="autorApellido" required>
          </div>
          <div class="form-group">
            <label for="autorNacionalidad">Nacionalidad</label>
            <input type="text" class="form-control" id="autorNacionalidad" required>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap y scripts de JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


<?php include 'templates/footer.php'; ?>