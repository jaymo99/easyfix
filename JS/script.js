document.addEventListener('click', e => {
    const isDropdownButton = e.target.matches("[data-dropdown-button]")
    if(!isDropdownButton && e.target.closest('[data-dropdown]') != null) return

    let currentDropdown
    if(isDropdownButton) {
        currentDropdown = e.target.closest('[data-dropdown]')
        currentDropdown.classList.toggle('active')
    }

    document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
        if(dropdown === currentDropdown) return
        dropdown.classList.remove('active')
    })
})

const element = document.querySelector(".mechanic_cards_container");

element.addEventListener('click', function(e) {
    //id value for a mechanic card
    let myDivId = e.target.closest('.mechanic_card').id;

    // pass reference of the hidden form to a variable
    let hiddenForm = document.getElementById("hiddenForm");

    // pass reference of the hidden input to a variable
    let hiddenInput = document.getElementById("hiddenInput");

    //Assign id value of mechanic card to the form input
    hiddenInput.value = myDivId;

    //submit the hidden form with hidden value (the value is used in php)
    hiddenForm.submit();

})

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