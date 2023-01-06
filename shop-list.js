let shopListContainer = document.getElementById("shop-list-container");

if (shopListContainer) {
  jQuery(document).ready(function() {
    let shopsRequest = new XMLHttpRequest(); // WP API json request

    shopsRequest.open('GET', 'http://localhost/101/wp-json/wp/v2/tiendas/'); // aqui la URL, puede ser de cualquier servidor
    
    shopsRequest.onload = function () {
      if (shopsRequest.status >= 200 && shopsRequest.status < 400) {
        let dataShops = JSON.parse(shopsRequest.responseText);
        createHTML(dataShops);
        
      } else {
        console.log("Hay un error de conexión.");
      }
    };

    shopsRequest.send(); // manda para el html
  });
}

function createHTML(shopsListData) { // genera el html
  let htmlContent = '';
  
  for (i = 0; i < shopsListData.length; i++) { // loop
      htmlContent += "<div class='shop-list'>";// open div info
      htmlContent += "<h4>" + shopsListData[i].title.rendered + "</h4>";
      htmlContent += shopsListData[i].content.rendered;
      //htmlContent += shopsListData[i].featured_image_src;
      htmlContent += '<a class="btn-shops" href="' + shopsListData[i].link + '">ver tienda</a>';
      htmlContent += "</div>";// close div info

  }
  shopListContainer.innerHTML = htmlContent;
}