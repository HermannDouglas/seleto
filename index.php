<?php
include "scripts/configura.php"
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Seleto - Autenticação</title>
</head>

<body>
   <table align="center" border="0" width="90%" cellspacing="1">
      <tr>
         <td align="center">
            <b>
               <font face="Verdana" size="3">Sistema de Autenticação</font>
            </b>
            <form method="post" action="autenticacao.php">
               <b>
                  <font face="Verdana" size="2">Login:</font>
               </b>
               &nbsp; <input type="text" name="usuario" size="16" maxlength="10">
         </td>
      </tr>
      <tr>
         <td align="center">
            <b>
               <font face="Verdana" size="2">Senha:</font>
            </b>
            <input type="password" name="codigo" size="16" maxlength="10">
         </td>
      </tr>
      <tr>
         <td align="center" valign="top">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Acessar >>>" name="acessar">
         </td>
      </tr>
      </form>
   </table>
</body>

</html>