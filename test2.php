<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <style>
      img, video{
        width: 50%;
        height: auto;
      }
    </style>
  </head>
  <body>
  <script>
      $(document).ready(function(){
        $.ajax({
          url:"https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,username&access_token=IGQVJVR3VYQmV6czNkRHRDWnU0SHdqNXRVYl9rR3NnUnI2RUtJa3loVTVsWmlpb1VqSDFJYVZAGLTVEUlZASaDA5X3ROb0JFNlEtTkRfYWZAyNHNBQkVZAY25ZAQ3BobTVFMl9uczdVdzJR",
          type: "GET",
          success: function(data){
            var img_arr = [];
            for(i in data["data"]){
              console.log(data["data"][i]["media_url"])
              if (data["data"][i]["media_type"] == "CAROUSEL_ALBUM"){
                var media_id = data["data"][i]["id"]
                $.ajax({
                  url:`https://graph.instagram.com/${media_id}/children?access_token=IGQVJVR3VYQmV6czNkRHRDWnU0SHdqNXRVYl9rR3NnUnI2RUtJa3loVTVsWmlpb1VqSDFJYVZAGLTVEUlZASaDA5X3ROb0JFNlEtTkRfYWZAyNHNBQkVZAY25ZAQ3BobTVFMl9uczdVdzJR`,
                  type: "GET",
                  success: function(data){
                    var length = data["data"].length;
                    console.log("Carousel album",data)
                    for(i of data["data"]){
                      console.log(i)
                      img_arr.push(length)
                      $.ajax({
                        url:`https://graph.instagram.com/${i["id"]}?fields=id,media_type,media_url,username&access_token=IGQVJVR3VYQmV6czNkRHRDWnU0SHdqNXRVYl9rR3NnUnI2RUtJa3loVTVsWmlpb1VqSDFJYVZAGLTVEUlZASaDA5X3ROb0JFNlEtTkRfYWZAyNHNBQkVZAY25ZAQ3BobTVFMl9uczdVdzJR`,
                        type: "GET",
                        success:function(data){
                          console.log("Carousel image",data)
                          img_arr.push(data["media_url"])
                          console.log(img_arr)
                        }
                    })
                   }
                  }
                })
              }
              if((data["data"][i]["media_url"].includes("scontent"))){
                $("#content").append(`<img src='${data["data"][i]["media_url"]}'><br>`)
              }
              else{
                $("#content").append(`<video width='480' height='480' controls><source src='${data["data"][i]["media_url"]}'></video><br>`)
              }
            }
          }
        })
      })
    </script>
    <title> Test 2 </title>
    <p id="content">

    </p>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="la.jpg" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="chicago.jpg" alt="Chicago">
    </div>

    <div class="item">
      <img src="ny.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>