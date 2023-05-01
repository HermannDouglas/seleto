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
   <title>Cadastro candidatos</title>
</head>

<body>
   <?php include "header.php"; ?>
   <?php
   if (!isset($grava_bd)) {
   }
   ?>
   <table align="center" border="0" width="80%" cellspacing="1">
      <tr>
         <td width=100% bgcolor="C0C0C0" valign="middle">
            <center>
               <font face="Verdana" color="black" size="2"><b>
                     <p><u>FICHA DE INSCRIÇÃO</u></p>
            </center>
            <p>
               <i>
                  <font size="1">Os campos em negrito são de preenchimento obrigatório.</font>
               </i>
            </p>
            <form method="post" name="formulario" action="<?php $PHP_SELF; ?>">
               <font color="red">
                  Número de inscrição:
               </font>
               <input type="text" name="candidato_inscricao" size="10" maxlength="6">
               <br>Nome Completo:
               <input type="text" name="candidato_nome" size="32" maxlength="255">
               <font color="red">
                  Data Nascimento:
               </font>
               <input type="date" name="data_nascimento">
               <b><br>Endereço:
                  <input type="text" name="candidato_endereco" size="74" maxlength="200">
               </b><br></b>
               Telefone(s):
               <input type="text" name="candidato_telefone" size="32" maxlength="30"><br>
               <b>Cargo Desejado:<select size="1" name="candidato_cargo_id">
                     <option selected>Selecione ::</option>
                     <?php
                     $conexao = mysqli_connect($host, $user, $pass, $bd);
                     $sql = mysqli_query($conexao, "SELECT car_id, car_descricao FROM cargos");
                     while ($linha = mysqli_fetch_row($sql)) {
                        echo "<option value=\"$linha[0]\">$linha[0] - $linha[1]</option>";
                     }
                     ?>
                  </select><br>
                  <hr width=50% align=left>
               </b>
               Filiação:<br><br>
               Pai:
               <input type="text" name="candidato_pai" size="32" maxlength="255"><br>
               Mãe:
               <input type="text" name="candidato_mae" size="32" maxlength="255"><br>
               <b>
                  Identificação Nº:
                  <input type="text" name="candidato_documento_identificacao" size="15" maxlength=20>
                  Tipo:
                  <select size="1" name="canndidato_tipo_identidade">
                     <option selected>Selecione ::</option>
                     <option value=2>2 - RG</option>
                     <option value=3>3 - Cart. Habilitação</option>
                     <option value=4>4 - Cart. Trabalho</option>
                     <option value=5>5 - Cart. Policial (Fed, Mil, Civ)</option>
                     <option value=6>6 - Reg. Conselho (CRM, OAB, etc)</option>
                     <option value=7>7 - Reg. Forças Armadas (Exe, Aer, Mar)</option>
                  </select><br>

                  <hr width=50% align=left>
                  Data Inscrição:
                  <input type="date" name="data_inscricao">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>Data Cadastro:</b>
                  <?php
                  echo date('Y-m-d');
                  $candidato_data_cadastro = date('Y-m-d');
                  echo "<input type=\"hidden\" value = $candidato_data_cadastro name=\"candidato_data_cadastro\">";
                  ?>
                  <br><br>
                  <input type="reset" value="Limpar" name="limpar"> |
                  <input type="submit" value="Gravar >>" name="grava_bd">
            </form>
            </p>
   </table>
</body>

</html>