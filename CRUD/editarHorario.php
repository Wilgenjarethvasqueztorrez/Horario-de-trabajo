<?php

include ("../Config/Conexion.php");

$id = $_POST['Id'];
$Horario = $_POST['horario'];

$sql = "UPDATE horarios SET 
               id='".$id."', 
               horario='".$Horario."' WHERE id = ".$id."";

if ($resultado = $conexion->query($sql)) {
    header("location:../horario.php");
}




  
