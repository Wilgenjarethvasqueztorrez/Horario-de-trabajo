<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Horario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="bg-black p-2 text-white text-center">Agregar alumnos</h1>
    <div class="container">
    <form action="../CRUD/insertarHorario.php" method="post">
    
    <div class="mb-3">
    <label class="form-label">Horario</label>
    <input type="text" class="form-control" name="HorarioTrabajo">
  </div>

  <div class="text-center">
   <button type="submit" class="btn btn-danger">Registrar</button>
   <a href="../horario.php" class="btn btn-dark">Cancelar</a>
  </div>
 
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>