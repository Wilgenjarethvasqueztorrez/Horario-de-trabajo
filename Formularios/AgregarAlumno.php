<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="bg-black p-2 text-white text-center">Agregar alumnos</h1>
    <div class="container">
    <form action="../CRUD/insertarUsuario.php" method="post">
    
    <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" class="form-control" name="NombreAlumno">
  </div>

  <div class="mb-3">
    <label class="form-label">Apellido</label>
    <input type="text" class="form-control" name="ApellidoAlumno">
  </div>

  <div class="mb-3">
    <label class="form-label">Genero</label>
    <input type="text" class="form-control" name="GeneroAlumno">
  </div>

  <div class="mb-3">
    <label class="form-label">Dirección</label>
    <input type="text" class="form-control" name="DireccionAlumno">
  </div>

  <div class="mb-3">
    <label class="form-label">Telefono</label>
    <input type="number" class="form-control" name="TelefonoAlumno">
  </div>

  <div class="mb-3">
    <label class="form-label">Correo</label>
    <input type="gmeil" class="form-control" name="CorreoAlumno">
  </div>
  <div class="text-center">
   <button type="submit" class="btn btn-danger">Registrar</button>
   <a href="../index.php" class="btn btn-dark">Regresar</a>
  </div>
 
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>