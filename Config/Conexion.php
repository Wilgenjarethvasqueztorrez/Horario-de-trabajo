<?php

  $host = "localhost";
  $user = "root";
  $pass = "wilgen12345";
  $db = "control-asistencia";

  $conexion =new mysqli($host,$user,$pass,$db);

  if (!$conexion) {
    echo 'Conexion fallida';
  }