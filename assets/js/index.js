//Tabbed Menu - W3 Schools
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

//Basket Functionality
var addButtons = document.getElementsByClassName('btn-add'); //get add button
for (var i = 0; i < addButtons.length; i++){ //loop through all buttons
    var add = addButtons[i]; //put in array
    add.addEventListener('click', clickedItem); //add event listener
}

var quantity = document.getElementsByClassName('txt-quantity');
for (var j = 0; j < quantity.length; j++) { //loop through all text boxes
    var input = quantity[j];  //put in array
    input.addEventListener('change', quantityChanged) //add event listener
}

//get data of clicked item
function clickedItem(event) {
    var clicked = event.target; //get clicked button id
    var item = clicked.parentElement.parentElement; //get item data
    var product = item.getElementsByClassName('products')[0].innerText; //get the item that the button relates to from array
    var price = item.getElementsByClassName('price')[0].innerText; // get the price that the button relates to from array
    addItem(product, price); //pass to addItem function
}

//add item to basket
function addItem(product, price) {
    var newitem = document.createElement('div'); //create new div for the basket
    newitem.classList.add('item'); //give new div class name
    var basket = document.getElementsByClassName('basket-items')[0]; //get current basket - will be empty on load
    var item = document.getElementsByClassName('product');
    for (var i = 0; i < item.length; i++) { //loop though basket
        if (item[i].innerText === product) { //check if item is already in basket
            alert('This item is already in your basket'); //if true; don't add & alert user
            return
        }
    }
    // add in new html elements to basket when item added
    newitem.innerHTML = `
                <div class="product">
                    <input class="product-txt w3-third" name="PRODUCT" value="${product}" disabled>
                    <input class="item-price w3-third" name="B.PRICE" value="${price}" disabled>
                    <span class="quantity w3-third"><input class="txt-quantity" type="number" value="1" name="QUANTITY"> <input type='submit' class='btn-remove w3-round' value="X" title="Remove Item"></span>
                </div><br><br>`;
    basket.append(newitem); //append item to a new div
    newitem.getElementsByClassName('btn-remove')[0].addEventListener('click', removeItem); //add event listener to each remove button
    newitem.getElementsByClassName('txt-quantity')[0].addEventListener('change', quantityChanged); //add event listener to quantity box
    updateTotal();
}

//removing items from basket
function removeItem(event) {
    var clicked = event.target; //get clicked button id
    clicked.parentElement.parentElement.parentElement.remove(); //remove item div from basket
    updateTotal();
}

function quantityChanged(event) {
    var input = event.target;
    if (input.value <= 0) { //if input is less than zero
        input.value = 1; //prevent negative quantities
    }
    updateTotal();
}

//update basket total after each update (e.g. adding, removing or increasing)
function updateTotal() {
    var basket = document.getElementsByClassName('basket-items')[0]; //get basket
    var items = basket.getElementsByClassName('item'); //get all basket items
    var total = 0; //declare total
    for (var i = 0; i < items.length; i++){ //loop through each product in basket
        var products = items[i]; //get each item from basket
        var price = parseFloat(products.getElementsByClassName('item-price')[0].value); //get price of product and convert to a float
        var quantity = products.getElementsByClassName('txt-quantity')[0].value; //get quantity of product
        total = total + (price * quantity); //calculate total
    }
    total = Math.round(total * 100) / 100; //round to 2 decimal places
    document.getElementsByClassName('total-price')[0].innerText = '£' + total; //display total in html
}