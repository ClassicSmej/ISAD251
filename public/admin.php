<?php
include_once('header.php')
?>

<body>

<div class="w3-light-grey w3-grayscale w3-large">

    <div class="w3-container" id="admin">
        <div class="w3-content" style="max-width:700px">

            <h3 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">ADMIN</span></h3>

            <div class="w3-row w3-center w3-card w3-padding">
                <a href="javascript:void(0)" onclick="openMenu(event, 'Orders');" id="myLink">
                    <div class="w3-col s6 tablink">Orders</div>
                </a>
                <a href="javascript:void(0)" onclick="openMenu(event, 'Products');">
                    <div class="w3-col s6 tablink">Products</div>
                </a>
            </div>

            <div id="Orders" class="w3-container admin w3-padding-48 w3-card">
                <!-- ENTER ORDERS HERE -->
            </div>

            <div id="Products" class="w3-container admin w3-padding-48 w3-card">
                <!-- ENTER PRODUCTS HERE -->
                <?php

                ?>

            </div>
        </div>
        <br>
    </div>
</div>

<?php
include_once('footer.php')
?>

    <script src="../assets/js/admin.js"></script>


</body>