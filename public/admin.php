<?php

include_once'header.php';

?>

<body>

<div class="w3-light-grey w3-large">

    <div class="w3-container" id="admin">
        <div class="w3-content" style="min-width: 1200px; max-width: 1200px"">

        <h3 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">ADMIN</span></h3>

        <div class="w3-row w3-center w3-card w3-padding">
            <a href="javascript:void(0)" onclick="openMenu(event, 'Orders');" id="myLink">
                <div class="w3-col s6 tablink">Orders</div>
            </a>
            <a href="javascript:void(0)" onclick="openMenu(event, 'Products');">
                <div class="w3-col s6 tablink">Products</div>
            </a>
        </div>

        <div id="Orders" class="w3-container admin w3-padding-48 w3-card w3-center">
            <!--ORDERS-->
        </div>

        <div id="Products" class="w3-container admin w3-padding-48 w3-card w3-center">
            <!--PRODUCTS-->
            <table class="products-table w3-table-all w3-centered">
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Stock No.</th>
                    <th>Edit Item</th>
                    <th>Remove Item</th>
                </tr>

                <?php
                $productString = "";

                $db = new dbContext();
                $products = $db->Products();

                if($products)
                {
                    foreach ($products as $product)
                    {
                        $productString .= "<tr><td class='ID'>".$product->getProductID()."</td>".
                            "<td class='name'>".$product->getName()."</td>".
                            "<td class='price'>".$product->getPrice()."</td>".
                            "<td class='catergory'>".$product->getCategory()."</td>".
                            "<td class='stockNo'>".$product->getStockNo()."</td>".
                            "<td><input type='button' value='Edit' class='btn-edit w3-round'></td>".
                            "<td><input type='button' value='Remove' class='btn-remove w3-round' onclick='btnRemove_onClick()'></td></tr>";
                    }
                }
                echo $productString;
                ?>
            </table>
            <br>
            <input type="button" value="Submit Changes" class="btn-submit w3-round">
        </div>
    </div>
    <br>
</div>

<?php
include_once('footer.php')
?>

<script src="../assets/js/admin.js"></script>

</body>