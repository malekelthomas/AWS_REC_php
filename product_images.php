<style>
    img{
        border: 3px solid;
    }
</style>

<?php session_start();?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){
       
         foreach($_SESSION["images"] as $categories){
             foreach($categories as $products){
                 echo "<img class='rounded-circle' src=$products>";
             }
         };
    }
?>

