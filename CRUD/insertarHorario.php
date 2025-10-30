<?php

include ("../Config/Conexion.php");

$horario = $_POST['HorarioTrabajo'];

$sql = "INSERT INTO horarios(horario) VALUES('$horario')";

$resultado = mysqli_query($conexion, $sql);

if ($resultado === TRUE) {
   header("location:../Horario.php");
} else {
  echo "Horario no insertado";
}

