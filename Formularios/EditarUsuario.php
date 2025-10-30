<!doctype html>
<html lang="en">
  <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Editar usuario</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
<body>
 <h1 class="bg-black p-2 text-white text-center">EDITAR USUARIO</h1>
 <br>
 <form class="container" action="../CRUD/editarAlumno.php" method="post">
  <?php
   include ('../Config/Conexion.php');
   $sql = "SELECT * FROM usuarios WHERE id = " . $_GET['Id'];
   $resultado = $conexion->query($sql);
   $row = $resultado->fetch_assoc();
  ?>
  <input type="hidden" class="form-control" name="Id" value="<?php echo $row['id']; ?>">

  <!-- Nombre -->
  <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" class="form-control" name="NombreUsuario" value="<?php echo $row['nombre']; ?>">
  </div>

  <!-- Apellido -->
  <div class="mb-3">
    <label class="form-label">Apellido</label>
    <input type="text" class="form-control" name="ApellidoUsuario" value="<?php echo $row['apellido']; ?>">
  </div>

  <!-- Rol (ENUM) -->
  <label for="">Rol</label>
  <select class="form-select mb-3" name="RolUsuario" required>
    <option disabled>--Seleccionar rol--</option>
    <?php
      $sqlRol = $conexion->query("SHOW COLUMNS FROM usuarios LIKE 'rol'");
      if ($sqlRol && $columna = $sqlRol->fetch_assoc()) {
        $tipo = $columna['Type'];
        preg_match("/^enum\('(.*)'\)$/", $tipo, $matches);
        $valores_enum = explode("','", $matches[1]);
        foreach ($valores_enum as $valor) {
          $selected = ($row['rol'] == $valor) ? "selected" : "";
          echo "<option value='$valor' $selected>" . ucfirst($valor) . "</option>";
        }
      }
    ?>
  </select>

  <!-- Hora de entrada -->
  <div class="mb-3">
    <label class="form-label">Hora de entrada</label>
    <input type="time" class="form-control" name="HoraEntrada" id="horaEntrada" value="<?php echo $row['hora_entrada']; ?>">
  </div>

  <!-- Hora de salida -->
  <div class="mb-3">
    <label class="form-label">Hora de salida</label>
    <input type="time" class="form-control" name="HoraSalida" id="horaSalida" value="<?php echo $row['hora_salida']; ?>">
  </div>

  <!-- Total de horas -->
  <div class="mb-3">
    <label class="form-label">Total de horas</label>
    <input type="text" class="form-control" name="TotalHoras" id="totalHoras" value="<?php echo $row['total_horas']; ?>" readonly>
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
          if (totalMin < 0) totalMin += 24 * 60;
          const horas = Math.floor(totalMin / 60);
          const minutos = totalMin % 60;
          document.getElementById("totalHoras").value = `${horas}h ${minutos}m`;
        }
      }
      document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("horaEntrada").addEventListener("change", calcularHoras);
        document.getElementById("horaSalida").addEventListener("change", calcularHoras);
      });
    </script>
  </div>

  <!-- Horario -->
  <label for="">Horario</label>
  <select class="form-select mb-3" name="HorarioUsuario">
    <option disabled>--Seleccionar horario--</option>
    <?php
      $sqlHorario = $conexion->query("SELECT * FROM horarios");
      while ($horario = $sqlHorario->fetch_assoc()) {
        $selected = ($row['horario_id'] == $horario['id']) ? "selected" : "";
        echo "<option value='".$horario['id']."' $selected>".$horario['horario']."</option>";
      }
    ?>
  </select>

  <div class="text-center">
    <button type="submit" class="btn btn-danger">Actualizar</button>
    <a href="../index.php" class="btn btn-dark">Regresar</a>
  </div>
 </form>
</body>
</html>
