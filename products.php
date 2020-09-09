<?php
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
                    foreach($details as $stuff){
                        if(strpos($stuff, ".jpg") !== false){
                            //echo "<img src=$stuff>";
                            $img_arr[$i] = $stuff;
                            $i++;
                        }
                    }
                }
            }
        }
    }
    echo var_dump($img_arr);
?>

<script>



</script>