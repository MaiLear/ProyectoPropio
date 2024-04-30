const d = document;

d.addEventListener("submit", (e) => {
    if (e.target.matches("#form-customer")) {
        e.preventDefault();
        if (localStorage.getItem("cart")) {
            let dataCart = JSON.parse(localStorage.getItem("cart"));
            dataCart = dataCart.filter((el) => el != null);
            console.log(dataCart);
            const $idInput = e.target.product_id;
            const $quantityInput = e.target.quantity;
            const $priceInput = e.target.price;

            dataCart.forEach((el) => {
                console.log(el);
                $idInput.value += el["id"] + ",";
                $quantityInput.value += el["cantidad"] + ",";
                $priceInput.value += el["unit_price"] + ",";
            });
            // $idInput.value = $idInput.value.replace(",", "");
            // $quantityInput.value = $quantityInput.value.replace(",", "");
            // $priceInput.value = $priceInput.value.replace(",", "");
        }
    }
    e.target.submit();
});
