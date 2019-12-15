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

            <div id="Menu" class="w3-container menu w3-padding-48 w3-card">
                <!--MENU ITEMS-->
                <?php
                $productString = "";

                $i = 0; //Counter for unique id numbers
                $db = new dbContext();
                $products = $db->Products();

                if($products)
                {
                    foreach ($products as $product) {
                        $i++;
                        $productString .= "<h5>".$product->getName().
                    "<span class='w3-right w3-tag w3-dark-grey w3-round'>".$product->getPrice()."</span>"."</h5>".
                        "<p class='w3-text-grey' id='p$i'>".$product->getDescription()."<input type='button' value='ADD' id='btnAdd$i' onclick='btnAdd$i()' class='btnAdd w3-round'>"."</p>"."</br>";
                    }
                }
                echo $productString;
                ?>
            </div>

            <div id="Basket" class="w3-container menu w3-padding-48 w3-card w3-center">
                <!--BASKET ITEMS-->
                <div class="cart-row">
                    <span class="cart-item cart-header cart-column">ITEM</span>
                    <span class="cart-price cart-header cart-column">PRICE</span>
                    <span class="cart-quantity cart-header cart-column">QUANTITY</span>
                </div>
                <div class="cart-items">
                </div>
                <div class="cart-total">
                    <strong class="cart-total-title">Total:</strong>
                    <span class="cart-total-price">£0</span>
                </div>
                <input class="checkout w3-round" type="button" value="CHECKOUT" onclick="btnCheckout_onClick()">
            </div>
            <br>
        </div>
    </div>
</div>

<?php
include_once('footer.php')
?>

<script src="../assets/js/index.js"></script>

</body>
