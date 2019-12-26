// Tabbed Menu
function openMenu(evt, menuName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("admin");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
    }
    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();

//Removing item from sale
var removeButtons = document.getElementsByClassName('btn-remove'); //get add button
for (var i = 0; i < removeButtons.length; i++){ //loop through all buttons
    var remove = removeButtons[i]; //put in array
    remove.addEventListener('click', removeItem); //add event listener
}

function removeItem(event) {
    var clicked = event.target; //get clicked button id
    clicked.parentElement.parentElement.remove(); //remove item div from basket
}

function btnRemove_onClick(){
    removeItem();
}

