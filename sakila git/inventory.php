
<?php

$con = mysqli_connect("localhost:3306", "hcysa2_public", "sImc%k4sxQO)","hcysa2_sakila");

if($con  == false){
    die("ERROR: Could not connect." . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <link rel="stylesheet" type="text/css" href="sakilastyle.css">
    <title>Document</title>
</head>
<body>
<div id="mySideBar" class="sidebar">
    <a href="javascript:void(0)" class="close link" onclick="closeSideBar()">&times;</a> 
    <a class="link" href="./" style="font-weight:bold;font-size:30px">MAIN PAGE</a>
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
    <a class="link" href="language.php">LANGUAGE</a>
    <a class="link" href="payment.php">PAYMENT</a>
    <a class="link" href="rental.php">RENTAL</a>
    <a class="link" href="staff.php">STAFF</a>
    <a class="link" href="store.php">STORE</a>
</div>
<div class="header">
    <a style="float:left;font-size:25px;cursor:pointer;" onclick="openSideBar()">&#9776;</a> 
    <h1>INVENTORY</h1>
</div>
<button class="collapsible">Menu</button>
<div class="contentmenu">
    <button class="collapsible">Insert</button>
        <div class="content">
            <form method="post">
                <label>Inventory ID</label><br>
                <input type="number" id="ins_inventory_id" name="ins_inventory_id" value="" min="0"><br>
                <label>Film ID</label><br>
                <input type="number" id="ins_film_id" name="ins_film_id" value="" min="0"><br>
                <label>Store ID</label><br>
                <input type="number" id="ins_store_id" name="ins_store_id" value="" min="0"><br>
                <input type="submit" name="insert" value="Insert"><br>
            </form>
        </div>
    <button class="collapsible">Update</button>
        <div class="content">
            <form method="post">
                <label>New Inventory ID</label>
                <input type="number" id="upd_old_inventory_id" name="upd_old_inventory_id" value="" min="0"><br>
                <label>Old Inventory ID</label>
                <input type="number" id="upd_inventory_id" name="upd_inventory_id" value="" min="0"><br>
                <label>Film ID</label>
                <input type="number" id="upd_film_id" name="upd_film_id" value="" min="0"><br>
                <label>Store ID</label>
                <input type="number" id="upd_store_id" name="upd_store_id" value="" min="0"><br>
                <input type="submit" name="update" value="Update"><br>
            </form>
        </div>
    <button class="collapsible">Delete</button>
        <div class="content">
            <form method="post">
                <label>Inventory ID</label>
                <input type="number" id="dlt_inventory_id" name="dlt_inventory_id" value="" min="0"><br>
                <input type="submit" name="delete" value="Delete"><br>
            </form>
        </div>
    <button class="collapsible">Search By Inventory ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter inventory ID..">
                <input type="submit" name="searchInventoryID" value="Search">
            </form>
        </div>
    <button class="collapsible">Search By Film ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter film ID..">
                <input type="submit" name="searchFilmID" value="Search">
            </form>
        </div>
</div>

<script src="sakilascript.js"></script>

<div class="tableWrap">

<table id = "inventory table">
<tr>
<th>Inventory ID</th>
<th>Film ID</th>
<th>Store ID</th>
<th>Last Update</th>
</tr>

<?php
if(isset($_POST["searchInventoryID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM inventory WHERE inventory_id = $searchvalue";
    
} else if(isset($_POST["searchFilmID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM inventory WHERE film_id = $searchvalue" ;
    
} else {
    $sql = "SELECT * FROM inventory";
}
$result = $con->query($sql);
if($result -> num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
       echo"<tr>";
       echo"<td>" .$row['inventory_id']. "</td>";
       echo"<td>" .$row['film_id']. "</td>";
       echo"<td>" .$row['store_id']. "</td>"; 
       echo"<td>" .$row['last_update']. "</td>"; 
       echo"</tr>";   
    }
}
if(isset($_POST["dlt_inventory_id"])){
$sql_delete = "DELETE FROM inventory WHERE inventory_id=" . $_POST["dlt_inventory_id"];
    mysqli_query($con, $sql_delete);
    echo '<script type="text/javascript">';
    echo 'alert("You have deleted the data");';
    echo 'window.location="inventory.php";';
    echo '</script>';
}

if(isset($_POST["ins_inventory_id"])){
    $sql_insert = "INSERT INTO inventory (inventory_id, film_id, store_id, last_update) VALUES (" 
              . $_POST["ins_inventory_id"] . ", "
              . $_POST["ins_film_id"] . ", " 
              . $_POST["ins_store_id"] . ", NOW())";
    mysqli_query($con, $sql_insert);
    echo '<script type="text/javascript">';
    echo 'alert("You have inserted the data");';
    echo 'window.location="inventory.php";';
    echo '</script>';
}

if(isset($_POST["upd_inventory_id"])){
    $sql_update = "UPDATE inventory SET inventory_id=" . $_POST["upd_inventory_id"] 
                  . ", film_id=" . $_POST["upd_film_id"]
                  . ", store_id=" . $_POST["upd_store_id"]
                  . ", last_update=NOW() WHERE inventory_id=" . $_POST["upd_old_inventory_id"];
    mysqli_query($con, $sql_update);
    echo '<script type="text/javascript">';
    echo 'alert("You have updated the data");';
    echo 'window.location="inventory.php";';
    echo '</script>';
}

$con -> close();
?>
</table>                  
</div>
</body>
</html>