<?php
    include 'connection.php';
    
    $buttonCount = $_POST["newNumCatButtons"];
    $sql = "SELECT * FROM cat LIMIT $buttonCount ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){?>
        <div class="buttons">
        <button name ="categories" value="<?php echo $row['properties_key']; ?>"><?php echo $row['properties_key']; ?></button>
        </div>
    <?php
    }

    } else {
        echo "Fuck off!";
    }
?>