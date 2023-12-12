import { uploadProductsCard, showProduct } from "../helperShop.js";

//Containers
let containershopProducts = document.querySelector(".conteiner-shop-products");
let containerNewProducts = document.querySelector(
    ".conteiner-shop-newproducts"
);

let cardShoppingCart = document.getElementById("card-shopping-cart");

//Templates
let templateContainerCards = document.getElementById(
    "template-conteiner-shop-products"
).content;

let templateCart = document.getElementById("template-cart").content;

//Data
let products = JSON.parse(
    document
        .querySelector(".conteiner-shop-products")
        .getAttribute("data-products")
);

let newProducts = JSON.parse(
    document.querySelector(".conteiner-shop-products").getAttribute("data-news")
);

//Array cart
let cart = [];

document.addEventListener("click", function (e) {
    if (
        e.target.classList.contains("conteiner-shop-products-cards-icon__img")
    ) {
        setSelectedProduct(e.target.closest(".conteiner-shop-products-cards"));
        document.getElementById("shoppingcartnotification").textContent =
            cart.filter(Boolean).length;
    }

    if (
        e.target.classList.contains("main-menu-list__icon") ||
        e.target.matches("#btn-card__close")
    ) {
        document.getElementById("shoppingcartcard").classList.toggle("d-none");
    }

    if (e.target.matches("#go-carrito__btn")) {
        if (cart.length > 0) {
            localStorage.setItem("cart", JSON.stringify(cart));
        }
    }
});

if (templateContainerCards && containershopProducts && products) {
    uploadProductsCard(products, containershopProducts, templateContainerCards);
}

if (newProducts && containerNewProducts && templateContainerCards) {
    uploadProductsCard(
        newProducts,
        containerNewProducts,
        templateContainerCards
    );
}

// showProduct(templateCart,cardShoppingCart)

function setSelectedProduct($data) {
    const product = {
        id: $data.dataset.id,
        img: $data
            .querySelector(".conteiner-shop-products-cards-icon__img")
            .getAttribute("src"),
        name: $data.querySelector(".conteiner-shop-products-cards__data")
            .textContent,
        brand: $data.querySelector(".conteiner-shop__title--light").textContent,
        unit_price: $data.querySelector(
            ".conteiner-shop-products-cards__data--green"
        ).textContent,
        cantidad: 1,
    };
    if (cart.hasOwnProperty(product.id)) {
        product.cantidad = cart[product.id].cantidad + 1;
    } else {
        cart[product.id] = { ...product };
        showProduct(cart, templateCart, cardShoppingCart);
    }
}

console.log(localStorage.getItem("cart"));
