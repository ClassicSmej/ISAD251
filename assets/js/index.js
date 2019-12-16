onLoad(); //run function upon loading

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

//Shopping Basket

document.getElementById("btnAdd").addEventListener("click", function() {
    alert("Hello World!");
});

function onLoad() {
    var addButtons = document.getElementsByClassName('btn-add'); //get add button
    for (var i = 0; i < addButtons.length; i++){ //loop through all buttons and put in array
        var clicked = addButtons[i];
        clicked.addEventListener('click', clickedItem); //add event listener
    }

    var removeButtons = document.getElementsByClassName('btn-remove'); //get remove button
    for (var i = 0; i < removeButtons.length; i++) { //loop through all buttons and put in array
        var clicked = removeButtons[i]; //get clicked button id
        clicked.addEventListener('click', removeItem); //add event listener
    }
}

//get data of clicked item
function clickedItem(event) {
    var clicked = event.target; //get clicked button id
    var item = clicked.parentElement.parentElement; //get item data
    var product = item.getElementsByClassName('product-details')[0].innerText; //get the item that the button relates to from array
    var price = item.getElementsByClassName('product-price')[0].innerText; // get the price that the button relates to from array
    addItem(product, price); //pass to addItem function
}

//add item to basket
function addItem(product, price) {
    var basketRow = document.createElement('div'); //create new div for the basket
    var basketItems = document.getElementsByClassName('basket-items')[0];
    // add in new html elements to basket when item added
    basketRow.innerHTML = `
                <div class="basket-row basket-column">
                    <span class="basket-item basket-column">${product}</span>
                    <span class="basket-price basket-column">${price}</span>
                    <span class="basket-quantity basket-column"><input class="txtQuantity" type="number" value="1"></span>
                    <span class='remove'><input type="button" value="Remove" class="btn-remove w3-round"></span>
                </div><br>`; // add in new html elements to basket when item added
    basketItems.append(basketRow); //append item to a new div
}

//removing items from basket
function removeItem(event) {
    var clicked = event.target; //get clicked button id
    clicked.parentElement.parentElement.remove();
}