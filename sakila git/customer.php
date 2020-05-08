
<?php

$connect = mysqli_connect("localhost", "root", "","sakila");

if($connect  == false){
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
    <h1>CUSTOMER</h1>
</div>
<button class="collapsible">Menu</button>
<div class="contentmenu">
    <button class="collapsible">Insert</button>
        <div class="content">
            <form method="post">
                <label>New Customer ID </label><br>
                <input type="number" id="ins_customer_id" name="ins_customer_id" value="" min="0"><br>
                <label>Store ID</label><br>
                <input type="number" id="ins_store_id" name="ins_store_id" value="" min="0"><br>
                <label>First Name</label><br>
                <input type="text" id="ins_first_name" name="ins_first_name" value="" min="0"><br>
                <label>Last Name</label><br>
                <input type="text" id="ins_last_name" name="ins_last_name" value="" min="0"><br>
                <label>Email</label><br>
                <input type="text" id="ins_email" name="ins_email" value="" min="0"><br>
                <label>Address ID</label><br>
                <input type="number" id="ins_address_id" name="ins_address_id" value="" min="0"><br>
                <label>Active</label><br>
                <input type="number" id="ins_active" name="ins_active" value="" min="0"><br>
                
                <input type="submit" name="insert" value="Insert"><br>
            </form>
        </div>
    <button class="collapsible">Update</button>
        <div class="content">
            <form method="post">
            <label>Old Customer ID</label><br>
                <input type="number" id="upd_old_customer_id" name="upd_old_customer_id" value="" min="0"><br>
            <label>New Customer ID </label><br>
                <input type="number" id="upd_customer_id" name="upd_customer_id" value="" min="0"><br>
                <label>Store ID</label><br>
                <input type="number" id="upd_store_id" name="upd_store_id" value="" min="0"><br>
                <label>First Name</label><br>
                <input type="text" id="upd_first_name" name="upd_first_name" value="" min="0"><br>
                <label>Last Name</label><br>
                <input type="text" id="upd_last_name" name="upd_last_name" value="" min="0"><br>
                <label>Email</label><br>
                <input type="text" id="upd_email" name="upd_email" value="" min="0"><br>
                <label>Address ID</label><br>
                <input type="number" id="upd_address_id" name="upd_address_id" value="" min="0"><br>
                <label>Active</label><br>
                <input type="number" id="upd_active" name="upd_active" value="" min="0"><br>
                
                <input type="submit" name="update" value="Update"><br>
            </form>
        </div>
    <button class="collapsible">Delete</button>
        <div class="content">
            <form method="post">
                <label>Customer ID</label>
                <input type="number" id="dlt_customer_id" name="dlt_customer_id" value="" min="0"><br>
                <input type="submit" name="delete" value="Delete"><br>
            </form>
        </div>
    <button class="collapsible">Search By Customer ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter customer ID..">
                <input type="submit" name="searchID" value="Search">
            </form>
        </div>
    <button class="collapsible">Search By Customer Name</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="text" name="searchValue" placeholder="Enter customer's first or last name..">
                <input type="submit" name="searchName" value="Search">
            </form>
        </div>
</div>
        


<script src="sakilascript.js"></script>         

<div class="tableWrap">

<table id = "customer_table">

<tr>
<th>Customer ID</th>
<th>Store ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Address ID</th>
<th>Active</th>
<th>Create Date</th>
<th>Last Update</th>
</tr>

<?php
if(isset($_POST["searchName"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM customer WHERE (first_name LIKE '%$searchvalue%' OR last_name LIKE '%$searchvalue%')" ;
    
} else if(isset($_POST["searchID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM customer WHERE customer_id = $searchvalue" ;
    
} else {
    $sql = "SELECT * FROM customer";
}
$result = $connect->query($sql);
if($result -> num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
       echo"<tr>";
       echo"<td>" .$row['customer_id']. "</td>";
       echo"<td>" .$row['store_id']. "</td>";
       echo"<td>" .$row['first_name']. "</td>"; 
       echo"<td>" .$row['last_name']. "</td>"; 
       echo"<td>" .$row['email']. "</td>"; 
       echo"<td>" .$row['address_id']. "</td>"; 
       echo"<td>" .$row['active']. "</td>"; 
       echo"<td>" .$row['create_date']. "</td>"; 
       echo"<td>" .$row['last_update']. "</td>"; 
       echo"</tr>";   
    }
}
if(isset($_POST["ins_customer_id"])){
    $sql_insert = "INSERT INTO customer (customer_id, store_id,first_name,last_name,email,address_id,active,create_date,last_update) VALUES (" 
              . $_POST["ins_customer_id"] . ", " 
              . $_POST["ins_store_id"] . ", '" 
              . $_POST["ins_first_name"] . "', '" 
              . $_POST["ins_last_name"] . "', '" 
              . $_POST["ins_email"] . "', " 
              . $_POST["ins_address_id"] . ", " 
              . $_POST["ins_active"] . ", NOW() , NOW())";
              
            
    mysqli_query($connect, $sql_insert);
    echo '<script type="text/javascript">';
    echo 'alert("You have inserted the data");';
    echo 'window.location="customer.php";';
    echo '</script>'; 
    
}

if(isset($_POST["upd_customer_id"])){
    $sql_update = "UPDATE customer SET customer_id=" . $_POST["upd_customer_id"] 
                  . ", store_id='" . $_POST["upd_store_id"]
                  . "', first_name='" . $_POST["upd_first_name"]
                  . "', last_name='" . $_POST["upd_last_name"]
                  . "', email='" . $_POST["upd_email"]
                  . "', address_id=" . $_POST["upd_address_id"]
                  . ", active=" . $_POST["upd_active"]                 
                .", last_update=NOW() WHERE customer_id=" . $_POST["upd_old_customer_id"];


    mysqli_query($connect, $sql_update);
    echo '<script type="text/javascript">';
    echo 'alert("You have updated the data");';
    echo 'window.location="customer.php";';
    echo '</script>';
    
}

if(isset($_POST["dlt_customer_id"])){
    $sql_delete = "DELETE FROM customer WHERE customer_id=" . $_POST["dlt_customer_id"];

        mysqli_query($connect, $sql_delete);
        echo '<script type="text/javascript">';
        echo 'alert("You have deleted the data");';
        echo 'window.location="customer.php";';
        echo '</script>';
        
    }

$connect -> close();
?>
</table id = "customer_table">                  

</body>
</html>