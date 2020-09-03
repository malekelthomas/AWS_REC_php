<?php
  include 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="test.js"></script>
    <!-- <script> 
      $(document).ready(function () {
        var checkboxes = $("input[type=checkbox]");
        var z="";
        console.dir(checkboxes);
        checkboxes.change(function(){
          if (this.checked){
            if (z.includes(this.value) == false){
              z+=this.value+"<br>";
              $("#btnData").html(z);
              console.log(z);
            }
          }
          if (this.checked == false){
            if (z.includes(this.value)){
              z= z.replace(this.value+"<br>", "");
              $("#btnData").html(z);
              console.log(z);
              }
            }
          })
        })
    </script> -->
    <script>
          
          $(document).ready(function(){
            
            var numCatButtons = 5;
            $("#btn").on('click',function(){
              var btnClickValues = JSON.parse(localStorage.getItem('btnClickValues')) || {};
              var $checkboxes = $("#myForm :checkbox");
              console.log($checkboxes)
              numCatButtons+=3;
              $checkboxes.each(function(){
              btnClickValues[this.id] = this.checked;
              console.log(this)
            });
            localStorage.setItem("btnClickValues", JSON.stringify(btnClickValues));
            $.each(btnClickValues, function(key, value) {
            console.log("Key:",key,"Value:", value)
            $("#" + key).prop('checked', value);
          });  
            $("#categories").load("load_categories.php", {
                newNumCatButtons: numCatButtons
              })
            })
          })
    </script>
     
  </head>
  <body>

  <title>Test</title> 
    <h1>Categories</h1>
    <div id = categories>
      <form id = "myForm">
        <?php
          $sql = "SELECT * FROM cat LIMIT 5";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){?>
              <!-- <div class="buttons">
                <button class ="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off"  name ="categories" value="<?php echo $row['properties_key']; ?>"><?php echo $row['properties_key']; ?></button>
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
        <input type="hidden" id ="yerr" name="yerr" value="">
      </form>
    </div>

    <button id = "btn">See More</button>
    <button id="submitBtn">Submit</button>
    
    <p id="btnData">
      Data
    </p>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>