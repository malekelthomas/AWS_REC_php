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

function submitCategories(e){
  e.preventDefault();
  var formattedCategories;
  $.ajax({
    url: 'get_products.php',
    type: 'POST',
    data: $('#categories-selected-form').serialize(),
    success: async function(data){
      var categoriesArr = data.split("<br>");
      console.log(categoriesArr);
      var breaks = /(\r\n|\n|\r)/gm;
      var formattedCategories = categoriesArr.flatMap(function(str){
        var newStr = str.replace(breaks, "");
        return newStr.length == 0 ? [] : newStr; //return empty if empty or string
      });
      console.log(formattedCategories)
      var products = {};

      for(var i = 0; i < formattedCategories.length; i++){
        products[`${formattedCategories[i]}`] = await fetchProducts(formattedCategories[i]);
      }
      console.log(products);
      $.ajax({
        type:"POST",
        url: "products.php",
        data: products,
        success: function(data){
          alert("Products posted")
        }
      });
    },
    error:function(data){
      console.log("error")
      console.log(data)
    }
  })
  }

$(document).ready(function (){
  var checkboxes = $("#categories");
  var checkboxValues = JSON.parse(localStorage.getItem('checkboxValues')) || {};
  var seeMore = $("#btn");
  var append_start = 0;
  var numCats = 5;
  var tableBody = $("#selected-cats tbody");
  var seeProducts = $("#getProducts");
  $.each(checkboxValues, function(key, val){
    $("#"+key).prop("checked", val);
    if(val){
      $("#selected-cats > tbody:last-child").append(`<tr id = ${key}><td><input type="hidden" name="categories[]" value='${key}'/>${key}</td></tr>`);
    }
  });

  function updateStorage(){
    $("input[type=checkbox]").each(function(){
      checkboxValues[this.id] = this.checked;
    })
    localStorage.setItem("checkboxValues", JSON.stringify(checkboxValues))
  }

  checkboxes.on("change", "input[type=checkbox]", function(){ 
    if (this.checked){
        var search = tableBody.find(`#${this.value}`);
        if (search.length == 0){ //length is number of matched elements
          $("#selected-cats > tbody:last-child").append(`<tr id = ${this.value}><td><input type="hidden" name="categories[]"/>${this.value}</td></tr>`);
        }
      }
    if (this.checked == false){
        tableBody.find(`#${this.value}`).remove();
      }
      updateStorage();
  })

  seeMore.on("click", function(){
    append_start = numCats;
    numCats+=3;
    $("#categories").load("load_categories.php", {
      append: append_start,
      newNumCats: numCats
    })
    updateStorage();
  })

  seeProducts.on("click", function (){
    $("#products").load("products.php");
  })
  

  
  
  
})



  


