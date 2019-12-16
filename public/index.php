<?php
include_once'header.php';
?>

<body>

<div class="w3-light-grey w3-large">

    <!-- Menu Container -->
    <div class="w3-container" id="menu">
        <div class="w3-content" style="max-width:700px">

            <h3 class="w3-center w3-padding-48"><span class="w3-tag w3-black">MENU</span></h3>

            <div class="w3-row w3-center w3-card w3-padding">
                <a href="javascript:void(0)" onclick="openMenu(event, 'Menu');" id="myLink">
                    <div class="w3-col s6 tablink">Menu <span class="fa fa-bars"></span></div>
                </a>
                <a href="javascript:void(0)" onclick="openMenu(event, 'Basket');">
                    <div class="w3-col s6 tablink">Basket <span class="fa fa-shopping-basket"></span></div>
                </a>
            </div>

            <!--MENU ITEMS-->
            <div id="Menu" class="w3-container menu w3-padding-48 w3-card">
                <?php
                $productString = "";
                $i = 0; //Counter for unique id numbers
                $db = new dbContext();
                $products = $db->Products();
                if($products)
                {
                    foreach ($products as $product) {
                        $i++;
                        $productString .= "<div class='item'><h5 class='product-details'>".$product->getName().
                            "</h5><span class='product-price w3-right w3-tag w3-dark-grey w3-round'>".$product->getPrice()."</span>
                            <p class='w3-text-grey' >".$product->getDescription()."<input type='button' value='ADD' class='btn-add w3-round'></p><br></div>";
                    }
                }
                echo $productString;
                ?>
            </div>

            <!--BASKET ITEMS-->
            <div id="Basket" class="basket w3-container menu w3-padding-48 w3-card w3-center">
                <div class="basket-row">
                    <span class="basket-item basket-header basket-column">Item</span>
                    <span class="basket-price basket-header basket-column">Price</span>
                    <span class="basket-quantity basket-header basket-column">Quantity</span>
                </div>
                <div class="basket-items">
                </div>
                <div class="basket-total">
                    <b>Total:</b>
                    <span class="basket-total-price">£0</span>
                </div>
                <br>
                <input class="btn-checkout w3-round" type="button" value="CHECKOUT" onclick="btnCheckout_onClick()">
            </div>
            <br>
        </div>
    </div>
</div>

<?php
include_once('footer.php')
?>

<script src="../assets/js/index.js"></script>

<script lang="JavaScript">

    onLoad(); //run function upon loading

    function onLoad() {
        var addButtons = document.getElementsByClassName('btn-add'); //get add button
        for (var i = 0; i < addButtons.length; i++){ //loop through all buttons and put in array
            var clicked = addButtons[i];
            clicked.addEventListener('click', clickedItem); //add event listener
        }
        var removeButtons = document.getElementsByClassName('btn-remove'); //get remove button
        for (var j = 0; j < removeButtons.length; j++) { //loop through all buttons and put in array
            var clicked = removeButtons[j]; //get clicked button id
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
                    <span class="basket-quantity basket-column"><input class="txt-quantity" type="number" value="1"></span>
                    <span class='remove'><input type="button" value="Remove" class="btn-remove w3-round"></span>
                </div><br>`; // add in new html elements to basket when item added
        basketItems.append(basketRow); //append item to a new div
    }

    //removing items from basket
    function removeItem(event) {
        var clicked = event.target; //get clicked button id
        clicked.parentElement.parentElement.remove();
    }
</script>

</body>