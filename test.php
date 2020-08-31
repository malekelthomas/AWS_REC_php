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
    <script>
      $(document).ready(function() {
        var numCatButtons = 5;
        $("#btn").click(function(){
          numCatButtons+=3;
          $("#categories").load("load_categories.php", {
            newNumCatButtons: numCatButtons
          });
        })
      })
      
      $(document).ready(function () {
        $("div.buttons > button").click(function(){
          let z = "";
          $("[name='categories']").each(function(){
            z+=$(this).attr('value') + "<br>";
          })
          console.log("Z:",z)
          $("#btnData").html(z)
        })
      })
    </script>
  </head>
  <body>

  <title>Test</title> 
    <h1>Categories</h1>
    <div id = categories>
      <form id = "myForm" action = "connection.php" method="get">
        <?php
          $sql = "SELECT * FROM cat LIMIT 5";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){?>
              <div class="buttons">
                <button class"="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off"  name" ="categories" value="<?php echo $row['properties_key']; ?>"><?php echo $row['properties_key']; ?></button>
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