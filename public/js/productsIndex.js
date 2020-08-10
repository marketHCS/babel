/* eslint-disable camelcase */
/* eslint-disable no-restricted-syntax */
/* eslint-disable prefer-const */
/* eslint-disable no-undef */
/* eslint-disable consistent-return */
/* eslint-disable eqeqeq */
const product_container = document.getElementById("products");
const serverURL = "https://www.babel.fashion/";
let productsResponse = [];

const getTemplate = (imageUrl, price, productName, id) => {
  return `<div class="col-lg-4 col-sm-6">
            <div class="product-item">
              <div class="pi-pic">
                <div class="tag-sale">ON SALE</div>
                <img src="${serverURL}storage/${imageUrl}" alt="${productName}" class="image-fit"/>
                <div class="pi-links">
                  <a href="${serverURL}cart/${id}" class="add-card"><i class="flaticon-bag"></i><span>Agregar al carrito</span></a>
                </div>
              </div>
              <div class="pi-text">
                <h6>$ ${price}</h6>
                <p>${productName}</p>
              </div>
            </div>
          </div>`;
};

fetch(`${serverURL}api/products/`)
  .then(response => {
    if (response.status >= 200 && response.status < 300) {
      return response.text();
    }
  })
  .then(response => {
    let responseJson = JSON.parse(response);
    productsResponse = responseJson;
    console.log(productsResponse);

    for (let product of productsResponse) {
      let imageURL = "";
      fetch(`${serverURL}api/images/first/${product.id}`)
        .then(responses => {
          if (responses.status >= 200 && responses.status < 300) {
            return responses.text();
          }
        })
        .then(responses => {
          let imageQuery = JSON.parse(responses);
          imageURL = imageQuery[0].url;
          product_container.innerHTML += getTemplate(
            imageURL,
            product.precio_prod,
            product.nameProduct,
            product.id
          );
        });
      // console.log(product);
    }
  });
