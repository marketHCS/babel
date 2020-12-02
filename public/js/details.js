const URL = window.location.origin;
const TOKEN = sessionStorage.getItem("token");

const addWishlist = (id) => {
  if (token != null) {
    fetch(`${URL}/api/v1/wishlist/add/${id}`, {
      method: "GET",
      headers: {
        Authorization: `Bearer ${TOKEN}`,
      },
    })
      .then((response) => {
        return response.text();
      })
      .then((response) => {
        console.log(response);
      });
  } else {
    window.location = URL + "/login";
  }
};
