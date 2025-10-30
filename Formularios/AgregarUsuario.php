<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="bg-black p-2 text-white text-center">Agregar usuario</h1>
    <div class="container">
    <form action="../CRUD/insertarUsuario.php" method="post">
     <div class="mb-3">
         <label class="form-label">Nombre</label>
         <input type="text" class="form-control" name="NombreUsuario">
      </div>
      <div class="mb-3">
         <label class="form-label">Apellido</label>
         <input type="text" class="form-control" name="ApellidoUsuario">
      </div>
      <label for="">Rol</label>
<select class="form-select mb-3" name="RolUsuario" required>
  <option selected disabled>--Seleccionar rol--</option>
  <?php
    include ("../Config/Conexion.php");
    $sql = $conexion->query("SHOW COLUMNS FROM usuarios LIKE 'rol'");
    if ($sql && $columna = $sql->fetch_assoc()) {
      $tipo = $columna['Type']; // Ejemplo: enum('admin','editor','usuario')
      preg_match("/^enum\('(.*)'\)$/", $tipo, $matches);
      $valores_enum = explode("','", $matches[1]);
      foreach ($valores_enum as $valor) {
        echo "<option value='".$valor."'>".ucfirst($valor)."</option>";
      }
    }
  ?>
</select>

      <div class="mb-3">
         <label class="form-label">Hora de entrada</label>
         <input type="time" class="form-control" name="HoraEntrada" id="horaEntrada">
      </div>
      <div class="mb-3">
         <label class="form-label">Hora de salida</label>
         <input type="time" class="form-control" name="HoraSalida" id="horaSalida">
      </div>
      <div class="mb-3">
   <label class="form-label">Total de horas</label>
   <input type="text" class="form-control" name="TotalHoras" id="totalHoras" readonly>

   <script>
   function calcularHoras() {
      const entrada = document.getElementById("horaEntrada").value;
      const salida = document.getElementById("horaSalida").value;

      if (entrada && salida) {
         const [hEntrada, mEntrada] = entrada.split(":").map(Number);
         const [hSalida, mSalida] = salida.split(":").map(Number);

         const entradaMin = hEntrada * 60 + mEntrada;
         const salidaMin = hSalida * 60 + mSalida;

         let totalMin = salidaMin - entradaMin;
         if (totalMin < 0) totalMin += 24 * 60; // soporte para turnos nocturnos

         const horas = Math.floor(totalMin / 60);
         const minutos = totalMin % 60;

         document.getElementById("totalHoras").value = `${horas}h ${minutos}m`;
      }
   }

   // Escuchar cambios en los campos de hora
   document.addEventListener("DOMContentLoaded", function() {
      const entradaInput = document.getElementById("horaEntrada");
      const salidaInput = document.getElementById("horaSalida");

      if (entradaInput && salidaInput) {
         entradaInput.addEventListener("change", calcularHoras);
         salidaInput.addEventListener("change", calcularHoras);
      }
   });
   </script>
</div>

      
        <label for="">Horario</label>
     <select class="form-select mb-3" name="HorarioUsario">
     <option selected disabled>--Seleccionar horario--</option>
     <?php
       include ("../Config/Conexion.php");
       $sql = $conexion->query("SELECT * FROM horarios");
       while ($resultado = $sql->fetch_assoc()) {
        echo "<option value='".$resultado['id']."'>".$resultado['horario']."</option>";
       }
     ?>
   </select>
   
  <div class="text-center">
   <button type="submit" class="btn btn-danger">Registrar</button>
   <a href="../index.php" class="btn btn-dark">Regresar</a>
  </div>
 
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>