<?php
    $post_data = $_POST;
    //echo var_dump($_POST);
    $data = json_encode($post_data);
    $data = json_decode($data, true);
    foreach($data as $key => $val){
        foreach($val as $descriptions => $descriptor){
            if (is_array($descriptor)){
                foreach($descriptor as $details){
                    foreach($details as $stuff){
                        if(strpos($stuff, ".jpg") !== false){
                            echo "<img src=$stuff>";
                        }
                    }
                }
            }
        }
    }

?>