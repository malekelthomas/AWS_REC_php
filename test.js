async function fetchProducts(keyword){
        var keyword = keyword
        var encoded_keyword = encodeURI(keyword)
        let response =  await fetch("https://amazon-product-reviews-keywords.p.rapidapi.com/product/search?category=aps&country=US&keyword="+encoded_keyword, 
        {
          "method": "GET",
          "headers": {
            "x-rapidapi-host": "amazon-product-reviews-keywords.p.rapidapi.com",
            "x-rapidapi-key": "b40cb29b58mshef93c5cf5e102a1p1a7b7fjsn090a508800d0"
          }
        })
        let data = await response.json();
        //console.log(data);
        return data;
        }

function fetchCategories(){
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
    console.log(settings);
    $.ajax(settings).done(function (response) {
        console.log(response);
    });
}


$(document).ready(function (){
  var checkboxes = $("#categories");
  var checkboxValues = JSON.parse(localStorage.getItem('checkboxValues')) || {};
  var categories_checked="";
  var seeMore = $("#btn");
  var numCatButtons = 5;
  console.log(localStorage)
  $.each(checkboxValues, function(key, val){
    $("#"+key).prop("checked", val);
    if(val){
      categories_checked+=key+"<br>";
    }
  });
  function updateStorage(){
    $("input[type=checkbox]").each(function(){
      checkboxValues[this.id] = this.checked;
    })
    localStorage.setItem("checkboxValues", JSON.stringify(checkboxValues))
    console.log(localStorage)
  }
  checkboxes.on("change", "input[type=checkbox]", function(){
    console.log("change")
    if (this.checked){
      if (categories_checked.includes(this.value) == false){
        categories_checked+=this.value+"<br>";
        $("#btnData").html(categories_checked);
        console.log(categories_checked, "checked");
      }
    }
    if (this.checked == false){
      if (categories_checked.includes(this.value)){
        categories_checked= categories_checked.replace(this.value+"<br>", "");
        $("#btnData").html(categories_checked);
        console.log(categories_checked,"unchecked");
        }
      }
      updateStorage();
  })

  seeMore.on("click", function(){
    numCatButtons+=3;
    $("#categories").load("load_categories.php", {
      newNumCatButtons: numCatButtons
    })
    updateStorage();
  })
  
  
  
})



  


