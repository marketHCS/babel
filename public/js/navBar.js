const container = document.getElementById("user-panel");
let token = sessionStorage.getItem("token");
let name = sessionStorage.getItem("name");
let template = "";
const URL2 = window.location.origin;

const logoutAction = () => {
  fetch(URL2 + "/api/v1/logout", {
    method: "POST",
    headers: {
      Authorization: `Bearer ${token}`,
    },
  }).then((response) => {
    if (response.status == 202) {
      console.log(response.text());
      sessionStorage.removeItem("token");
      window.location.reload();
    } else {
      console.log(response.text());
      // break;
    }
  });
};

if (sessionStorage.getItem("token") == null) {
  let cart = URL2 + "/cart";
  let login = URL2 + "/login";
  let register = URL2 + "/register";
  template = `
                <div class="up-item">
                <div class="row">
                  <i class="flaticon-profile"></i>
                  <a class="btn nav-item" href="${login}">Iniciar sesión</a>
                  <a class="btn nav-item" href="${register}">Registrarse</a>
                </div>
              </div>
              <div class="up-item">
                <div class="shopping-card">
                  <i class="flaticon-bag"></i>
                  <span>0</span>
                </div>
                <a href="${cart}">Carrito de compras</a>
              </div>
              👕
  `;
} else {
  let profile = URL2 + "/profile";
  let orders = URL2 + "/orders";
  let logout = URL2 + "/logout";
  let wishlist = URL2 + "/wishlist";
  let cart = URL2 + "/cart";

  template = `
  <div class="up-item">
    <div class="row">
      <i class="flaticon-profile"></i>
      <span class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          ${name} <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="${profile}">Mi perfil</a>
          <a class="dropdown-item" href="${orders}">Mis compras</a>
          <a class="dropdown-item" href="#" onclick="logoutAction();">Cerrar sesión</a>
        </div>
      </span>
    </div>
  </div>

  <div class="up-item mr-2">
    <div class="row">
      <a href="${wishlist}" class="mr-4">Lista de deseos</a>
    </div>
  </div>

  <div class="up-item">
    <div class="shopping-card">
      <i class="flaticon-bag"></i>
      <span>0</span>
    </div>
    <a href="${cart}">Carrito de compras</a>
  </div>
  `;
}

container.innerHTML = template;
