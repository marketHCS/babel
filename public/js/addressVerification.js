/* eslint-disable-next-line no-undef */
/* eslint-disable eqeqeq */
/* eslint-disable guard-for-in */
/* eslint-disable prefer-const */
/* eslint-disable no-restricted-syntax */
/* eslint-disable consistent-return */
/* eslint-disable no-plusplus */
/* eslint-disable no-undef */
/* eslint-disable no-console */
/* eslint-disable no-alert */
const buttonVerification = document.getElementById("buttonVerification");
const estate = document.getElementById("estate");
const colony = document.getElementById("suburb");
const city = document.getElementById("city");
const cp = document.getElementById("cp");
const street = document.getElementById("street");
const nInterior = document.getElementById("interiorNumberAddress");
const nExterior = document.getElementById("exteriorNumberAddress");

const selectStatements = arrayWResponse => {
  estate.innerHTML = "";
  colony.innerHTML = "";
  city.innerHTML = "";
  let lastStringEstate = "";
  let lastStringColony = "";
  let lastStringCity = "";

  for (let element of arrayWResponse) {
    if (element.response.estado != lastStringEstate) {
      estate.innerHTML += ` <option value="${element.response.estado}">${element.response.estado}</option> `;
      lastStringEstate = element.response.estado;
    }

    if (element.response.asentamiento != lastStringColony) {
      colony.innerHTML += ` <option value="${element.response.asentamiento}">${element.response.asentamiento}</option> `;
      lastStringColony = element.response.asentamiento;
    }

    if (element.response.municipio != lastStringCity) {
      city.innerHTML += ` <option value="${element.response.municipio}">${element.response.municipio}</option> `;
      lastStringCity = element.response.municipio;
    }
  }
  console.log(arrayWResponse);
};
const getAddress = cpValue => {
  console.log(cp.value);
  fetch(`https://api-sepomex.hckdrk.mx/query/info_cp/${cpValue}`)
    .then(response => {
      if (response.status >= 200 && response.status < 300) {
        return response.text();
      }
    })
    .then(response => {
      responseJson = JSON.parse(response);

      estate.removeAttribute("disabled");
      city.removeAttribute("disabled");
      colony.removeAttribute("disabled");
      street.removeAttribute("disabled");
      nExterior.removeAttribute("disabled");
      nInterior.removeAttribute("disabled");
      selectStatements(responseJson);
    })
    .catch(error => {
      alert(`Error, el codigo ingresado es equivoco.\nError code: ${error}`);
    });
};

buttonVerification.addEventListener("click", () => getAddress(cp.value));
