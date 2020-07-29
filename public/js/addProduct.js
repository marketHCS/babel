/* eslint-disable no-restricted-syntax */
/* eslint-disable prefer-const */
/* eslint-disable no-undef */
/* eslint-disable consistent-return */
/* eslint-disable no-console */
/* eslint-disable no-var */
/* eslint-disable no-plusplus */
const products = document.getElementById("products");
const addProduct = document.getElementById("addProduct");
const providerSelect = document.getElementById("provider_id");
const submit = document.getElementById("submit");
var countInput = document.getElementById("count");
let providerSelected = 0;
let productsResponse = [];

providerSelect.addEventListener("change", () => {
  providerSelected = providerSelect.options.selectedIndex;
  // console.log(providerSelected);
  fetch(`http://127.0.0.1:8000/api/products/provider/${providerSelected}`)
    .then(response => {
      if (response.status >= 200 && response.status < 300) {
        return response.text();
      }
    })
    .then(response => {
      let responseJson = JSON.parse(response);
      productsResponse = responseJson;
      addProduct.classList.remove("hidden");
    });
});

let count = 1;
const addNewProduct = productsResponses => {
  if (count > 1) {
    let button = document.getElementById(`delete-${count - 1}`);
    button.classList.add("hidden");
  }

  let prepareStatement = `
  <div class="form-group border-bottom" id="product-${count}">
  <div class="form-row mt-2">
    <div class="col-1">
      <span id="id" class="form-control id-control disabled mx-auto">#${count}</span>
    </div>
    <div class="col-4 offset-1">
      <label for="productSelect-${count}">Producto: </label>
      <select name="productSelect-${count}" id="productSelect-${count}" class="form-control custom-select">
  `;

  for (let product of productsResponses) {
    prepareStatement += `
    <option value="${product.id}">${product.nameProduct}</option>
    `;
  }

  prepareStatement += `</select>
    </div>
    <div class="col-1 offset-1">
      <label for="quant-${count}">Cantidad</label>
      <input type="number" name="quant-${count}" id="quant-${count}" class="form-control">
    </div>
    <div class="col-1 offset-2">
      <button type="button" id="delete-${count}" class="btn btn-warning btn-delete"><i class="far fa-trash-alt"></i></button>
    </div>
  </div>
</div>`;

  products.innerHTML += prepareStatement;

  let productDeleteButton = document.getElementById(`delete-${count}`);
  let currentProduct = document.getElementById(`product-${count}`);
  productDeleteButton.addEventListener("click", () => {
    products.removeChild(currentProduct);
    count--;
    if (count === 1) {
      submit.classList.add("hiddenO");
    }
  });

  // console.log(countInput.value);
  countInput.value = count;
  // console.log(countInput.value);
  count++;

  if (count === 2) {
    submit.classList.remove("hiddenO");
  }
};

addProduct.addEventListener("click", () => {
  addNewProduct(productsResponse);
});
