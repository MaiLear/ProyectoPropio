const inputCartData = document.getElementById("inputDataCart");
inputCartData.textContent = localStorage.getItem("cart");

document.addEventListener("click", function (e) {
    if (e.target.id === "showpassword") {
        let inputPassword = document.getElementById("password-login");
        if (e.target.checked) {
            inputPassword.type = "text";
        } else {
            inputPassword.type = "password";
        }
    }
});
