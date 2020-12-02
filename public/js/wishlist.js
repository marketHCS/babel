const URL = window.location.origin;
const TOKEN = sessionStorage.getItem("token");
const containerWishlist = document.getElementById("container-wishlist");

let wishlist = [];

const setWishlist = () => {
  if (wishlist.length == 0) {
    containerWishlist.innerHTML = `
      <tr>
        <td class="product-col">
          <h3>No tienes productos en tu wishlist ):</h3>
        </td>
      </tr>
    `;
  } else {
    wishlist.map((item) => {
      containerWishlist.innerHTML += getTemplateWishList(
        wishlist.indexOf(item),
        item.wishList_id,
        item.nameProduct,
        item.image,
        item.description_prod
      );
    });
  }
};

const getTemplateWishList = (index, id, name, image, description) => {
  let urlProduct = `${URL}/product/${id}`;

  return `
    <tr>
      <td class="product-col">
        <img src="${image}" alt="${name}" />
        <div class="pc-title">
          <a href="${urlProduct}">
            <h4>${name} | Tee-shirt</h4>
          </a>
        </div>
      </td>
      <td class="size-col text-center">
        <h4 class="text-center pr-0 mr-2">${description}</h4>
      </td>
      <td>
        <button type="button" class="btn btn-danger ml-4" onclick="deleteWishlist(${id}, ${index})">
          <i class="far fa-trash-alt"></i>
        </button>
      </td>
    </tr>
  `;
};

const deleteWishlist = (id) => {
  fetch(`${URL}/api/v1/wishlist/destroy/${id}`, {
    method: "GET",
    headers: {
      Authorization: `Bearer ${TOKEN}`,
    },
  })
    .then((response) => {
      return response.text();
    })
    .then((response) => {
      console.log(JSON.parse(response));
      getWishlist();
    });
};

const getWishlist = () => {
  fetch(`${URL}/api/v1/wishlist`, {
    method: "GET",
    headers: {
      Authorization: `Bearer ${TOKEN}`,
    },
  })
    .then((response) => {
      return response.text();
    })
    .then((response) => {
      wishlist = JSON.parse(response);
      console.log(wishlist);
      containerWishlist.innerHTML = "";
      setWishlist();
    });
};

getWishlist();
