<?php
include "scripts/configura.php";
include "scripts/funcoes.inc";
verifica_sessao();
?>
<HTML>

<HEAD>
   <meta charset="utf-8" />
   <title>SELETO - Ficha de Inscri��o</title>

</HEAD>

<body>
   <!-- <table ALIGN=CENTER border=0 width=90% cellspacing=1>

      <Tr>
         <td></td>
      </tr>
   </table> -->
   <table ALIGN=CENTER border=0 width=90% cellspacing=1>
      <tr>
         <td width=100% bgcolor=C0C0C0 valign=middle>
            <center>
               <font face=Verdana color=black><b>

                     <FONT SIZE=2>
                        <p><u>FICHA DE INSCRI��O</u></p>
            </center>
            <p>
               <i>
                  <font size=1>Os campos em negrito s�o de preenchimento obrigat�rio.
               </i>
            <form method="post" name=formulario action="cad_candidato_grava.php">
               <font color=red>Num. Inscri��o: &nbsp;</font>
               <input type="text" name="cand_inscricao" size="10" maxlength="6">
               <Br>Nome Completo: <input type="text" name="cand_nome" size="32" maxlength="255">
               &nbsp;&nbsp;
               <font color=red>Data Nascimento: </font>
               <?php
               // INICIO DO SCRIPT PARA MENU DATA NASCIMENTO

               echo "<select name=\"dia_nascimento\">\n";
               for ($i = 1; $i <= 31; $i++) {
                  $i = sprintf("%02d", $i); // preencher com zero � esquerda 
                  echo "\t<option value=$i>$i</option>\n";
               }
               echo "</select>";

               // construindo o select do m�s 
               echo "<select name=\"mes_nascimento\">\n";
               for ($i = 1; $i <= 12; $i++) {
                  $i = sprintf("%02d", $i); // preencher com zero � esquerda 
                  echo "\t<option value=$i>$i</option>\n";
               }
               echo "</select>";

               // construindo o select do ano 
               echo "<select name=\"ano_nascimento\">\n";
               for ($i = 1930; $i <= 2006; $i++)
                  echo "\t<option value=$i>$i</option>\n";
               echo "</select>";
               ?>

               <b><br>Endere�o: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="text" name="cand_endereco" size="74" maxlength=200>
               </b><br></b>
               Telefone(s):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input type="text" name="cand_fone" size="32" maxlength="30"><br>
               <b>Cargo Desejado:<select size="1" name="cand_car_id">
                     <option selected>Selecione ::</option>
                     <?php
                     $conexao = mysqli_connect($host, $user, $pass, $bd);
                     $sql = mysqli_query($conexao, "SELECT car_id, car_descricao from cargos");
                     while ($linha = mysqli_fetch_row($sql)) {
                        echo "<option value=\"$linha[0]\">$linha[0] - $linha[1]</option>";
                     }
                     ?>
                  </select><br>
                  <hr width=20% align=left>
               </b></b>
               Filia��o: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               Pai: <input type="text" name="cand_pai" size="32" maxlength="255"><br>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               M�e: <input type="text" name="cand_mae" size="32" maxlength="255"><br>
               <b>
                  Identifica��o N�: <input type="text" name="cand_doc_identificacao" size="15" maxlength=20>
                  &nbsp;&nbsp;
                  Tipo: <select size="1" name="cand_tipo_doc_ident">
                     <option selected>Selecione ::</option>
                     <option value=2>2 - RG</option>
                     <option value=3>3 - Cart. Habilita��o</option>
                     <option value=4>4 - Cart. Trabalho</option>
                     <option value=5>5 - Cart. Policial (Fed, Mil, Civ)</option>
                     <option value=6>6 - Reg. Conselho (CRM, OAB, etc)</option>
                     <option value=7>7 - Reg. For�as Armadas (Exe, Aer, Mar)</option>
                  </select><br>
                  <hr width=20% align=left>
                  Data Inscri��o: <?php
                                    // INICIO DO SCRIPT PARA MENU DATA INSCRICAO

                                    echo "<select name=\"dia_inscricao\">\n";
                                    for ($i = 15; $i <= 31; $i++) {
                                       $i = sprintf("%02d", $i); // preencher com zero � esquerda 
                                       echo "\t<option value=$i>$i</option>\n";
                                    }
                                    echo "</select>";

                                    ?>
               </b>/05/2023
               &nbsp;&nbsp;&nbsp;&nbsp;<b> Data Cadastro:</b>
               <?php
               echo date('Y-m-d');
               $cand_data_cadastro = date('Y-m-d');
               echo "<input type=hidden value=$cand_data_cadastro name=cand_data_cadastro>";
               ?>
               <p>
                  <input type="reset" value="Limpar" name="limpar"> |
                  <input type="submit" value="Gravar >>" name="grava_bd">
            </form>
</body>

</html>