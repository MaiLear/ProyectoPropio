let cardsFragment = new DocumentFragment();

// document.addEventListener('DOMContentLoaded', function(){
//     uploadProductsCard(products, containershopProducts);//Carga las primeras tarjetas
//     uploadProductsCard(newProducts, containerNewProducts);

// })

// document.addEventListener('click', function(e){
//     if(e.target.classList.contains('conteiner-shop-products-cards-icon__img'))
//     {
//             setSelectedProduct(e.target.closest('.conteiner-shop-products-cards'));
//             document.getElementById('shoppingcartnotification').textContent=cart.length;
//     }

//     if(e.target.classList.contains('main-menu-list__icon') || e.target.matches('#btn-card__close')){
//         document.getElementById('shoppingcartcard').classList.toggle('d-none');
//     }

// })

export async function uploadProductsCard(data, container, template) {
    data.forEach((element) => {
        template.querySelector(".conteiner-shop-products-cards").dataset.id =
            element["id"];
        template
            .querySelector(".conteiner-shop-products-cards__img")
            .setAttribute("src", element["img"]);
        template.querySelector(
            ".conteiner-shop-products-cards__data"
        ).textContent = element["name"];
        template.querySelector(".conteiner-shop__title--light").textContent =
            element["brand"];
        template.querySelector(
            ".conteiner-shop-products-cards__data--green"
        ).textContent = element["unit_price"];
        const clone = template.cloneNode(true);
        cardsFragment.appendChild(clone);
    });
    container.appendChild(cardsFragment);
}

// export function showProductCart(template){
//     cart = cart.filter(Boolean);
//     // cardShoppingCart.innerHTML = '';
//     cart.forEach((element) => {
//             template.querySelector('.template-shopping-cart__img').setAttribute("src", `http://127.0.0.1:8000${element["img"]}`);
//             template.querySelector('.template-shopping-cart__name').textContent = element['name'];
//             template.querySelector('.template-shopping-cart__name').textContent = element['brand'];
//             template.querySelector('.template-shopping-cart__quantity').textContent = 1;
//             template.querySelector('.template-shopping-cart__price').textContent = element['unit_price'];
//             const clone = template.cloneNode(true);
//             cardsFragment.appendChild(clone);
//         });
//         cardShoppingViewCart.appendChild(cardsFragment);
//         console.log(cart);
// }

export function showProduct(data, template, container) {
    data = data.filter(Boolean);
    container.innerHTML = "";
    data.forEach((element) => {
        template.querySelector(".template-cart__id").dataset.id = element["id"];
        template
            .querySelector(".template-cart__img")
            .setAttribute("src", element["img"]);
        template.querySelector(".template-cart__name").textContent =
            element["name"];
        template.querySelector(".template-cart__brand").textContent =
            element["brand"];
        template.querySelector(".template-cart__quantity").textContent =
            element["cantidad"];
        template.querySelector(".template-cart_price").textContent =
            parseInt(element["unit_price"]) * element["cantidad"];
        const clone = template.cloneNode(true);
        cardsFragment.appendChild(clone);
    });
    container.appendChild(cardsFragment);
}
