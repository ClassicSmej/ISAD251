<?php

include_once'header.php';

?>

<body>

<div class="w3-light-grey w3-grayscale w3-large">

    <div class="w3-container" id="admin">
        <div class="w3-content" style="max-width:700px;">

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
                <table class="w3-table-all w3-centered">
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Stock No.</th>
                    </tr>

                    <?php
                    $productString = "";

                    $db = new dbContext();
                    $products = $db->Products();

                    if($products)
                    {
                        foreach ($products as $product)
                        {
                            $productString .= "<tr><td>".$product->getProductID()."</td>".
                                "<td>".$product->getName()."</td>".
                                "<td>".$product->getPrice()."</td>".
                                "<td>".$product->getCategory()."</td>".
                                "<td>".$product->getStockNo()."</td>"."</tr>";
                        }
                    }
                    echo $productString;
                    ?>
                </table>
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