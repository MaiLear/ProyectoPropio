//Containers products
let containershopProducts = document.querySelector(".conteiner-shop-products");
let containerNewProducts = document.querySelector(".conteiner-shop-newproducts");

//Templates
let templateContainerCards = document.getElementById(
    "template-conteiner-shop-products"
).content;

//Data
let products = JSON.parse(document
    .querySelector(".conteiner-shop-products")
    .getAttribute("data-products"));


let newProducts = JSON.parse(document
    .querySelector(".conteiner-shop-products").getAttribute("data-news"));


let cardsFragment = new DocumentFragment();
 
document.addEventListener('DOMContentLoaded', function(){
    uploadProductsCard(products, containershopProducts);//Carga las primeras tarjetas
    uploadProductsCard(newProducts, containerNewProducts);
   
})

async function  uploadProductsCard(data, container) {
    data.forEach((element) => {
        templateContainerCards.querySelector(".conteiner-shop-products-cards__img").setAttribute("src", `http://127.0.0.1:8000${element["img"]}`);
        templateContainerCards.querySelector(
            ".conteiner-shop-products-cards__data"
        ).textContent = element["name"];
        templateContainerCards.querySelector(
            ".conteiner-shop__title--light"
        ).textContent = element["brand"];
        templateContainerCards.querySelector(
            ".conteiner-shop-products-cards__data--green"
        ).textContent = '$'+element["unit_price"];
        const clone = templateContainerCards.cloneNode(true);
        cardsFragment.appendChild(clone);
    });
    container.appendChild(cardsFragment);
}

