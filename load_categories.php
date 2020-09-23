
<?php
    include 'connection.php';
    
    $catCount = $_POST["newNumCats"];
    $start = $_POST["append"];
    $sql = "SELECT * FROM cat LIMIT $start,$catCount ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){?>
        <?php $id =0;
        if ($row['id'] <= 8){
             $id=$row['id'];
        }
        else if($row['id']%8==0){
            $id=8;
        }
        else{
            $id = $row['id']%8;
        }
        ?>
        <div style="vertical-align:middle" id="ellipse<?php echo $id?>" class="ellipse">
          <p class="ellipse<?php echo $id?>-text"><?php echo $row['properties_key'];?></p>
        </div>
        <?php
        }
    } 
    else {
        echo "No categories";
    }
?>