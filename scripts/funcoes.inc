<?php
$host = "localhost";
$user = "root";
$pass = "root";
$bd = "seleto";

function verificaSessao() {
   session_start();
   if (!isset($_SESSION["id"])){
      header("location: index.php");
   }
}

      function imprimeData() {
         $dia_mes = date('j');
         $mes = date('m');
         $ano = date('Y');

         if ($mes === "01") {
            $mes = "Janeiro";
         } elseif ($mes === "02") {
            $mes = "Fevereiro";
         } elseif ($mes === "03") {
            $mes = "Março";
         } elseif ($mes === "04") {
            $mes = "Abril";
         } elseif ($mes === "05") {
            $mes = "Maio";
         } elseif ($mes === "06") {
            $mes = "Junho";
         } elseif ($mes === "07") {
            $mes = "Julho";
         } elseif ($mes === "08") {
            $mes = "Agosto";
         } elseif ($mes === "09") {
            $mes = "Setembro";
         } elseif ($mes === "10") {
            $mes = "Outubro";
         } elseif ($mes === "11") {
            $mes = "Novembro";
         } elseif ($mes === "12") {
            $mes = "Dezembro";
         }

         $data_oficial = "Rio Branco/AC, " . $dia_mes . " de " . $mes . " de " . $ano . ".";
         echo $data_oficial;
      }


      function getClientIp() {
         $ipaddress = "";
         if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
         else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
         else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
         else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
         else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
         else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
         else
            $ipaddress = 'UNKNOWN';
         return $ipaddress;
      };
