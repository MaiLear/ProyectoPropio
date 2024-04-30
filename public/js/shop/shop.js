import { uploadProductsCard, showProduct } from "../helpers/helperShop.js";

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

if (templateContainerCards && containershopProducts && products) {
}

if (newProducts && containerNewProducts && templateContainerCards) {
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

const getData = async (url, options = {}) => {
    try {
        const data = await fetch(url, options),
            json = await data.json();
        return json;
    } catch (err) {
        console.log(err);
    }
};

const createBtn = (options) => {
    let { classe, id, textContent } = options;
    const $showMoreBtn = document.createElement("button");
    $showMoreBtn.id = id;
    $showMoreBtn.textContent = textContent;
    $showMoreBtn.classList.add(...classe);
    return $showMoreBtn;
};

const saveInLocalStorage = (keys, values) => {
    keys.forEach((key, index) => {
        localStorage.setItem(key, values[index]);
    });
};

const showOldProducts = async () => {
    try {
        let dataOldProducts = await getData(
            `/${localStorage.getItem("quantityProducts")}/products`
        );
        if (dataOldProducts.length == 0) return;

        containershopProducts.nextElementSibling.remove();
        const $showMoreBtn = createBtn({
            classe: ["btn", "btn-link", "ms-5"],
            id: "btn-show-more-products",
            textContent: "Ver mas",
        });
        uploadProductsCard(
            containershopProducts,
            templateContainerCards,
            dataOldProducts
        );
        containershopProducts.insertAdjacentElement("afterend", $showMoreBtn);
    } catch (err) {
        console.log(err);
    }
};

const showNewProducts = async () => {
    try {
        let dataNewProducts = await getData(
            `/${localStorage.getItem("quantityNewProducts")}/newproducts`
        );
        console.log(dataNewProducts);

        if (dataNewProducts.length <= 0) return;

        containerNewProducts.nextElementSibling.remove();
        const $showMoreBtn = createBtn({
            classe: ["btn", "btn-link", "ms-5"],
            id: "btn-show-more-newproducts",
            textContent: "Ver mas",
        });
        uploadProductsCard(
            containerNewProducts,
            templateContainerCards,
            dataNewProducts
        );
        containerNewProducts.insertAdjacentElement("afterend", $showMoreBtn);
    } catch (err) {
        console.log(err);
    }
};

document.addEventListener("DOMContentLoaded", () => {
    saveInLocalStorage(["quantityProducts", "quantityNewProducts"], [10, 10]);
    showOldProducts();
    showNewProducts();
});

document.addEventListener("click", async function (e) {
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
    } else if (e.target.matches("#btn-show-more-products")) {
        let $quantity = parseInt(localStorage.getItem("quantityProducts")) + 10;
        localStorage.setItem("quantityProducts", $quantity);
        await showOldProducts();
    } else if (e.target.matches("#btn-show-more-newproducts")) {
        let $quantity =
            parseInt(localStorage.getItem("quantityNewProducts")) + 10;
        localStorage.setItem("quantityNewProducts", $quantity);
        await showNewProducts();
    }
});
