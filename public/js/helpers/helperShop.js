let cardsFragment = new DocumentFragment();



export async function uploadProductsCard(container, template, data) {
   
    data.forEach((element, index) => {
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

export function showProduct(data, template, container) {
    data = data.filter(Boolean);
    console.log(data);

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
