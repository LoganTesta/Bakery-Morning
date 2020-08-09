
window.addEventListener("load", function () {

    var dropdownButton = document.getElementById("dropdownButton");
    dropdownButton.addEventListener("click", toggleHamburgerMenu, "false");

    function toggleHamburgerMenu() {
        document.getElementById("dropdownContent").classList.toggle("show");
    }

}, "false");