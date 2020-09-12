<style>
    img{
        border: 3px solid black;
    }
</style>

<?php session_start();?>

<div id="product-images">
    <form id="products-images-form" method="POST" action="selected_products.php">
        <?php

            if($_SERVER["REQUEST_METHOD"] == "GET"){
                foreach($_SESSION["images"] as $categories => $products){
                    foreach($products as $images){
                        echo "<img class='rounded-circle' value ='$categories' src=$images>";?>
                        <input type="hidden" name ="products[]" value ='<?php echo "$images";?>'/><?php
                    }
                };
            }
            
        ?>
    </form>

    
    <button id='submitProducts' type='button' onclick="submitProducts();">Submit Products</button>
</div>



