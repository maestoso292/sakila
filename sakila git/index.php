<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <link rel="stylesheet" href="sakilastyle.css">
</head>
<body>
<div id="mySideBar" class="sidebar">
    <a href="javascript:void(0)" class="close link" onclick="closeSideBar()">&times;</a> 
    <a style="font-weight:bold;font-size:30px">TABLES</a>
    <a class="link" href="actor.php">ACTOR</a>
    <a class="link" href="address.php">ADDRESS</a>
    <a class="link" href="category.php">CATEGORY</a>
    <a class="link" href="city.php">CITY</a>
    <a class="link" href="country.php">COUNTRY</a>
    <a class="link" href="customer.php">CUSTOMER</a>
    <a class="link" href="film.php">FILM</a>
    <a class="link" href="film_actor.php">FILM ACTOR</a>
    <a class="link" href="film_category.php">FILM CATEGORY</a>
    <a class="link" href="film_text.php">FILM TEXT</a>
    <a class="link" href="inventory.php">INVENTORY</a>
    <a class="link" href="language.php">LANGUAGE</a>
    <a class="link" href="payment.php">PAYMENT</a>
    <a class="link" href="rental.php">RENTAL</a>
    <a class="link" href="staff.php">STAFF</a>
    <a class="link" href="store.php">STORE</a>
</div>
<div id="mySideBar" class="sidebar">
    <a style="float:left;font-size:25px;cursor:pointer;" onclick="openSideBar()">&#9776;</a> 
    <a>TABLES</a>
</div>
<div class="header">
    <a style="float:left;font-size:25px;pointer-events:auto;cursor:pointer;cursor:hand" onclick="openSideBar()">&#9776;</a>
    <h1>SAKILA DATABASE</h1>
</div>
<script src="sakilascript.js"></script>
</body>
</html>