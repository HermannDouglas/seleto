<?php
include "scripts/configura.php";
include "scripts/funcoes.inc.php";
session_start();
verificaSessao();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Seleto</title>
</head>

<body bgcolor="C0C0C0">
   <?php include "header.php"; ?>
   

   <font size=2 face=arial>
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
         echo "<font size=2<center>Bem-vindo(a). $nome ($login) !<p><font size=\"1\">";
         imprimeData();
         ?>
         </center>
   </font>

   <p>
      <font size=2><b>
         <?php
         echo "
            <hr width=\"60%\" align=\"center\">
            <center>
               [<a href=\"\cadastro_candidato.php?id=$_SESSION[id]\">FICHA DE INSCRIÇÃO</a>] |
               [<a href=\"\cartao_identificacao.php?id=$_SESSION[id]\">CARTÕES DE IDENTIFICAÇÃO</a>] |
               [<a href=\"\candidatos_por_cargo.php?id=$_SESSION[id]\">CANDIDATOS POR CARGO</a>] |
               [<a href=\"encerra_sessao.php\">ENCERRAR SESSÃO</a>]
            </center>
         ";
         ?>

</body>

</html>