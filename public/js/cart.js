/* eslint-disable no-plusplus */
/* eslint-disable prefer-const */
/* eslint-disable no-param-reassign */
/* eslint-disable no-restricted-syntax */
/* eslint-disable no-console */
const prices = document.getElementsByClassName("price");
const quants = document.getElementsByClassName("quants");
const subtotals = document.getElementsByClassName("subtotal");
const total = document.getElementById("totalSpan");
console.log(prices);
console.log(quants);
console.log(subtotals);
console.log(total);

const setSubTotal = (price, quant, subtotal) => {
  // console.log(parseFloat(price.innerText));
  // console.log(parseFloat(quant.value));
  let priceValue = parseFloat(price.innerText);
  let quantValue = parseFloat(quant.innerText);
  let subtotalValue = priceValue * quantValue;
  subtotal.innerText = subtotalValue;
};

const setTotal = () => {
  let bigtotal = 0;
  for (let subtotal of subtotals) {
    bigtotal += parseFloat(subtotal.innerText);
  }
  total.innerText = bigtotal;
};

for (let i = 0; i < quants.length; i++) {
  setSubTotal(prices[i], quants[i], subtotals[i]);

  quants[i].addEventListener("change", () => {
    setSubTotal(prices[i], quants[i], subtotals[i]);
    setTotal();
  });
}

setTotal();
