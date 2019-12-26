<?php

include_once'header.php';

?>

<body>

<div class="w3-light-grey w3-large">

    <div class="w3-container" id="admin">
        <div class="w3-content" style="min-width: 1000px; max-width: 1000px"">

        <h3 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">ADMIN</span></h3>

        <div class="w3-row w3-center w3-card w3-padding">
            <a href="javascript:void(0)" onclick="openMenu(event, 'Orders');" id="myLink">
                <div class="w3-col s6 tablink">Orders</div>
            </a>
            <a href="javascript:void(0)" onclick="openMenu(event, 'Products');">
                <div class="w3-col s6 tablink">Products</div>
            </a>
        </div>

        <!--ORDERS-->
        <div id="Orders" class="w3-container admin w3-padding-48 w3-card w3-center">

        </div>

        <!--PRODUCTS-->
        <div id="Products" class="w3-container admin w3-padding-48 w3-card w3-center">
            <table class="products-table w3-table-all w3-centered">
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Stock No.</th>
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
                        //product table variables
                        $ProductID = $product->getProductID();
                        $Name = $product->getName();
                        $price = $product->getPrice();
                        $StockNo = $product->getStockNo();
                        if ($product->getCategory() == 'Drink')
                        {
                            $selectedCategory = "Drink";
                            $category = "Food";
                        } elseif ($product->getCategory() == 'Food') {
                            $selectedCategory = "Food";
                            $category = "Drink";
                        }

                        //HTML for products table
                        $productString .= "<tr class='products-table'><td class='ID'>".$ProductID."</td>".
                            "<td class='name'><input class='txt' type='text' value='".$Name."'></td>".
                            "<td class='price'><input class='txt' type='text' value='".$price."'></td>".
                            "<td class='category'><select class='txt'><option>$selectedCategory</option><option>$category</option></td>".
                            "<td class='stockNo'><input class='txt' type='text' value='".$StockNo."'></td>".
                            "<td><input type='button' value='Remove' class='btn-remove w3-round'></td></tr>";
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