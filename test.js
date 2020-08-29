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


