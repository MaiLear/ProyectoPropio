import { showProduct } from "../helperShop.js";

let templateCart = document.getElementById("template-cart").content;
let cardShoppingViewCart = document.getElementById("container-products-cart");

let storeCart = JSON.parse(localStorage.getItem("cart"));

// console.log(storeCart);

async function saveProductsSelected() {
    fetch("");
}

document.addEventListener("click", (e) => {
    if (e.target.matches("#quantity-increment__btn")) {
        let productId = e.target.closest(".template-cart__id").dataset.id;

        storeCart[productId].cantidad += 1;
        localStorage.setItem("cart", JSON.stringify(storeCart));
        showProduct(storeCart, templateCart, cardShoppingViewCart);
        console.log(storeCart);
    }
    if (e.target.matches("#quantity-decrement__btn")) {
        let productId = e.target.closest(".template-cart__id").dataset.id;

        storeCart[productId].cantidad -= 1;
        localStorage.setItem("cart", JSON.stringify(storeCart));
        showProduct(storeCart, templateCart, cardShoppingViewCart);
    }

    if (e.target.matches("#buy__btn")) {
        localStorage.clear();
    }
});

showProduct(storeCart, templateCart, cardShoppingViewCart);