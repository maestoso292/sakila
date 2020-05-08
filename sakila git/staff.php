
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
    <title>Staff</title>
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
    <a class="link" href="rental.php">RENTAL</a>
    <a class="link" href="store.php">STORE</a>
</div>
<div class="header">
    <a style="float:left;font-size:25px;cursor:pointer;" onclick="openSideBar()">&#9776;</a>
    <h1>STAFF</h1>
</div>
<button class="collapsible">Menu</button>
<div class="contentmenu">
    <button class="collapsible">Insert</button>
        <div class="content">
            <form method="post">
                <label>Staff ID</label><br>
                <input type="number" id="ins_staff_id" name="ins_staff_id" value="" min="0"><br>
                <label>First Name</label><br>
                <input type="text" id="ins_staff_fname" name="ins_staff_fname" value="" maxlength="30"><br>
                <label>Last Name</label><br>
                <input type="text" id="ins_staff_lname" name="ins_staff_lname" value="" maxlength="30"><br>
                <label>Address ID</label><br>
                <input type="number" id="ins_address_id" name="ins_address_id" value="" min="0"><br>
                <label>Email</label><br>
                <input type="email" id="ins_email" name="ins_email" value="" maxlength="100"><br>
                <label>Store ID</label><br>
                <input type="number" id="ins_store_id" name="ins_store_id" value="" min="0"><br>
                <label>Active</label><br>
                <input type="number" id="ins_active" name="ins_active" value="" min="0"><br>
                <label>Username</label><br>
                <input type="text" id="ins_username" name="ins_username" value="" maxlength="30"><br>
                <label>Password</label><br>
                <input type="text" id="ins_password" name="ins_password" value="" maxlength="30"><br>
                <input type="submit" name="insert" value="Insert"><br>
            </form>
        </div>
    <button class="collapsible">Update</button>
        <div class="content">
            <form method="post">
                <label>Old Staff ID</label><br>
                <input type="number" id="upd_old_staff_id" name="upd_old_staff_id" value="" min="0"><br>
                <label>New Staff ID</label><br>
                <input type="number" id="upd_staff_id" name="upd_staff_id" value="" min="0"><br>
                <label>First Name</label><br>
                <input type="text" id="upd_staff_fname" name="upd_staff_fname" value="" maxlength="30"><br>
                <label>Last Name</label><br>
                <input type="text" id="upd_staff_lname" name="upd_staff_lname" value="" maxlength="30"><br>
                <label>Address ID</label><br>
                <input type="number" id="upd_address_id" name="upd_address_id" value="" min="0"><br>
                <label>Email</label><br>
                <input type="email" id="upd_email" name="upd_email" value="" maxlength="100"><br>
                <label>Store ID</label><br>
                <input type="number" id="upd_store_id" name="upd_store_id" value="" min="0"><br>
                <label>Active</label><br>
                <input type="number" id="upd_active" name="upd_active" value="" min="0"><br>
                <label>Username</label><br>
                <input type="text" id="upd_username" name="upd_username" value="" maxlength="30"><br>
                <label>Password</label><br>
                <input type="text" id="upd_password" name="upd_password" value="" maxlength="30"><br>
                <input type="submit" name="update" value="Update"><br>
            </form>
        </div>
    <button class="collapsible">Delete</button>
        <div class="content">
            <form method="post">
                <label>Staff ID</label>
                <input type="number" id="dlt_staff_id" name="dlt_staff_id" value="" min="0"><br>
                <input type="submit" name="delete" value="Delete"><br>
            </form>
        </div>
    <button class="collapsible">Search By Staff Name</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="text" name="searchValue" min="0" placeholder="Enter staff name..">
                <input type="submit" name="searchStaffName" value="Search">
            </form>
        </div>
    <button class="collapsible">Search By Staff ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter staff ID..">
                <input type="submit" name="searchStaffID" value="Search">
            </form>
        </div>
    <button class="collapsible">Search By Address ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter address ID..">
                <input type="submit" name="searchAddressID" value="Search">
            </form>
        </div>
    <button class="collapsible">Search By Store ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter store ID..">
                <input type="submit" name="searchStoreID" value="Search">
            </form>
        </div>
    
</div>

<script src="sakilascript.js"></script>

<div class="tableWrap">          
<table id = "staff table">
<tr>
<th>Staff ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Address ID</th>
<th>Picture</th>
<th>Email</th>
<th>Store ID</th>
<th>Active</th>
<th>Username</th>
<th>Password</th>
<th>Last Update</th>

</tr>

<?php
if(isset($_POST["searchStaffName"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM staff WHERE (first_name LIKE '%$searchvalue%' OR last_name LIKE '%$searchvalue%')" ;
    
} else if(isset($_POST["searchStaffID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM staff WHERE staff_id = $searchvalue" ;
} else if(isset($_POST["searchAddressID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM staff WHERE address_id = $searchvalue" ;
} else if(isset($_POST["searchStoreID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM staff WHERE store_id = $searchvalue" ;
} else {
    $sql = "SELECT * FROM staff";
}
$result = $con->query($sql);
if($result -> num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
       echo"<tr>";
       echo"<td>" .$row['staff_id']. "</td>";
       echo"<td>" .$row['first_name']. "</td>";
       echo"<td>" .$row['last_name']. "</td>"; 
       echo"<td>" .$row['address_id']. "</td>";
       echo"<td>" .$row['picture']. "</td>"; 
       echo"<td>" .$row['email']. "</td>"; 
       echo"<td>" .$row['store_id']. "</td>"; 
       echo"<td>" .$row['active']. "</td>";
       echo"<td>" .$row['username']. "</td>";
       echo"<td>" .$row['password']. "</td>"; 
       echo"<td>" .$row['last_update']. "</td>"; 
       echo"</tr>";   
    }
}
if(isset($_POST["dlt_staff_id"])){
$sql_delete = "DELETE FROM staff WHERE staff_id=" . $_POST["dlt_staff_id"];
    mysqli_query($con, $sql_delete);
    echo '<script type="text/javascript">';
    echo 'alert("You have deleted the data");';
    echo 'window.location="staff.php";';
    echo '</script>';
}

if(isset($_POST["ins_staff_id"])){
    $sql_insert = "INSERT INTO staff (staff_id, first_name, last_name, address_id, picture, email, store_id, active, username, password, last_update) VALUES (" 
              . $_POST["ins_staff_id"] . ", '" 
              . $_POST["ins_staff_fname"] . "', '"
              . $_POST["ins_staff_lname"] . "', "
              . $_POST["ins_address_id"] . ", NULL, '"
              . $_POST["ins_email"] . "', "
              . $_POST["ins_store_id"] . ", "
              . $_POST["ins_active"] . ", '"
              . $_POST["ins_username"] . "', '"
              . $_POST["ins_password"] . "', NOW())";
    mysqli_query($con, $sql_insert);
    echo '<script type="text/javascript">';
    echo 'alert("You have inserted the data");';
    echo 'window.location="staff.php";';
    echo '</script>';
}

if(isset($_POST["upd_staff_id"])){
    $sql_update = "UPDATE staff SET staff_id=" . $_POST["upd_staff_id"] 
                  . ", first_name='" . $_POST["upd_staff_fname"]
                  . "', last_name='" . $_POST["upd_staff_lname"]
                  . "', address_id=" . $_POST["upd_address_id"]
                  . ", picture= NULL"
                  . ", email='" . $_POST["upd_email"]
                  . "', store_id=" . $_POST["upd_store_id"]
                  . ", active=" . $_POST["upd_active"]
                  . ", username='" . $_POST["upd_username"]
                  . "', password='" . $POST["upd_password"]
                  . "', last_update=NOW() WHERE staff_id=" . $_POST["upd_old_staff_id"];
    mysqli_query($con, $sql_update);
    echo '<script type="text/javascript">';
    echo 'alert("You have updated the data");';
    echo 'window.location="staff.php";';
    echo '</script>';
}

$con -> close();
?>
</table id = "staff table">                  
</div>
</body>
</html>