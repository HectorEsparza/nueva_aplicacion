<?php
  //conexion base de datos local
  function conexion_local(){

    $base = new PDO("mysql:host=localhost;dbname=aplicacion_2.0","root","");
    //$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");
    return $base;
  }

?>
