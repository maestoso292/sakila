
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
    <a class="link" href="inventory.php">INVENTORY</a>
    <a class="link" href="language.php">LANGUAGE</a>
    <a class="link" href="rental.php">RENTAL</a>
    <a class="link" href="staff.php">STAFF</a>
    <a class="link" href="store.php">STORE</a>
</div>
<div class="header">
    <a style="float:left;font-size:25px;cursor:pointer;" onclick="openSideBar()">&#9776;</a>
    <h1>PAYMENT</h1>
</div>
<button class="collapsible">Menu</button>
<div class="contentmenu">
    <button class="collapsible">Insert</button>
        <div class="content">
            <form method="post">
                <label>Payment ID</label><br>
                <input type="number" id="ins_payment_id" name="ins_payment_id" value="" min="0"><br>
                <label>Customer ID</label><br>
                <input type="number" id="ins_customer_id" name="ins_customer_id" value="" min="0"><br>
                <label>Staff ID</label><br>
                <input type="number" id="ins_staff_id" name="ins_staff_id" value="" min="0"><br>
                <label>Rental ID</label><br>
                <input type="number" id="ins_rental_id" name="ins_rental_id" value="" min="0"><br>
                <label>Amount</label><br>
                <input type="number" id="ins_amount" name="ins_amount" value="" min="0" step="0.01"><br>
                <label>Payment Date(YYYY-MM-DD HH:mm:ss)</label><br>
                <input type="text" id="ins_payment_date" name="ins_payment_date" value="" maxlength="19"><br>
                <input type="submit" name="insert" value="Insert"><br>
            </form>
        </div>
    <button class="collapsible">Update</button>
        <div class="content">
            <form method="post">
                <label>Old Payment ID</label><br>
                <input type="number" id="upd_old_payment_id" name="upd_old_payment_id" value="" min="0"><br>
                <label>New Payment ID</label><br>
                <input type="number" id="upd_payment_id" name="upd_payment_id" value="" min="0"><br>
                <label>Customer ID</label><br>
                <input type="number" id="upd_customer_id" name="upd_customer_id" value="" min="0"><br>
                <label>Staff ID</label><br>
                <input type="number" id="upd_staff_id" name="upd_staff_id" value="" min="0"><br>
                <label>Rental ID</label><br>
                <input type="number" id="upd_rental_id" name="upd_rental_id" value="" min="0"><br>
                <label>Amount</label><br>
                <input type="number" id="upd_amount" name="upd_amount" value="" min="0" step="0.01"><br>
                <label>Payment Date(YYYY-MM-DD HH:mm:ss)</label><br>
                <input type="text" id="upd_payment_date" name="upd_payment_date" value="" maxlength="19"><br>
                <input type="submit" name="update" value="Update"><br>
            </form>
        </div>
    <button class="collapsible">Delete</button>
        <div class="content">
            <form method="post">
                <label>Payment ID:</label>
                <input type="number" id="dlt_payment_id" name="dlt_payment_id" value="" min="0"><br>
                <input type="submit" name="delete" value="Delete"><br>
            </form>
        </div>
    <button class="collapsible">Search By Payment ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter payment ID..">
                <input type="submit" name="searchPaymentID" value="Search">
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
    <button class="collapsible">Search By Rental ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter rental ID..">
                <input type="submit" name="searchRentalID" value="Search">
            </form>
        </div>
</div>

<script src="sakilascript.js"></script>

<div class="tableWrap">
<table id = "payment table">
<tr>
<th>Payment ID</th>
<th>Customer ID</th>
<th>Staff ID</th>
<th>Rental ID</th>
<th>Amount</th>
<th>Payment Date</th>
<th>Last Update</th>

</tr>

<?php
if(isset($_POST["searchPaymentID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM payment WHERE payment_id = $searchvalue LIMIT 500";
} else if(isset($_POST["searchCustomerID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM payment WHERE customer_id = $searchvalue LIMIT 500" ;
} else if(isset($_POST["searchRentalID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM payment WHERE rental_id = $searchvalue LIMIT 500" ;
} else if(isset($_POST["searchStaffID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM payment WHERE staff_id = $searchvalue LIMIT 500" ;
} else {
    $sql = "SELECT * FROM payment LIMIT 500";
}
$result = $con->query($sql);
if($result -> num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
       echo"<tr>";
       echo"<td>" .$row['payment_id']. "</td>";
       echo"<td>" .$row['customer_id']. "</td>";
       echo"<td>" .$row['staff_id']. "</td>"; 
       echo"<td>" .$row['rental_id']. "</td>";
       echo"<td>" .$row['amount']. "</td>";
       echo"<td>" .$row['payment_date']. "</td>"; 
       echo"<td>" .$row['last_update']. "</td>"; 
       echo"</tr>";   
    }
}
if(isset($_POST["dlt_payment_id"])){
$sql_delete = "DELETE FROM payment WHERE payment_id=" . $_POST["dlt_payment_id"];
    mysqli_query($con, $sql_delete);
    echo '<script type="text/javascript">';
    echo 'alert("You have deleted the data");';
    echo 'window.location="payment.php";';
    echo '</script>';
}

if(isset($_POST["ins_payment_id"])){
    $sql_insert = "INSERT INTO payment (payment_id, customer_id, staff_id, rental_id, amount, payment_date, last_update) VALUES (" 
              . $_POST["ins_payment_id"] . ", "
              . $_POST["ins_customer_id"] . ", "
              . $_POST["ins_staff_id"] . ", "
              . $_POST["ins_rental_id"] . ", "
              . $_POST["ins_amount"] . ", '"
              . $_POST["ins_payment_date"] . "', NOW())";
    mysqli_query($con, $sql_insert);
    echo '<script type="text/javascript">';
    echo 'alert("You have inserted the data");';
    echo 'window.location="payment.php";';
    echo '</script>';
}

if(isset($_POST["upd_payment_id"])){
    $sql_update = "UPDATE payment SET payment_id=" . $_POST["upd_payment_id"]
                  . ", customer_id=" . $_POST["upd_customer_id"]
                  . ", staff_id=" . $_POST["upd_staff_id"]
                  . ", rental_id=" . $_POST["upd_rental_id"]
                  . ", amount=" . $_POST["upd_amount"]
                  . ", payment_date='" . $_POST["upd_payment_date"]
                  . "', last_update=NOW() WHERE payment_id=" . $_POST["upd_old_payment_id"];
    mysqli_query($con, $sql_update);
    echo '<script type="text/javascript">';
    echo 'alert("You have updated the data");';
    echo 'window.location="payment.php";';
    echo '</script>';
}
?>
</table>                  
</div>
</body>
</html>