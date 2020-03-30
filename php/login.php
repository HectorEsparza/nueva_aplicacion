<?php
  //Opción 0 Enviar a cambiar contraseña
  //Opción 1 Login existoso
  //Opción 2 Login erroneo
  require_once("funciones/conexionLocalBD.php");

  $usuario =  $_POST['usuario'];
  $password =  $_POST['password'];
  $resultados = array();
  $base = conexion_local();
  $consulta = "SELECT * FROM USUARIOS WHERE USUARIO=?";
  $resultado = $base->prepare($consulta);
  $resultado->execute(array($usuario));
  $registro = $resultado->fetch(PDO::FETCH_ASSOC);

  if($password==$registro["Clave"]){
    $resultados["opcion"] = 0;
  }
  else{
    if(password_verify($password, $registro["Clave"]) && $registro["Estatus"]=="Activo"){
      $resultados["opcion"] = 1;
    }
    else{
      $resultados["opcion"] = 2;
    }
  }

  $resultado->closeCursor();
  $base = null;

  echo json_encode($resultados);

?>
