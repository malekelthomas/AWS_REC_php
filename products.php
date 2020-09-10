

<?php
    session_start();
    $post_data = $_POST;
    //echo var_dump($_POST);
    $data = json_encode($post_data);
    $data = json_decode($data, true);
    $img_arr = array();
    $i = 0;
    foreach($data as $key => $val){
        foreach($val as $descriptions => $descriptor){
            if (is_array($descriptor)){
                foreach($descriptor as $details){
                    foreach($details as $product_picture){
                        if(strpos($product_picture, ".jpg") !== false){
                            if (is_array($product_picture) == false){
                                //echo "$key,$stuff\n";
                                if ($img_arr["$key"] == null){
                                    $img_arr["$key"] = array();
                                    }
                                $img_arr["$key"][$i] = $product_picture;
                                $i++;
                            }
                        }
                    }
                }
            }
        }
    }
    $_SESSION["images"] = $img_arr;
?>


