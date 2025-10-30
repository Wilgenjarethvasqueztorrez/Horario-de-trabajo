<?php

include ("../Config/Conexion.php");

$nombre = $_POST['NombreUsuario'];
$apellido = $_POST['ApellidoUsuario'];
$rol = $_POST['RolUsuario'];
$horaentrada = $_POST['HoraEntrada'];
$horasalida = $_POST['HoraSalida'];
$totalhoras = $_POST['TotalHoras'];
$horario = $_POST['HorarioUsario'];

$sql = "INSERT INTO usuarios(nombre,apellido,rol,hora_entrada,hora_salida,total_horas,horario_id) VALUES('$nombre','$apellido','$rol','$horaentrada','$horasalida','$totalhoras','$horario')";

$resultado = mysqli_query($conexion, $sql);

if ($resultado === TRUE) {
   header("location:../Index.php");
} else {
  echo "usuario no insertado";
}