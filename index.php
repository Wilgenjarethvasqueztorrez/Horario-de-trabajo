<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestión de Horarios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 <link rel="stylesheet" href="src/css/styles.css">
</head>
<body>

  <main class="container mt-4">
    <h1 class="bg-info p-3 text-white text-center rounded">📋 LISTADO DE USUARIOS</h1>

    <div class="text-end mb-3">
      <a href="Formularios/AgregarUsuario.php" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Agregar Usuario
      </a>
    </div>

    <div class="table-container">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Hora de entrada</th>
            <th>Hora de salida</th>
            <th>Total de horas</th>
            <th>Horario</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require("Config/Conexion.php");

          $sql = $conexion->query("SELECT usuarios.*, horarios.horario 
                                   FROM usuarios 
                                   INNER JOIN horarios ON usuarios.horario_id = horarios.id 
                                   ORDER BY usuarios.nombre ASC");

          while ($resultado = $sql->fetch_assoc()) {
          ?>
            <tr>
              <td>
                <div class="nombre-apellido">
                  <span><strong><?php echo $resultado['nombre']; ?></strong></span>
                  <span><?php echo $resultado['apellido']; ?></span>
                </div>
              </td>
              <td><?php echo $resultado['rol']; ?></td>
              <td><?php echo $resultado['hora_entrada']; ?></td>
              <td><?php echo $resultado['hora_salida']; ?></td>
              <td><?php echo $resultado['total_horas']; ?></td>
              <td><?php echo $resultado['horario']; ?></td>
              <td class="acciones">
                <a href="Formularios/EditarUsuario.php?Id=<?php echo $resultado['id']; ?>" class="btn btn-warning btn-sm">
                  <i class="bi bi-pencil"></i> Editar
                </a>
                <a href="CRUD/eliminarUsuario.php?Id=<?php echo $resultado['id']; ?>" class="btn btn-danger btn-sm">
                  <i class="bi bi-trash3"></i> Eliminar
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class="text-center mt-4">
      <a href="alumno.php" class="btn btn-primary me-2">Agregar alumno</a>
      <a href="parcial.php" class="btn btn-primary">Agregar parcial</a>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
