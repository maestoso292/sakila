
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
    <a class="link" href="./" style="font-weight:bold;font-size:30px">MAIN PAGE</a>
    <a href="javascript:void(0)" class="close link" onclick="closeSideBar()">&times;</a> 
    <a style="font-weight:bold;font-size:30px">TABLES</a>
    <a class="link" href="actor.php">ACTOR</a>
    <a class="link" href="address.php">ADDRESS</a>
    <a class="link" href="category.php">CATEGORY</a>
    <a class="link" href="city.php">CITY</a>
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
    <a style="float:left;font-size:25px;pointer-events:auto;cursor:pointer;cursor:hand" onclick="openSideBar()">&#9776;</a>
    <h1>COUNTRY</h1>
</div>
<button class="collapsible">Menu</button>
<div class="contentmenu">
    <button class="collapsible">Insert</button>
        <div class="content">
            <form method="post">
                <label>Country ID</label><br>
                <input type="number" id="ins_country_id" name="ins_country_id" value="" min="0"><br>
                <label>Country</label><br>
                <input type="text" id="ins_country" name="ins_country" value="" min="0"><br>
                <input type="submit" name="insert" value="Insert"><br>
            </form>
    
        </div>

    <button class="collapsible">Update</button>
        <div class="content">
            <form method="post">
                <label>Old Country ID</label>
                <input type="number" id="upd_old_country_id" name="upd_old_country_id" value="" min="0"><br>
                <label>New Country ID</label>
                <input type="number" id="upd_country_id" name="upd_country_id" value="" min="0"><br>
                <label>Country</label>
                <input type="text" id="upd_country" name="upd_country" value="" min="0"><br>
                <input type="submit" name="update" value="Update"><br>
            </form>
        </div>
    <button class="collapsible">Delete</button>
        <div class="content">
            <form method="post">
                <label>Country ID</label>
                <input type="number" id="dlt_country_id" name="dlt_country_id" value="" min="0"><br>
                <input type="submit" name="delete" value="Delete"><br>
            </form>
        </div>
    <button class="collapsible">Search By Country ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter country ID..">
                <input type="submit" name="searchID" value="Search">
            </form>
        </div>
    <button class="collapsible">Search By Country Name</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="text" name="searchValue" placeholder="Enter country name..">
                <input type="submit" name="searchName" value="Search">
            </form>
        </div>
</div>
        


<script src="sakilascript.js"></script>         

<div class="tableWrap">
<table id = "country_table">

<tr>
<th>Country ID</th>
<th>Country</th>
<th>Last Update</th>
</tr>

<?php
if(isset($_POST["searchName"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM country WHERE country LIKE '%$searchvalue%'";
    
} else if(isset($_POST["searchID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM country WHERE country_id = $searchvalue" ;
    
} else {
    $sql = "SELECT * FROM country";
}
$result = $connect->query($sql);
if($result -> num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
       echo"<tr>";
       echo"<td>" .$row['country_id']. "</td>";
       echo"<td>" .$row['country']. "</td>";
       echo"<td>" .$row['last_update']. "</td>"; 
       echo"</tr>";   
    }
}
if(isset($_POST["dlt_country_id"])){
    $sql_delete = "DELETE FROM country WHERE country_id=" . $_POST["dlt_country_id"];
        mysqli_query($connect, $sql_delete);
        echo '<script type="text/javascript">';
        echo 'alert("You have deleted the data");';
        echo 'window.location="country.php";';
        echo '</script>';
    }
    
    if(isset($_POST["ins_country_id"])){
        $sql_insert = "INSERT INTO country (country_id, country, last_update) VALUES (" 
                  . $_POST["ins_country_id"] . ", '" 
                  . $_POST["ins_country"] . "', NOW())";
        mysqli_query($connect, $sql_insert);
        echo '<script type="text/javascript">';
        echo 'alert("You have inserted the data");';
        echo 'window.location="country.php";';
        echo '</script>';
    }
    
    if(isset($_POST["upd_country_id"])){
        $sql_update = "UPDATE country SET country_id=" . $_POST["upd_country_id"] 
                      . ", country='" . $_POST["upd_country"]
                      . "', last_update=NOW() WHERE country_id=" . $_POST["upd_old_country_id"];
                      echo($sql_update);
                     
        mysqli_query($connect, $sql_update);
        echo '<script type="text/javascript">';
        echo 'alert("You have updated the data");';
        echo 'window.location="country.php";';
        echo '</script>';
        
    }
    $connect -> close();
?>
</table>                  
</div>
</body>
</html>