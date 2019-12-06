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
                <a href="javascript:void(0)" onclick="openMenu(event, 'Drinks');" id="myLink">
                    <div class="w3-col s4 tablink">Drinks</div>
                </a>
                <a href="javascript:void(0)" onclick="openMenu(event, 'Eat');">
                    <div class="w3-col s4 tablink">Eat</div>
                </a>
                <a href="javascript:void(0)" onclick="openMenu(event, 'Basket');">
                    <div class="w3-col s4 tablink">Basket <span class="fa fa-shopping-basket"></span></div>
                </a>
            </div>

            <div id="Drinks" class="w3-container menu w3-padding-48 w3-card">
                <!--DRINK MENU ITEMS-->
                <?php
                $productString = "";

                $db = new dbContext();
                $products = $db->Products();

                if($products)
                {
                    foreach ($products as $product)
                    {
                        $productString .= "<h5>".$productString->getDescription().
                    "<span class=\"w3-right w3-tag w3-dark-grey w3-round\">".$productString->getPrice()."</span>"."</h5>";
                    }
                }
                echo $productString;
                ?>
            </div>

            <div id="Eat" class="w3-container menu w3-padding-48 w3-card">
                <!--FOOD MENU ITEMS-->
                <h5>Coffee
                    <span class="w3-right w3-tag w3-dark-grey w3-round" id="price5">2.50</span></h5>
                <p class="w3-text-grey" id="p5">Regular coffee
                    <input type="button" value="ADD" class="btnAdd w3-round" onclick="btnAdd5_onClick()"/></p><br>

                <h5>Chocolato
                    <span class="w3-right w3-tag w3-dark-grey w3-round" id="price6">2.50</span></h5>
                <p class="w3-text-grey" id="p6">Chocolate espresso with milk
                    <input type="button" value="ADD" class="btnAdd w3-round" onclick="btnAdd6_onClick()"/></p><br>

                <h5>Corretto
                    <span class="w3-right w3-tag w3-dark-grey w3-round" id="price7">2.50</span></h5>
                <p class="w3-text-grey" id="p7">Whiskey and coffee
                    <input type="button" value="ADD" class="btnAdd w3-round" onclick="btnAdd7_onClick()"/></p><br>

                <h5>Iced tea
                    <span class="w3-right w3-tag w3-dark-grey w3-round" id="price8">2.50</span></h5>
                <p class="w3-text-grey" id="p8">Hot tea, except not hot
                    <input type="button" value="ADD" class="btnAdd w3-round" onclick="btnAdd8_onClick()"/></p><br>

                <h5>Soda
                    <span class="w3-right w3-tag w3-dark-grey w3-round" id="price9">2.50</span></h5>
                <p class="w3-text-grey" id="p9">Coke, Sprite, Fanta, etc.
                    <input type="button" value="ADD" class="btnAdd w3-round" onclick="btnAdd9_onClick()"/></p>
            </div>

            <div id="Basket" class="w3-container menu w3-padding-48 w3-card w3-center">
                <!--BASKET ITEMS-->
                <h3 style="text-align: center">There is currently no <br> items in your basket</h3>
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
