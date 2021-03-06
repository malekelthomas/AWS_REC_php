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
          $sql = "SELECT * FROM cat LIMIT 0,8";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){?>
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
            <input type="hidden" value=<?php echo $row['properties_key']?> name="category"><p class="paragraph-ellipse-text"><?php echo $row['properties_key'];?></p>
          </div>
          <?php
            }
        }
        else {
          echo "No categories";
        }
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