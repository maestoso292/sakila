<!DOCTYPE html>
<html>
<meta charset="utf-8" content="width=device-width, initial-scale=0.5">
<head>
    <link rel="stylesheet" type="text/css" href="sakilastyle.css">
</head>
<body>

<div id="mySideBar" class="sidebar">
    <a href="javascript:void(0)" class="close link" onclick="closeSideBar()">&times;</a> 
    <a class="link" href="./" style="font-weight:bold;font-size:30px">MAIN PAGE</a>
    <a style="font-weight:bold;font-size:30px">TABLES</a>
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

<div class="header">
    <a style="float:left;font-size:25px;cursor:pointer;" onclick="openSideBar()">&#9776;</a>
    <h1>ACTOR</h1>
</div>
<button class="collapsible">Menu</button>
<div class="contentmenu">
    <button class="collapsible">Insert</button>
        <div class="content">
            <form method="post">
                <label>Actor ID</label><br>
                <input type="number" id="ins_actor_id" name="ins_actor_id" value="" min="0"><br>
                <label>First Name</label><br>
                <input type="text" id="ins_actor_fname" name="ins_actor_fname" value="" maxlength="30"><br>
                <label>Last Name</label><br>
                <input type="text" id="ins_actor_lname" name="ins_actor_lname" value="" maxlength="30"><br>
                <input type="submit" name="insert" value="Insert"><br>
            </form>
        </div>
    <button class="collapsible">Update</button>
        <div class="content">
            <form method="post">
                <label>Old Actor ID</label><br>
                <input type="number" id="upd_old_actor_id" name="upd_old_actor_id" value="" min="0"><br>
                <label>New Actor ID</label><br>
                <input type="number" id="upd_actor_id" name="upd_actor_id" value="" min="0"><br>
                <label>First Name</label><br>
                <input type="text" id="upd_actor_fname" name="upd_actor_fname" value="" maxlength="30"><br>
                <label>Last Name</label><br>
                <input type="text" id="upd_actor_lname" name="upd_actor_lname" value="" maxlength="30"><br>
                <input type="submit" name="update" value="Update"><br>
            </form>
        </div>
    <button class="collapsible">Delete</button>
        <div class="content">
            <form method="post">
                <label>Actor ID</label>
                <input type="number" id="dlt_actor_id" name="dlt_actor_id" value="" min="0"><br>
                <input type="submit" name="delete" value="Delete"><br>
            </form>
        </div>
    <button class="collapsible">Search By Actor ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter actor ID..">
                <input type="submit" name="searchID" value="Search">
            </form>
        </div>
    <button class="collapsible">Search By Actor Name</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="text" name="searchValue" placeholder="Enter actor's first or last name..">
                <input type="submit" name="searchName" value="Search">
            </form>
        </div>
</div>
<script src="sakilascript.js"></script>
<div class="tableWrap">
<?php
$con = mysqli_connect("localhost","root","","sakila");

mysqli_set_charset($con,"utf8");

if (!$con){
    die("Connection failed: " . mysqli_connect_error);
    exit();
}

echo"<table style='width:100%'>
<tr>
<th>Actor ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Last Update</th>";

if(isset($_POST["searchName"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM actor WHERE (first_name LIKE '%$searchvalue%' OR last_name LIKE '%$searchvalue%')" ;
    
} else if(isset($_POST["searchID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM actor WHERE actor_id = $searchvalue" ;
    
} else {
    $sql = "SELECT * FROM actor";
}
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    echo"<tr>";
    echo"<td>".$row['actor_id']."</td>";
    echo"<td>".$row['first_name']."</td>";
    echo"<td>".$row['last_name']."</td>";
    echo"<td>".$row['last_update']."</td>";
}


if(isset($_POST["dlt_actor_id"])){
$sql_delete = "DELETE FROM actor WHERE actor_id=" . $_POST["dlt_actor_id"];
    mysqli_query($con, $sql_delete);
    echo '<script type="text/javascript">';
    echo 'alert("You have deleted the data");';
    echo 'window.location="actor.php";';
    echo '</script>';
}

if(isset($_POST["ins_actor_id"])){
    $sql_insert = "INSERT INTO actor (actor_id, first_name, last_name, last_update) VALUES (" 
              . $_POST["ins_actor_id"] . ", '" 
              . $_POST["ins_actor_fname"] . "', '"
              . $_POST["ins_actor_lname"] . "', NOW())";
    mysqli_query($con, $sql_insert);
    echo '<script type="text/javascript">';
    echo 'alert("You have inserted the data");';
    echo 'window.location="actor.php";';
    echo '</script>';
}

if(isset($_POST["upd_actor_id"])){
    $sql_update = "UPDATE actor SET actor_id=" . $_POST["upd_actor_id"] 
                  . ", first_name='" . $_POST["upd_actor_fname"]
                  . "', last_name='" . $_POST["upd_actor_lname"]
                  . "', last_update=NOW() WHERE actor_id=" . $_POST["upd_old_actor_id"];
    mysqli_query($con, $sql_update);
    echo '<script type="text/javascript">';
    echo 'alert("You have updated the data");';
    echo 'window.location="actor.php";';
    echo '</script>';
}
$con -> close();

?>
</div>
</body>
</html>