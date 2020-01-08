<?php

include_once'header.php';
session_start();

?>

<body>

<div class="w3-light-grey w3-large">

    <div class="w3-container" id="admin">
        <div class="w3-content" style="min-width: 1250px; max-width: 1250px"">

        <h3 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">ADMIN</span></h3>

        <div class="w3-row w3-center w3-card w3-padding">
            <a href="javascript:void(0)" onclick="openMenu(event, 'Products');" id="myLink">
                <div class="w3-col s6 tablink">Products</div>
            </a>
            <a href="javascript:void(0)" onclick="openMenu(event, 'Orders');">
                <div class="w3-col s6 tablink">Orders</div>
            </a>
        </div>

        <!--PRODUCTS-->
        <div id="Products" class="w3-container admin w3-padding-48 w3-card w3-center">
            <table class="products-table w3-table-all w3-centered">
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Remove/Add</th>
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
                        $productID = $product->getProductID();
                        $name = $product->getName();
                        $description = $product->getDescription();
                        $price = $product->getPrice();
                        $status = $product->getStatus();

                        if ($product->getCategory() == 'Drink')
                        {
                            $selectedCategory = "Drink";
                            $category = "Food";
                        } elseif ($product->getCategory() == 'Food') {
                            $selectedCategory = "Food";
                            $category = "Drink";
                        }

                        //HTML for products table
                        $productString .= "<form action='editForm.php' method='post'><tr class='product'><td class='ID'>".$productID."</td>
                            <td class='name'><input class='txt' type='text' name='NAME' value='".$name."'></td>
                            <td class='description'><input class='txt' type='text' name='DESCRIPTION' value='".$description."'></td>
                            <td class='price'><input class='txt' type='text' name='PRICE' value='".$price."'></td>
                            <td class='category'><select class='txt' name='CATEGORY'><option>$selectedCategory</option><option>$category</option></td>
                            <td class='status'>".$status."</td>
                            <td><button type='submit' value='".$productID."' name='EDIT' class='btn-edit w3-round' title='Edit Item'><span class='fa fa-edit'></span></button></td></form>";

                        if ($product->getStatus() == 'On Sale') {
                            $productString .= "<td><form action='itemForm.php' method='post'><button type='submit' value='".$productID."' name='OFFSALE' class='btn-remove w3-round' title='Remove Item'><span class='fa fa-times-circle'></span></button></form></td>";
                        } else {
                            $productString .= "<td><form action='itemForm.php' method='post'><button type='submit' value='".$productID."' name='ONSALE' class='btn-add w3-round' title='Add Item'><span class='fa fa-plus-square'></span></button></form></td>";
                        }
                    }

                    $productString .= "<form action='itemForm.php' method='post'><tr class='product'><td>N/A</td>
                                <td class='name'><input class='txt' type='text' name='NEWNAME'></td>
                                <td class='description'><input class='txt' type='text' name='NEWDESCRIPTION'></td>
                                <td class='price'><input class='txt' type='text' name='NEWPRICE'></td>
                                <td class='category'><select class='txt' name='NEWCATEGORY'><option>Drink</option><option>Food</option></td>
                                <td class='status'><select class='txt' name='NEWSTATUS'><option>On Sale</option><option>Not on Sale</option></td>
                                <td>----</td>
                                <td><button type='submit' class='btn-add w3-round' title='Remove Item'><span class='fa fa-plus-square'></span></button></td></tr></form>";
                }
                echo $productString;
                ?>
            </table>
        </div>

        <!--ORDERS-->
        <div id="Orders" class="w3-container admin w3-padding-48 w3-card w3-center">

                <?php
                $orderString = "";

                $db = new dbContext();
                $orders = $db->orderItems();

                if($orders) {
                    foreach ($orders as $order) {
                        //product table variables
                        $orderID = $order->getOrderID();
                        $productID = $order->getProductID();
                        $quantity = $order->getQuantity();

                        //HTML for products table
                        $orderString .= "<div class='product w3-third w3-panel w3-border w3-border-black w3-round-xlarge'>Order ID:".$orderID.
                            "<br>Product ID: ".$productID."<br>Quantity: ".$quantity."</div>";
                    }
                }
                echo $orderString;

                //DUPLICATE MUST EDIT THIS!!!!
                $itemString = "";

                $db = new dbContext();
                $items = $db->orderItems();

                if($orders) {
                    foreach ($orders as $order) {
                        //product table variables
                        $orderID = $order->getOrderID();
                        $productID = $order->getProductID();
                        $quantity = $order->getQuantity();

                        //HTML for products table
                        $orderString .= "<div class='product w3-third w3-panel w3-border w3-border-black w3-round-xlarge'>Order ID:".$orderID.
                            "<br>Product ID: ".$productID."<br>Quantity: ".$quantity."</div>";
                    }
                }
                echo $orderString;
                ?>
        </div>
    </div>
    <br>
</div>

<?php
include_once('footer.php')
?>

<script>
    //Tabbed Menu - W3 Schools
    function openMenu(evt, menuName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("admin");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
        }
        document.getElementById(menuName).style.display = "block";
        evt.currentTarget.firstElementChild.className += " w3-dark-grey";
    }
    document.getElementById("myLink").click();
</script>

</body>
