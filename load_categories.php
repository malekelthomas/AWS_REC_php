
<?php
    include 'connection.php';
    
    $catCount = $_POST["newNumCats"];
    $start = $_POST["append"];
    $sql = "SELECT * FROM cat LIMIT $start,$catCount ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){?>
        <!-- <div class="buttons">
        <button class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" name ="categories" value="<?php echo $row['properties_key']; ?>"><?php echo $row['properties_key']; ?></button>
        </div> -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?php echo $row['properties_key']; ?>" id="<?php echo $row['properties_key']; ?>">
            <label class="form-check-label" for="defaultCheck1">
                  <?php echo $row['properties_key']; ?>
            </label>
        </div>
    <?php
    }

    } else {
        echo "No categories";
    }
?>