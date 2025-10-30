<!doctype html>
<html lang="en">
  <head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar horarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
<body>
 <h1 class="bg-black p-2 text-white text-center">Editar Horario</h1>
 <br>
 <form class="container" action="../CRUD/editarHorario.php" method="post">
  <?php
   include ('../Config/Conexion.php');

   $sql ="SELECT * FROM horarios WHERE id =".$_GET['Id'];
   $resultado = $conexion->query($sql);

   $row = $resultado->fetch_assoc();
  ?>
    <input type="hidden" class="form-control" name="Id" value="<?php echo $row['id']; ?>">

 <!--Traer datos de horario-->
<div class="mb-3">
    <label class="form-label">Horario</label>
    <input type="text" class="form-control" name="horario" value="<?php echo $row['horario']; ?>">
  </div>

  <div class="text-center">
   <button type="submit" class="btn btn-danger">Actualizar</button>
   <a href="../horario.php" class="btn btn-dark">Cancelar</a>
  </div>
 
 </form>
</body>
