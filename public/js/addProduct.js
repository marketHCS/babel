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
  if (count === 6) {
    return;
  }

  let prepareStatement = `
  <div class="form-group border-bottom" id="product-${count}">
  <div class="form-row mt-2">
    <div class="col-1">
      <span id="id" class="form-control id-control disabled mx-auto">#${count}</span>
    </div>
    <div class="col-3 offset-1">
      <label for="productSelect-${count}">Producto: </label>
      <select name="productSelect${count}" id="productSelect-${count}" class="form-control custom-select">
  `;

  for (let product of productsResponses) {
    prepareStatement += `
    <option value="${product.id}">${product.nameProduct}</option>
    `;
  }

  prepareStatement += `</select>
    </div>
    <div class="col-1 mx-4 offset-4">
      <button type="button" id="delete-${count}" class="btn btn-warning btn-delete"><i class="far fa-trash-alt"></i></button>
    </div>
  </div>
  <div class="row">
  <div class="row cien">
  <div class="col-4"><h5>Querétaro</h5></div>
  <div class="col-4"><h5>Ciudad de México</h5></div>
  <div class="col-4"><h5>Guadalajara</h5></div>
  </div>
    <div class="row">
      <div class="col-1">
        <label for="eq_s${count}">Small</label>
        <input type="number" name="eq_s${count}" id="quant-${count}" class="form-control id-controloC" min="0" pattern="^[0-9]+">
      </div>
      <div class="col-1">
        <label for="eq_m${count}">Medium</label>
        <input type="number" name="eq_m${count}" id="quant-${count}" class="form-control id-controloC" min="0" pattern="^[0-9]+">
      </div>
      <div class="col-1">
        <label for="eq_g${count}">Large</label>
        <input type="number" name="eq_g${count}" id="quant-${count}" class="form-control id-controloC" min="0" pattern="^[0-9]+">
      </div>


      <div class="col-1 offset-1">
        <label for="ec_s${count}">Small</label>
        <input type="number" name="ec_s${count}" id="quant-${count}" class="form-control id-controloC" min="0" pattern="^[0-9]+">
      </div>
      <div class="col-1">
        <label for="ec_m${count}">Medium</label>
        <input type="number" name="ec_m${count}" id="quant-${count}" class="form-control id-controloC" min="0" pattern="^[0-9]+">
      </div>
      <div class="col-1">
        <label for="ec_g${count}">Large</label>
        <input type="number" name="ec_g${count}" id="quant-${count}" class="form-control id-controloC" min="0" pattern="^[0-9]+">
      </div>


      <div class="col-1 offset-1">
        <label for="eg_s${count}">Small</label>
        <input type="number" name="eg_s${count}" id="quant-${count}" class="form-control id-controloC" min="0" pattern="^[0-9]+">
      </div>
      <div class="col-1">
        <label for="eg_m${count}">Medium</label>
        <input type="number" name="eg_m${count}" id="quant-${count}" class="form-control id-controloC" min="0" pattern="^[0-9]+">
      </div>
      <div class="col-1">
        <label for="eg_g${count}">Large</label>
        <input type="number" name="eg_g${count}" id="quant-${count}" class="form-control id-controloC" min="0" pattern="^[0-9]+">
      </div>
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
