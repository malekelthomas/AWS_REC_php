<style>
    img{
        border: 3px solid;
    }
</style>

<?php session_start();?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){
         foreach($_SESSION["images"] as $categories => $products){
             foreach($products as $images){
                 echo "<img class='rounded-circle $categories' src=$images>";
             }
         };
    }
?>

