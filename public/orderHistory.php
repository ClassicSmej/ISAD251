<?php

include_once'header.php';

?>

<body>

<div class="w3-light-grey w3-large">

    <!-- Orders Container -->
    <div class="w3-container" id="orders">
        <div class="w3-content" style="max-width:800px">

            <h3 class="w3-center w3-padding-48"><span class="w3-tag w3-black">VIEW ORDERS</span></h3>

            <div class="w3-row w3-center w3-card w3-padding">
                    <div class="w3-col tablink">Orders</div>
            </div>

            <div id="Orders" class="w3-container w3-padding-48 w3-card w3-center" style="text-align: center">
                <h4>ENTER YOUR ORDER NUMBER</h4>
                <input class="order-num w3-round w3-center" type="text" placeholder="Order No #">
                <input class="btn-submit w3-round" type="button" value="SUBMIT">
            </div>
            <br>
        </div>
    </div>
</div>

<?php
include_once('footer.php')
?>

</body>