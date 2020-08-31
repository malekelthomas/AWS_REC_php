<?php
    include 'connection.php';
    
    $buttonCount = $_POST["newNumCatButtons"];
    $sql = "SELECT * FROM cat LIMIT $buttonCount ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){?>
        <!-- <div class="buttons">
        <button class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" name ="categories" value="<?php echo $row['properties_key']; ?>"><?php echo $row['properties_key']; ?></button>
        </div> -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?php echo $row['properties_key']; ?>" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                  <?php echo $row['properties_key']; ?>
            </label>
        </div>
    <?php
    }

    } else {
        echo "Fuck off!";
    }
?>