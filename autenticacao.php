<?php

include "scripts/funcoes.inc";
autentica($_POST['usuario'], $_POST['codigo']);

function autentica($usuario, $codigo)
{
   global $host, $user, $pass, $bd;

   $conectar = mysqli_connect($host, $user, $pass, $bd);
   // mysqli_select_db($bd, $conectar);
   $resultado = mysqli_query(
      $conectar,
      "SELECT usu_id, usu_login
      FROM usuarios
      WHERE usu_login = '$usuario'
      AND usu_codigo = PASSWORD('$codigo')
      AND usu_status IS NULL"
   );

   $num_linhas = mysqli_num_rows($resultado);
   if ($num_linhas == "1") {
      $linha = mysqli_fetch_assoc($resultado);
      $id_usuario = $linha["usu_id"];
      $login_usuario = $linha["usu_login"];
      session_start();
      $_SESSION["id"] = $id_usuario;
      $_SESSION["login"] = $login_usuario;
      header("location: seleto.php");
   } else {
      header("location: index.php");
   }
}
