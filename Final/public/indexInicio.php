<?php include 'templates/header.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Libros y Autores</title>

  <!-- Incluir el archivo CSS -->
  <link rel="stylesheet" href="../public/styles/style.css">
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="fw-bold">Universidad de las Fuerzas Armadas ESPE</h1>
        <h2>Proyecto final</h2>
      </div>
    </div>

    <div class="container text-center my-5">
      <img src="https://www.espe.edu.ec/wp-content/uploads/2018/11/espe.png" alt="Logo ESPE" class="logo">
      <br>
      <br>
      <hr class="divider">
      <h5><strong>Ingeniería en Tecnologías de la Información y Comunicación</strong></h5>
      <p><strong>Asignatura:</strong> Aplicación de Tecnologías WEB</p>
      <p><strong>Actividad:</strong> Laboratorio N. 3</p>
      <p><strong>Nombres y apellidos: <br></strong>
        Fonseca Escobar Harvey Joel <br>
        Tamayo Ñaupa César Augusto <br>
        Kevin Israel Yugla Suntaxi <br>
        Viracucha Armijos Mateo David
      </p>
      <p><strong>Docente:</strong> Ing. Cudco Pomagualli Angel Geovanny</p>
      <p><strong>NRC:</strong> 1382</p>

      <br>

      <hr class="divider">
      <h2 class="fw-bold">Resumen de la Aplicación</h2>
      <hr class="divider">

      <p><strong>Enlaces para la gestión de Autores:</strong> http://localhost:3000/Final/public/gestionar_Autores.php
      </p>
      <p><strong>Enlaces para la gestión de Libros:</strong> http://localhost:3000/Final/public/gestionar_Libros.php
      </p>
      <br>
      <p style="text-align: justify;">

        El Sistema de Gestión de Libros y Autores es una aplicación web desarrollada en PHP con un enfoque modular y
        estructurado, que permite administrar una base de datos de libros y autores.
        La plataforma facilita el registro, edición y eliminación de libros y sus respectivos autores, asegurando una
        gestión eficiente y organizada de la información.
        <br>
        <br>
        La aplicación sigue una arquitectura basada en (MVC) controladores, modelos, repositorios y servicios, lo que
        mejora la escalabilidad y el mantenimiento del código.
        Además, utiliza JavaScript con Axios para la interacción dinámica con el backend, permitiendo una experiencia
        fluida para el usuario.

      </p>

    </div>

</body>



<?php include 'templates/footer.php'; ?>



</html>