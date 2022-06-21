// hamburger-menu
const hamburger = document.querySelector(".hamburger");
const myMenu = document.querySelector(".my-menu");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("myactive");
    myMenu.classList.toggle("myactive");
})

document.querySelectorAll(".nav-list-item").forEach(n => n.addEventListener("click", () => {
    hamburger.classList.remove("myactive");
    myMenu.classList.remove("myactive");
}))