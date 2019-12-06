<?php

include_once'../src/model/dbContext.php';
include_once'../src/model/product.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pub</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/layout.css">

</head>

<body>

<!--Top Navigation Bar-->
<div class="w3-top">
    <div class="w3-row w3-padding w3-black">
        <div class="w3-col s3">
            <a href="index.php" class="w3-button w3-block w3-black">HOME</a>
        </div>
        <div class="w3-col s3">
            <a href="index.php" class="w3-button w3-block w3-black">MENU</a>
        </div>
        <div class="w3-col s3">
            <a href="orderHistory.php" class="w3-button w3-block w3-black">ORDERS</a>
        </div>
        <div class="w3-col s3">
            <a href="admin.php" class="w3-button w3-block w3-black">ADMIN</a>
        </div>
    </div>
</div>

<!--Background Image Header-->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-left w3-center w3-padding-large w3-hide-small">
        <span class="w3-tag" style="font-size:50px">WELCOME<br>TO<br>THE PUB</span>
    </div>
    <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
        <span class="w3-tag">Opening Times<br>Mon to Thurs 12pm - 11pm<br>Friday 12pm - Midnight<br>Saturday 12pm - 11pm<br>Sunday 12pm - 10.30pm</span>
    </div>
</header>

</body>
</html>