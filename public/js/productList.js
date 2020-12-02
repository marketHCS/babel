const containerProducts = document.getElementById("products");
const URL = window.location.origin;
let products = [];

const getTemplate = (id, name, image, price) => {
  let urlProduct = `${URL}/product/${id}`;

  return `
  <div class="col-lg-4 col-sm-6">
    <div class="product-item">
      <div class="pi-pic">
        <div class="tag-sale">¡Nuevo!</div>
        <a href="${urlProduct}">
          <img src="${image}" alt="${name}" class="image-fit" />
        </a>
        <div class="pi-links">
          <a href="${urlProduct}" class="add-card"><i class="flaticon-bag"></i><span>Más detalles!</span></a>
        </div>
      </div>
      <div class="pi-text">
        <h6>$ <span class="underline green">${price}</span> </h6>
        <p>${name}</p>
      </div>
    </div>
  </div>
  `;
};

const setProducts = () => {
  products.map((product) => {
    containerProducts.innerHTML += getTemplate(
      product.id,
      product.nameProduct,
      product.image,
      product.precio_prod
    );
  });
};

fetch(`${URL}/api/v1/products`)
  .then((response) => {
    return response.text();
  })
  .then((response) => {
    products = JSON.parse(response);
    console.log(products);
    setProducts();
  });
