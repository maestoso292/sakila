
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
    <h1>ADDRESS</h1>
</div>
<button class="collapsible">Menu</button>
<div class="contentmenu"> 
    <button class="collapsible">Insert</button>
        <div class="content">
            <form method="post">
                <label>Address ID</label><br>
                <input type="text" id="ins_address_id" name="ins_address_id" value="" min="0"><br>
                <label>Address</label><br>
                <input type="text" id="ins_address" name="ins_address" value="" min="0"><br>
                <label>Address2</label><br>
                <input type="text" id="ins_address2" name="ins_address2" value="" min="0"><br>
                <label>District</label><br>
                <input type="text" id="ins_district" name="ins_district" value="" min="0"><br>
                <label>City ID</label><br>
                <input type="number" id="ins_city_id" name="ins_city_id" value="" min="0"><br>
                <label>Postal Code</label><br>
                <input type="number" id="ins_postal_code" name="ins_postal_code" value="" min="0"><br>
                <label>Phone</label><br>
                <input type="number" id="ins_phone" name="ins_phone" value="" min="0"><br>
                <input type="submit" name="insert" value="Insert"><br>
            </form>
    
        </div>

    <button class="collapsible">Update</button>
        <div class="content">
            <form method="post">
                <label>Old Address ID</label><br>
                <input type="number" id="upd_old_address_id" name="upd_old_address_id" value="" min="0"><br>
                <label>New Address ID</label><br>
                <input type="number" id="upd_address_id" name="upd_address_id" value="" min="0"><br>
                <label>Address</label><br>
                <input type="text" id="upd_address" name="upd_address" value="" min="0"><br>
                <label>Address2</label>
                <input type="text" id="upd_address2" name="upd_address2" value="" min="0"><br>
                <label>District</label><br>
                <input type="text" id="upd_district" name="upd_district" value="" min="0"><br>
                <label>City ID</label>
                <input type="number" id="upd_city_id" name="upd_city_id" value="" min="0"><br>
                <label>Postal Code</label><br>
                <input type="number" id="upd_postal_code" name="upd_postal_code" value="" min="0"><br>
                <label>Phone</label><br>
                <input type="number" id="upd_phone" name="upd_phone" value="" min="0"><br>
                <input type="submit" name="update" value="Update"><br>
            </form>
        </div>
    <button class="collapsible">Delete</button>
        <div class="content">
            <form method="post">
                <label>Address ID</label><br>
                <input type="number" id="dlt_address_id" name="dlt_address_id" value="" min="0"><br>
                <input type="submit" name="delete" value="Delete"><br>
            </form>
        </div>
    <button class="collapsible">Search by Address ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter address ID..">
                <input type="submit" name="searchID" value="Search">
            </form>
        </div>
    <button class="collapsible">Search by Address Name</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="text" name="searchValue" placeholder="Enter address or district name..">
                <input type="submit" name="searchName" value="Search">
            </form>
        </div>
</div>
        


<script src="sakilascript.js"></script>         

<div class="tableWrap">

<table id = "address_table" style = "display : inline-block;">
<tr>
<th>Adress_Id</th>
<th>Adress</th>
<th>Adress2</th>
<th>district</th>
<th>city_id</th>
<th>postal_code</th>
<th>phone</th>
<th>last_update</th>
</tr>


<?php
if(isset($_POST["searchName"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM address WHERE (address LIKE '%$searchvalue%' OR address2 LIKE '%$searchvalue%' OR district LIKE '%$searchvalue%')" ;
    
} else if(isset($_POST["searchID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM address WHERE address_id = $searchvalue" ;
    
} else {
    $sql = "SELECT * FROM address";
}
$result = $connect->query($sql);
if($result -> num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
       echo"<tr>";
       echo"<td>" .$row['address_id']. "</td>";
       echo"<td>" .$row['address']. "</td>";
       echo"<td>" .$row['address2']. "</td>";
       echo"<td>" .$row['district']. "</td>";
       echo"<td>" .$row['city_id']. "</td>";
       echo"<td>" .$row['postal_code']. "</td>";
       echo"<td>" .$row['phone']. "</td>";
       echo"<td>" .$row['last_update']. "</td>";      
       echo"</tr>";   
    }
}

if(isset($_POST["ins_address_id"])){
    $sql_insert = "INSERT INTO address (address_id, address, address2,district,city_id,postal_code,phone,last_update) VALUES (" 
              . $_POST["ins_address_id"] . ", '" 
              . $_POST["ins_address"] . "', '" 
              . $_POST["ins_address2"] . "', '" 
              . $_POST["ins_district"] . "', " 
              . $_POST["ins_city_id"] . ", " 
              . $_POST["ins_postal_code"] . ", " 
              . $_POST["ins_phone"] . ", NOW())";
              
              
    mysqli_query($connect, $sql_insert);
    echo '<script type="text/javascript">';
    echo 'alert("You have inserted the data");';
    echo 'window.location="address.php";';
    echo '</script>'; 
    
}

if(isset($_POST["upd_address_id"])){
    $sql_update = "UPDATE address SET address_id=" . $_POST["upd_address_id"] 
                  . ", address='" . $_POST["upd_address"]
                  . "', address2='" . $_POST["upd_address2"]
                  . "', district='" . $_POST["upd_district"]
                  . "', city_id=" . $_POST["upd_city_id"]
                  . ", postal_code=" . $_POST["upd_postal_code"]
                  . ", phone=" . $_POST["upd_phone"]
                  . ", last_update=NOW() WHERE address_id=" . $_POST["upd_old_address_id"];


    mysqli_query($connect, $sql_update);
    echo '<script type="text/javascript">';
    echo 'alert("You have updated the data");';
    echo 'window.location="address.php";';
    echo '</script>';
    
}

if(isset($_POST["dlt_address_id"])){
    $sql_delete = "DELETE FROM address WHERE address_id=" . $_POST["dlt_address_id"];

        mysqli_query($connect, $sql_delete);
        echo '<script type="text/javascript">';
        echo 'alert("You have deleted the data");';
        echo 'window.location="address.php";';
        echo '</script>';
        
    }

$connect -> close();
?>
</table id = "address_table">                  

</body>
</html>