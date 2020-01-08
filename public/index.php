<?php

include_once'header.php';
include_once '../src/controller/basketController.php';

?>

<body>

<div class="w3-light-grey w3-large">

    <!-- CONTAINER -->
    <div class="w3-container" id="menu">
        <div class="w3-content" style="max-width:800px">

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

                $db = new dbContext();
                $products = $db->Products();

                if($products)
                {
                    foreach ($products as $product) {
                        if ($product->getStatus() == 'On Sale'){
                            $productString .= "<div class='item'><h5 class='products'>".$product->getName().
                                "<input class='btn-add w3-round w3-right' type='button' value='ADD'></h5><p class='description w3-text-grey'>
                        <span class='price w3-right w3-tag w3-dark-grey w3-round'>".$product->getPrice()."</span>".$product->getDescription()."</p><br></div>";
                        }
                    }
                }
                echo $productString;
                ?>
            </div>

            <!--BASKET ITEMS-->
            <div id="Basket" class="basket w3-container menu w3-padding-48 w3-card w3-center">
                <div>
                    <b><span class="product-header w3-third w3-border-bottom w3-border-black">Item</span></b>
                    <b><span class="price-header w3-third w3-border-bottom w3-border-black">Price</span></b>
                    <b><span class="quantity-header w3-third w3-border-bottom w3-border-black">Quantity</span></b><br><br>
                </div>
                <div class="basket-items">
                </div>
                <div class="total">
                    <b>Total:</b>
                    <span class="total-price"></span>
                </div>
                <br>
                <input class="btn-checkout w3-round" type="button" value="CHECKOUT">
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
