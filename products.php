<?php
    $post_data = $_POST;
    foreach($post_data as $key => $val){
        foreach($val as $products){
            echo "$key, $products";
        }
    }

?>