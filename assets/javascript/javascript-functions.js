
window.addEventListener("load", function () {

    var dropdownButton = document.getElementById("dropdownButton");
    dropdownButton.addEventListener("click", toggleHamburgerMenu, "false");

    function toggleHamburgerMenu() {
        document.getElementById("dropdownContent").classList.toggle("show");
    }
    
    
    
    var theArrows = document.querySelectorAll("li.page_item_has_children, li.menu-item-has-children"); 
    for(let i = 0; i < theArrows.length; i++) {
        theArrows[i].addEventListener("click", function() {
            showMenu(i);
        }, "false");
    }

    function showMenu(itemNumber) {
        var theSubMenus = theArrows[itemNumber].querySelectorAll(".sub-menu, .children");
        theSubMenus[0].classList.toggle("show");
        
        for(let i = 0; i < theSubMenus.length; i++){
            if(theSubMenus[0].classList.contains("show")){
                theSubMenus[i].classList.add("show");
            } else {
                theSubMenus[i].classList.remove("show");
            }
        }   
    }

}, "false");
