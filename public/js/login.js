const buttonLogin = document.getElementById("submitFormLogin");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const URL = window.location.origin + "/api/v1/login";

const login = () => {
  const data = new FormData(document.getElementById("form"));

  console.log(data);

  fetch(URL, {
    method: "POST",
    body: data,
  })
    .then((response) => {
      if (response.status == 200) {
        return response.text();
      } else {
        console.log(response.text());
        buttonLogin.disabled = false;
        alert("Tu usuario o la contraseña no coínciden.");
        // break;
      }
    })
    .then((response) => {
      user = JSON.parse(response);
      if (typeof user.token != "undefined") {
        sessionStorage.setItem("token", user.token);
        sessionStorage.setItem("name", user.name);
        console.log(user);
        window.location = location.origin;
      }
    });
};

buttonLogin.addEventListener("click", () => {
  console.log("presionado");
  let password = passwordInput.value;
  let email = emailInput.value;
  console.log(password);
  console.log(email);

  buttonLogin.disabled = true;
  login();
});
