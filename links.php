<?php
   $url_atual = $_SERVER['REQUEST_URI'];
   $links = "
   <font size=2><b>
   <center>
   ";
   
   if (strpos($url_atual, 'seleto.php') === false) {
      $links .= "[<a href=\"seleto.php?id=$_SESSION[id]\">PÁGINA PRINCIPAL</a>] | ";
   }

   if (strpos($url_atual, 'cadastro_candidato.php') === false) {
      $links .= "[<a href=\"cadastro_candidato.php?id=$_SESSION[id]\">FICHA DE INSCRIÇÃO</a>] | ";
   }
   
   if (strpos($url_atual, 'cartao_identificacao.php') === false) {
      $links .= "[<a href=\"cartao_identificacao.php?id=$_SESSION[id]\">CARTÕES DE IDENTIFICAÇÃO</a>] | ";
   }
   
   if (strpos($url_atual, 'candidatos_por_cargo.php') === false) {
      $links .= "[<a href=\"candidatos_por_cargo.php?id=$_SESSION[id]\">CANDIDATOS POR CARGO</a>] | ";
   }
   
   $links .= "[<a href=\"encerra_sessao.php\">ENCERRAR SESSÃO</a>]
   </center>
   ";

   echo $links;
?>
