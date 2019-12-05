//Tabbed Menu
function openMenu(evt, menuName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("menu");
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

var n = null;

//Add item function - SURELY A BETTER WAY TO DO THIS
function addItem() {
    var ul = document.getElementById("lstBasket");
    var p = document.getElementById("p" + n)
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(p.innerText));
    ul.appendChild(li);
}

function btnAdd0_onClick() {
    n = 0;
    addItem(n)
}

function btnAdd1_onClick() {
    n = 1;
    addItem(n)
}

function btnAdd2_onClick() {
    n = 2;
    addItem(n)
}

function btnAdd3_onClick() {
    n = 3;
    addItem(n)
}

function btnAdd4_onClick() {
    n = 4;
    addItem(n)
}

function btnAdd5_onClick() {
    n = 5;
    addItem(n)
}

function btnAdd6_onClick() {
    n = 6;
    addItem(n)
}

function btnAdd7_onClick() {
    n = 7;
    addItem(n)
}

function btnAdd8_onClick() {
    n = 8;
    addItem(n)
}

function btnAdd9_onClick() {
    n = 9;
    addItem(n)
}