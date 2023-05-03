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

<body bgcolor="c0c0c0">
   <?php
   include "header.php";
   include "links.php";
   ?>
   <center>
      <h1>Cartões de identificação</h1>
   </center>
   <div style="
      margin: 0 auto;
      width: 60%;
      ">

      <?php
      $conexao = mysqli_connect("$host", "$user", "$pass", "$bd");
      $candidato_id = $_SESSION['id'];
      $candidato_query = mysqli_query(
         $conexao,
         "SELECT cand_nome, cand_inscricao, cand_nascimento, cand_doc_identificacao, loc_descricao, loc_endereco
          FROM candidatos, locais 
          WHERE loc_id = cand_loc_id"
      );
      // cand_nome	cand_nascimento	cand_doc_identificacao	loc_descricao	loc_endereco
      echo "
         <style>
            p {
               font-size: 1rem;
               font-weight: normal;
            }
         </style>
      ";

      while ($candidato = mysqli_fetch_assoc($candidato_query)) {

         $data_nascimento_formatado = date('d/m/Y', strtotime($candidato['cand_nascimento']));
         
         echo "<h1>Cartão de Identificação</h1>";
         echo "<h2>Candidato: {$candidato['cand_nome']}</h2>";
         echo "<p><strong>Inscrição:</strong> {$candidato['cand_inscricao']}</p>";
         echo "<p><strong>Data de Nascimento:</strong> {$data_nascimento_formatado}</p>";
         // echo "<p><strong>Data de Nascimento:</strong> {$candidato['cand_nascimento']}</p>";
         echo "<p><strong>Documento de Identidade:</strong> {$candidato['cand_doc_identificacao']}</p>";
         echo "<p><strong>Local da Prova:</strong> {$candidato['loc_descricao']}</p>";
         echo "<p><strong>Endereço do Local de Prova:</strong> {$candidato['loc_endereco']}</p>";
         echo "<p><strong>Data da Prova: </strong>28/05/2023</p>";
         echo "<hr>";
      }

      ?>
      <!-- <p><strong>Data da Prova: </strong>28/05/2023</p> -->
   </div>

</body>

</html>