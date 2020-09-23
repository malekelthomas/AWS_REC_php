<?php
  include 'connection.php';
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/main.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  <script src="test.js"></script>
  <script>
    $(function () {
      $("#includedContent").load("groupgifter-base.html");
    });
  </script>
</head>
<?php session_start();?>
<body>
    <div class="container">
        <div class="logo">
            <p>groupgifter</p>
        </div>
        <div class="navigation">
            <img src="images/menu-24px.svg" alt="Menu" class="menu-img">
        </div>
        <div class="prev-button"></div>
        <hr class="prev-line1">
        <hr class="prev-line2">
        <!-- Circles start left, counter-clockwise-->
        <div id="category-ellipses">
        <?php
        foreach($_SESSION["images"] as $categories => $products){
                    foreach($products as $details){
                        //details = [product-url,product-img]
                        $links = preg_split("/[,]/", $details);
                        echo "<img class='rounded-circle' value ='{$links[0]}' src={$links[1]}>";
                        //echo "$categories,{$links[0]}, {$links[1]}\n";?>
                        <input type="hidden" name="products[]" value='<?php echo "{$links[0]} {$links[1]}"?>'/><?php
                    }
                };
            
        ?>
        </div>
        <div id="seeMore" class="next-button"></div>
        <hr class="next-line1">
        <hr class="next-line2">
    </div>
    <div class="get-started"></div>
      <span class="choose-cats">Choose Categories</span>
    </div>
    <div class="next-button-page">
      <button class="next-button-button" onclick=submitCategories(event);>NEXT</button>
    </div>

</body>

</html>