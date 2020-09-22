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
        
        <?php
        $sql = "SELECT * FROM cat LIMIT 0,8";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){?>
        <?php $id = ($row['id'] <= 8) ? $row['id']:'';?>
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
        <div class="next-button"></div>
        <hr class="next-line1">
        <hr class="next-line2">
    </div>
    <div class="get-started"></div>
      <span class="choose-cats">Choose Categories</span>
    </div>
    <div class="next-button-page">
      <button class="next-button-button">NEXT</button>
    </div>

</body>

</html>