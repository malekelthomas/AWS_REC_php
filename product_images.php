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
                    foreach($products as $details){
                        //details = [product-url,product-img]
                        $links = preg_split("/[,]/", $details);
                        echo "<img class='rounded-circle' value ='{$links[0]}' src={$links[1]}>";
                        //echo "$categories,{$links[0]}, {$links[1]}\n";?>
                        <input type="hidden" name="products[]" value='<?php echo "{$links[0]} {$links[1]}"?>'/><?php
                    }
                };
            }
            
        ?>
    </form>

    
    <button id='submitProducts' type='button' onclick="submitProducts();">Submit Products</button>
</div>



