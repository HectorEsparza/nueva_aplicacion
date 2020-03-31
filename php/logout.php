<?php
  session_start();
  $_SESSION = array();
  // Finalmente, destruir la sesión.
  session_destroy();

  $resultados = array();

  $resultados["opcion"] = 1;

  echo json_encode($resultados);

?>
