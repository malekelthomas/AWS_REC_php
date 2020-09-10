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
  </head>
  <style>
      a {
        text-decoration: none;
        display: inline-block;
        padding: 8px 16px;
      }

      a:hover {
        background-color: #ddd;
        color: black;
      }

      .previous {
        background-color: #f1f1f1;
        color: black;
      }

      .next {
        background-color: #4CAF50;
        color: white;
      }

      .round {
        border-radius: 50%;
      }
  </style>
  <body>
    <div id ="checkbox-table">
    <title>Test</title> 
      <h1>Categories</h1>
      <div class = "categories" id = "categories">
          <?php
            $sql = "SELECT * FROM cat LIMIT 0,5";
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
      </div>
      <div id = addCategories>
      </div>
      <button id = "btn">See More</button>
      
      <div id=categoryTable>
        <form id = "categories-selected-form" action="get_products.php" method="POST">
          <div class = "selected">
                <table class = "table" id = "selected-cats">
                  <thead>
                    <tr>
                      <th>Selected Categories</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
          </div>
        </form>
        <button id="submitBtn" type ="button" onclick="submitCategories(event);">Submit</button>
        <button id ="getProducts" type ="button">See Products</button>
      </div>
    </div>
    <p id = products>

    </p>
    <div id="back-to-selection">
      <a id ="back-button" class="previous round">&#8249;</a> 
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>