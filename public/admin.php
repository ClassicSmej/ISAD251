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
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Status</th>
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
                        $productString .= "<form action='dbFunctions.php' method='post'><tr class='product'><td class='ID'>".$productID."</td>
                            <td class='name'><input class='txt' type='text' name='EDITNAME' value='".$name."'></td>
                            <td class='description'><input class='txt' type='text' name='EDITDES' value='".$description."'></td>
                            <td class='price'><input class='txt' type='text' name='EDITPRICE' value='".$price."'></td>
                            <td class='category'><select class='txt' name='EDITCAT'><option>$selectedCategory</option><option>$category</option></td>
                            <td class='status' name='EDIT STATUS'>".$status."</td>
                            <td><button type='submit' class='btn-edit w3-round'><span class=\"fa fa-edit\"></span></button></td></form>";

                            if ($product->getStatus() == 'On Sale') {
                                $productString .= "<td><form action='dbFunctions.php' method='post'><button type='submit' value='".$productID."' name='REMOVE' class='btn-remove w3-round'><span class=\"fa fa-times-circle\"></span></button></form></td>";
                            } else {
                                    $productString .= "<td><form action='dbFunctions.php' method='post'><button type='submit' value='".$productID."' name='PUSH' class='btn-add w3-round'><span class=\"fa fa-plus-square\"></span></button></form></td>";
                            }
                    }

                    $productString .= "<form action='dbFunctions.php' method='post'><tr class='product'><td class='ID'></td>
                                <td class='name'><input class='txt' type='text' name='NAME'></td>
                                <td class='description'><input class='txt' type='text' name='DESCRIPTION'></td>
                                <td class='price'><input class='txt' type='text' name='PRICE'></td>
                                <td class='category'><select class='txt' name='CATEGORY'><option>Drink</option><option>Food</option></td>
                                <td class='status'><select class='txt' name='STATUS'><option>On Sale</option><option>Not on Sale</option></td>
                                <td><button type='submit' class='btn-add w3-round'><span class=\"fa fa-plus-square\"></span></button></td></tr>";
                }
                echo $productString;
                ?>
            </table>
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