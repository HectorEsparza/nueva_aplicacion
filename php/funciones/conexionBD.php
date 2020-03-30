<?php
  //conexion base de datos local y en producción
  function conexion_local(){

    $base = new PDO("mysql:host=50.62.209.84;dbname=aplicacion","hesparza","b29194303");
    //$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");
    return $base;
  }

?>
