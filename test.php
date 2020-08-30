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
      $(document).ready(function(){
        $('#btn').click(function(){
          var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://amazon-product-reviews-keywords.p.rapidapi.com/categories?country=US",
            "method": "GET",
            "headers": {
                "x-rapidapi-host": "amazon-product-reviews-keywords.p.rapidapi.com",
                "x-rapidapi-key": "b40cb29b58mshef93c5cf5e102a1p1a7b7fjsn090a508800d0"
            }
          }
          $.ajax(settings).done(function (response) {
            $("#yerr").val(JSON.stringify(response));
            $("#myForm").submit();
            });
          });
        });

        
    </script>
  </head>
  <body>

  <title>Test</title> 
    <h1>Categories</h1>
    <div id = categories>
      <form id = "myForm" action = "test2.php" method="post">
        <input type="hidden" id ="yerr" name="yerr" value="">
      </form>
    </div>

    <button id = "btn">Get Categories Hopefully ;(</button>

    <?php
      if (isset($_POST)){
        echo $_POST["data"];
      }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>