<?php

include_once '../src/model/dbContext.php';
include_once 'header.php';
session_start();

?>

<body>

<div class="w3-light-grey w3-large">

    <!-- Orders Container -->
    <div class="w3-container" id="orders">
        <div class="w3-content" style="max-width:800px">

            <h3 class="w3-center w3-padding-48"><span class="w3-tag w3-black">ORDER HISTORY</span></h3>

            <div class="w3-row w3-center w3-card w3-padding">
                <div class="w3-col tablink">Orders</div>
            </div>

            <div id="Orders" class="w3-container w3-padding-48 w3-card w3-center" style="text-align: center">
                <?php
                $orderString = "";

                $db = new dbContext();
                $orders = $db->searchOrder();

                if($orders) {
                    foreach ($orders as $order) {

                        $orderID = $order->getOrderID();
                        $productID = $order->getProductID();
                        $quantity = $order->getQuantity();

                        $orderString .= "<p class='w3-round w3-third w3-border w3-border-black' style='text-align: left'><b> Order ID: </b>".$orderID. "<br>
                            <b>Product ID: </b>".$productID."<br><b>Quantity: </b>".$quantity."</p>";
                        }
                    }

                echo $orderString;
                ?>
                <br>
                <form action='orderHistory.php'><button class='btn-remove w3-round' title='Back'>Back <span class='fa fa-arrow-left'></span></button></form>
            </div>
            <br>
        </div>
    </div>
</div>

<?php
include_once('footer.php')
?>

</body>
