<?php

include_once'header.php';

?>

<body>

<div class="w3-light-grey w3-large">

    <!-- CONTAINER -->
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
                    "<input type='button' value='ADD' class='btn-add w3-round'></h5><p class='description w3-text-grey'>
                        <span class='product-price w3-right w3-tag w3-dark-grey w3-round'>".$product->getPrice()."</span>".$product->getDescription()."</p><br></div>";
                    }
                }
                echo $productString;
                ?>
            </div>

            <!--BASKET ITEMS-->
            <div id="Basket" class="basket w3-container menu w3-padding-48 w3-card w3-center">
                <div class="basket-row">
                    <b><span class="item-header w3-third w3-border-bottom w3-border-black">Item</span></b>
                    <b><span class="price-header w3-third w3-border-bottom w3-border-black">Price</span></b>
                    <b><span class="quantity-header w3-third w3-border-bottom w3-border-black">Quantity</span></b><br><br>
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

</body>
