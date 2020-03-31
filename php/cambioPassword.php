<?php
  require_once("funciones/conexionLocalBD.php");
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  $resultados = array();
  $cifrada = password_hash($password, PASSWORD_DEFAULT);

  $base = conexion_local();
  $consulta = "UPDATE USUARIOS SET CLAVE=? WHERE USUARIO=?";
  $resultado = $base->prepare($consulta);
  $resultado->execute(array($cifrada, $usuario));

  $resultado->closeCursor();
  
  $base = null;

  $resultados["opcion"] = 0;

  echo json_encode($resultados);

?>
