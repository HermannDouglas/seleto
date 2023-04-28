<?php

include "scripts/funcoes.inc";
autentica($_POST['usuario'], $_POST['codigo']);

function autentica($usuario, $codigo)
{
   global $host, $user, $pass, $bd;

   // verifica se a conexão foi bem-sucedida
   $conectar = mysqli_connect($host, $user, $pass, $bd);
   if (mysqli_connect_errno()) {
      die("Erro de conexão: " . mysqli_connect_error());
   }

   // $query = "SELECT usu_id, usu_login FROM usuarios WHERE usu_login = ? AND usu_codigo = PASSWORD(?) AND usu_status IS NULL";
   $query = "SELECT usu_id, usu_login FROM usuarios WHERE usu_login = ? AND usu_codigo = SHA1(CONCAT('$codigo', usu_salt)) AND usu_status IS NULL";
   
   $stmt = mysqli_prepare($conectar, $query);
   mysqli_stmt_bind_param($stmt, 'ss', $usuario, $codigo);
   mysqli_stmt_execute($stmt);
   
   $resultado = mysqli_stmt_get_result($stmt);

   $num_linhas = mysqli_num_rows($resultado);
   if ($num_linhas == 1) {
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
?>
