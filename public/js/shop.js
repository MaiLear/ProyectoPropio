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

let counter = 0;
let previusDataId = [];
let cart = [];
let templateOrderCart = document.getElementById('template-order-cart').content;
let cardShoppingCart = document.getElementById('card-shopping-cart');

 
document.addEventListener('DOMContentLoaded', function(){
    uploadProductsCard(products, containershopProducts);//Carga las primeras tarjetas
    uploadProductsCard(newProducts, containerNewProducts);
   
})

document.addEventListener('click', function(e){
    if(e.target.classList.contains('conteiner-shop-products-cards-icon__img'))
    {
        if(!previusDataId.includes(e.target.parentElement.dataset.id)){
            counter+=1;
            previusDataId.push(e.target.parentElement.dataset.id);
            setSelectedProduct(e.target.closest('.conteiner-shop-products-cards'));
        }
       document.getElementById('shoppingcartnotification').textContent=counter;
    }

    if(e.target.classList.contains('main-menu-list__icon')){
        document.getElementById('shoppingcartcard').classList.toggle('d-none');
    }

})

async function  uploadProductsCard(data, container) {
    data.forEach((element) => {
        templateContainerCards.querySelector('.conteiner-shop-products-cards').dataset.id = element['id'];
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



function setSelectedProduct($data){
    console.log($data);
    const product = {
        id: $data.dataset.id,
        img: $data.querySelector(".conteiner-shop-products-cards-icon__img").getAttribute("src"),
        name: $data.querySelector(
            ".conteiner-shop-products-cards__data"
        ).textContent,
        brand: $data.querySelector(
            ".conteiner-shop__title--light"
        ).textContent,
        unit_price: $data.querySelector(
            ".conteiner-shop-products-cards__data--green"
        ).textContent
    }

    cart[product.id] = {...product};
    console.log(cart);
    selectedProduct();

}


function selectedProduct(){
    cart.forEach((element) => {
            templateOrderCart.querySelector('.template-order-cart__img').setAttribute("src", `http://127.0.0.1:8000${element["img"]}`);
            templateOrderCart.querySelector('.template-order-cart__name').textContent = element['name'];
            templateOrderCart.querySelector('.template-order-cart__quantity').textContent = 1;
            templateOrderCart.querySelector('.template-order-cart_price').textContent = element['unit_price'];
            const clone = templateOrderCart.cloneNode(true);
            // cardsFragment.appendChild(clone);
            cardShoppingCart.appendChild(clone);
        });
}