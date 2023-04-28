<?php 
   $mysqli = new mysqli("localhost","root","","rent_clothes");

   if($mysqli==false){
    die("ERROR: could not connect". $mysqli->connect_error); 
   }

?>