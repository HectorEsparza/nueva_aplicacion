<?php
  //Opción 0 Enviar a inciar sesión
  //Opción 1 Dejar en inicio.html
  session_start();
  if(!isset($_SESSION["usuario"])){
    $usuario = "";
  }
  else{
    $usuario = $_SESSION["usuario"];
  }

  require_once("funciones/conexionLocalBD.php");
  $resultados = array();


  $base = conexion_local();
  $consulta = "SELECT * FROM USUARIOS WHERE USUARIO=?";
  $resultado = $base->prepare($consulta);
  $resultado->execute(array($usuario));

  $resultados["opcion"] = $resultado->rowCount();

  $resultado->closeCursor();
  $base = null;
  echo json_encode($resultados);

?>
