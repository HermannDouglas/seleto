<header>
   <center style="
    background-color: #A7A7A7;
   ">
         <h2>Seleto v3.0</h2>
         <h2>SISTEMA DE CONTROLE DE CONCURSO PÚBLICO</h2>     
         
         <?php
         if($_SERVER['REQUEST_URI'] != "/"){
               $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
               echo "<h3>" . $url . "</h3>";
            }
         ?>

   </center>
</header>