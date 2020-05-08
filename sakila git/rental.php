
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
    <title>Rental</title>
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
    <a class="link" href="inventory.php">INVENTORY</a>
    <a class="link" href="language.php">LANGUAGE</a>
    <a class="link" href="payment.php">PAYMENT</a>
    <a class="link" href="staff.php">STAFF</a>
    <a class="link" href="store.php">STORE</a>
</div>
<div class="header">
    <a style="float:left;font-size:25px;cursor:pointer;" onclick="openSideBar()">&#9776;</a>
    <h1>RENTAL</h1>
</div>
<button class="collapsible">Menu</button>
<div class="contentmenu">
    <button class="collapsible">Insert</button>
        <div class="content">
            <form method="post">
                <label>Old Rental ID</label><br>
                <input type="number" id="ins_rental_id" name="ins_rental_id" value="" min="0"><br>
                <label>Rental Date(YYYY-MM-DD HH:mm:ss)</label><br>
                <input type="text" id="ins_rental_date" name="ins_rental_date" value="" maxlength="19"><br>
                <label>Inventory ID</label><br>
                <input type="number" id="ins_inventory_id" name="ins_inventory_id" value="" min="0"><br>
                <label>Customer ID</label><br>
                <input type="number" id="ins_customer_id" name="ins_customer_id" value="" min="0"><br>
                <label>Return Date(YYYY-MM-DD HH:mm:ss)</label><br>
                <input type="text" id="ins_return_date" name="ins_return_date" value="" maxlength="19"><br>
                <label>Staff ID:</label><br>
                <input type="number" id="ins_staff_id" name="ins_staff_id" value="" min="0"><br>
                <input type="submit" name="insert" value="Insert"><br>
            </form>
        </div>
    <button class="collapsible">Update</button>
        <div class="content">
            <form method="post">
                <label>Old Rental ID:</label><br>
                <input type="number" id="upd_old_rental_id" name="upd_old_rental_id" value="" min="0"><br>
                <label>New Rental ID:</label><br>
                <input type="number" id="upd_rental_id" name="upd_rental_id" value="" min="0"><br>
                <label>Rental Date(YYYY-MM-DD HH:mm:ss)</label><br>
                <input type="text" id="upd_rental_date" name="upd_rental_date" value="" maxlength="19"><br>
                <label>Inventory ID:</label><br>
                <input type="number" id="upd_inventory_id" name="upd_inventory_id" value="" min="0"><br>
                <label>Customer ID:</label><br>
                <input type="number" id="upd_customer_id" name="upd_customer_id" value="" min="0"><br>
                <label>Return Date(YYYY-MM-DD HH:mm:ss)</label><br>
                <input type="text" id="upd_return_date" name="upd_return_date" value="" maxlength="19"><br>
                <label>Staff ID:</label><br>
                <input type="number" id="upd_staff_id" name="upd_staff_id" value="" min="0"><br>
                <input type="submit" name="update" value="Update"><br>
            </form>
        </div>
    <button class="collapsible">Delete</button>
        <div class="content">
            <form method="post">
                <label>Rental ID:</label>
                <input type="number" id="dlt_rental_id" name="dlt_rental_id" value="" min="0"><br>
                <input type="submit" name="delete" value="Delete"><br>
            </form>
        </div>
    <button class="collapsible">Search By Rental ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter rental ID..">
                <input type="submit" name="searchRentalID" value="Search">
            </form>
        </div>
    <button class="collapsible">Search By Inventory ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter inventory ID..">
                <input type="submit" name="searchInventoryID" value="Search">
            </form>
        </div>
    <button class="collapsible">Search By Customer ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter customer ID..">
                <input type="submit" name="searchCustomerID" value="Search">
            </form>
        </div>
    <button class="collapsible">Search By Staff ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter staff ID..">
                <input type="submit" name="searchStaffID" value="Search">
            </form>
        </div>
</div>

<script src="sakilascript.js"></script>

<div class="tableWrap">        
<table id = "rental table">
<tr>
<th>Rental ID</th>
<th>Rental Date</th>
<th>Inventory ID</th>
<th>Customer ID</th>
<th>Return Date</th>
<th>Staff ID</th>
<th>Last Update</th>

</tr>

<?php
if(isset($_POST["searchInventoryID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM rental WHERE inventory_id = $searchvalue LIMIT 500";
} else if(isset($_POST["searchCustomerID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM rental WHERE customer_id = $searchvalue LIMIT 500" ;
} else if(isset($_POST["searchRentalID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM rental WHERE rental_id = $searchvalue LIMIT 500" ;
} else if(isset($_POST["searchStaffID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM rental WHERE staff_id = $searchvalue LIMIT 500" ;
} else {
    $sql = "SELECT * FROM rental LIMIT 500";
}
$result = $con->query($sql);
if($result -> num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
       echo"<tr>";
       echo"<td>" .$row['rental_id']. "</td>";
       echo"<td>" .$row['rental_date']. "</td>";
       echo"<td>" .$row['inventory_id']. "</td>"; 
       echo"<td>" .$row['customer_id']. "</td>";
       echo"<td>" .$row['return_date']. "</td>";
       echo"<td>" .$row['staff_id']. "</td>"; 
       echo"<td>" .$row['last_update']. "</td>"; 
       echo"</tr>";   
    }
}
if(isset($_POST["dlt_rental_id"])){
$sql_delete = "DELETE FROM rental WHERE rental_id=" . $_POST["dlt_rental_id"];
    mysqli_query($con, $sql_delete);
    echo '<script type="text/javascript">';
    echo 'alert("You have deleted the data");';
    echo 'window.location="rental.php";';
    echo '</script>';
}

if(isset($_POST["ins_rental_id"])){
    $sql_insert = "INSERT INTO rental (rental_id, rental_date, inventory_id, customer_id, return_date, staff_id, last_update) VALUES (" 
              . $_POST["ins_rental_id"] . ", '"
              . $_POST["ins_rental_date"] . "', "
              . $_POST["ins_inventory_id"] . ", "
              . $_POST["ins_customer_id"] . ", '"
              . $_POST["ins_return_date"] . "', "
              . $_POST["ins_staff_id"] . ", NOW())";
    mysqli_query($con, $sql_insert);
    echo '<script type="text/javascript">';
    echo 'alert("You have inserted the data");';
    echo 'window.location="rental.php";';
    echo '</script>';
}

if(isset($_POST["upd_rental_id"])){
    $sql_update = "UPDATE rental SET rental_id=" . $_POST["upd_rental_id"]
                  . ", rental_date='" . $_POST["upd_rental_date"]
                  . "', inventory_id=" . $_POST["upd_inventory_id"]
                  . ", customer_id=" . $_POST["upd_customer_id"]
                  . ", return_date='" . $_POST["upd_return_date"]
                  . "', staff_id=" . $_POST["upd_staff_id"]
                  . ", last_update=NOW() WHERE rental_id=" . $_POST["upd_old_rental_id"];
    mysqli_query($con, $sql_update);
    echo '<script type="text/javascript">';
    echo 'alert("You have updated the data");';
    echo 'window.location="rental.php";';
    echo '</script>';
}

$con -> close();
?>
</table id = "rental table">                  
</div>
</body>
</html>