<?php
include "scripts/configura.php";
include "scripts/funcoes.inc.php";
session_start();
verificaSessao();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Seleto</title>
</head>

<body bgcolor="C0C0C0">
   <?php include "header.php"; ?>


   <font size="2" face="arial">
      <center>
         <p><u><b>ACESSO PRINCIPAL</b></u></p>
      </center>
      <p></b>
         <?php
         $conexao = mysqli_connect("$host", "$user", "$pass", "$bd");
         $boas_vindas = mysqli_query(
            $conexao,
            "SELECT usu_nome, usu_login
             FROM usuarios
             WHERE usu_id = $_SESSION[id]"
         );

         $linha = mysqli_fetch_assoc($boas_vindas);
         $nome = $linha["usu_nome"];
         $login = $linha["usu_login"];
         echo "<font size=\"2\"<center>Bem-vindo(a). $nome ($login) !<p><font size=\"1\">";
         imprimeData();
         echo "<p>";
         ?>
         </center>
   </font>
   <p>
      <hr width="60%" align="center">
      <?php include "links.php"; ?>

</body>

</html>