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
   <title>Canditatos por cargo</title>
</head>

<body bgcolor="c0c0c0">
   <?php
   include "header.php";
   include "links.php";
   ?>
   <center>
      <h1>Lista de candidatos por cargo</h1>
   </center>

   <div style="
      margin: 0 auto;
      width: 60%;
      ">

      <?php
      $conexao = mysqli_connect("$host", "$user", "$pass", "$bd");
      $lista_candidatos_cargo = mysqli_query(
         $conexao,
         "SELECT cand_nome, car_descricao 
          FROM candidatos, cargos 
          WHERE cand_car_id = car_id
          ORDER BY car_descricao"
      );

      // $cargo_atual = "";
      $cargo_anterior = "";

      echo "<ul>";
      while ($candidato = mysqli_fetch_assoc($lista_candidatos_cargo)) {

         $candidato_nome = $candidato['cand_nome'];
         // $cargo_nome = $candidato['car_descricao'];
         $cargo_atual = $candidato['car_descricao'];

         if ($cargo_atual != $cargo_anterior) {
            echo "</ul>";
            echo "<h2 style=\"font-size: 1.5rem;\" >$cargo_atual:</h2>";
            echo "<ul>";
            $cargo_anterior = $cargo_atual;
         }

         echo "<li style=\"font-size: 1.1rem;\">$candidato_nome</li>";
      }
      echo "</ul>";

      ?>
      <!-- </center> -->
   </div>
</body>

</html>