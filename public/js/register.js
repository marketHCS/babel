console.log("Register site");

const button = document.getElementById("button");
const URL = window.location.origin + "/api/v1/register";

const register = () => {
  const data = new FormData(document.getElementById("form"));

  console.log(data);

  fetch(URL, {
    method: "POST",
    body: data,
  }).then((response) => {
    console.log(response.text());
    if (response.status == 201) {
      window.location = window.location.origin + "/login";
    } else {
      alert("algo salió mal.");
      buttonLogin.disabled = false;
    }
  });
};

button.addEventListener("click", () => {
  console.log("presionado");

  button.disabled = true;

  if (
    document.getElementById("password").value !=
    document.getElementById("password-confirm").value
  ) {
    alert("Las contraseñas deben de coincidir.");
  } else {
    register();
  }
});
