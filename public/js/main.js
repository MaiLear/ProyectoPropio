let containerUser = document.querySelector(".container-menu-top-user");
let containerSelect = document.querySelector(".container-menu-top-select");


setTimeout(() => {
    document.querySelector(".register__message").style.display = "none";
}, 3000);

containerUser.addEventListener("click", () => {
    containerSelect.classList.toggle("container-menu-top-select--active");
});

