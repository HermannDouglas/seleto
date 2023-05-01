<?php
include "scripts/configura.php";
include "scripts/funcoes.inc.php";
session_start();
verificaSessao();
?>
<html lang="pt-bt">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cartão de identificação</title>
</head>

<body>
   <?php include "header.php" ?>
   <center>
      <h1>Cartão de identificação</h1>
   </center>

   <?php
   $conexao = mysqli_connect("$host", "$user", "$pass", "$bd");
   $candidato_id = $_SESSION['id'];
   $candidato_query = mysqli_query(
      $conexao,
      "SELECT cand_nome, cand_nascimento, cand_doc_identificacao, loc_descricao, loc_endereco
       FROM candidatos, usuarios, locais 
       WHERE cand_id = $candidato_id
       AND usu_id = cand_id
       AND loc_id = cand_loc_id"
   );
   // cand_nome	cand_nascimento	cand_doc_identificacao	loc_descricao	loc_endereco

   $candidato = mysqli_fetch_assoc($candidato_query);

   echo "<h1>Cartão de Identificação</h1>";
   echo "<p><strong>Nome:</strong> {$candidato['cand_nome']}</p>";
   echo "<p><strong>Data de Nascimento:</strong> " . date('d/m/Y', strtotime($candidato['cand_nascimento'])) . "</p>";
   // echo "<p><strong>Data de Nascimento:</strong> {$candidato['cand_nascimento']}</p>";
   echo "<p><strong>Documento de Identidade:</strong> {$candidato['cand_doc_identificacao']}</p>";
   echo "<p><strong>Local da Prova:</strong> {$candidato['loc_descricao']}</p>";
   echo "<p><strong>Endereço do Local de Prova:</strong> {$candidato['loc_endereco']}</p>";

   ?>
   <p><strong>Data da Prova: </strong>28/05/2023</p>

</body>

</html>