
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
    <title>City table</title>

    
</head>
<body>
<div id="mySideBar" class="sidebar">
    <a class="link" href="./" style="font-weight:bold;font-size:30px">MAIN PAGE</a>
    <a href="javascript:void(0)" class="close link" onclick="closeSideBar()">&times;</a> 
    <a style="font-weight:bold;font-size:30px">TABLES</a>
    <a class="link" href="actor.php">ACTOR</a>
    <a class="link" href="address.php">ADDRESS</a>
    <a class="link" href="category.php">CATEGORY</a>
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
    <a style="float:left;font-size:25px;pointer-events:auto;cursor:pointer;cursor:hand" onclick="openSideBar()">&#9776;</a>
    <h1>CITY</h1>
</div>
<button class="collapsible">Menu</button>
<div class="contentmenu">
    <button class="collapsible">Insert</button>
        <div class="content">
            <form method="post">
                <label>City ID</label><br>
                <input type="number" id="ins_city_id" name="ins_city_id" value="" min="0"><br>
                <label>City</label><br>
                <input type="text" id="ins_city" name="ins_city" value="" min="0"><br>
                <label>Country ID</label><br>
                <input type="number" id="ins_country_id" name="ins_country_id" value="" min="0"><br>
                <input type="submit" name="insert" value="Insert"><br>
            </form>
        </div>
    <button class="collapsible">Update</button>
        <div class="content">
            <form method="post">
                <label>Old City ID</label>
                <input type="number" id="upd_old_city_id" name="upd_old_city_id" value="" min="0"><br>
                <label>New City ID</label>
                <input type="number" id="upd_city_id" name="upd_city_id" value="" min="0"><br>
                <label>City</label>
                <input type="text" id="upd_city" name="upd_city" value="" min="0"><br>
                <label>Country ID</label>
                <input type="number" id="upd_country_id" name="upd_country_id" value="" min="0"><br>
            
                <input type="submit" name="update" value="Update"><br>
            </form>
        </div>
    <button class="collapsible">Delete</button>
        <div class="content">
            <form method="post">
                <label>City ID</label>
                <input type="number" id="dlt_city_id" name="dlt_city_id" value="" min="0"><br>
                <input type="submit" name="delete" value="Delete"><br>
            </form>
        </div>
    <button class="collapsible">Search By City ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter city ID..">
                <input type="submit" name="searchID" value="Search">
            </form>
        </div>
    <button class="collapsible">Search By City Name</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="text" name="searchValue" placeholder="Enter city name..">
                <input type="submit" name="searchName" value="Search">
            </form>
        </div>
</div>
        


<script src="sakilascript.js"></script>         

<div class="tableWrap">
<table id = "city_table">
<tr>        
<th>City ID</th>
<th>City</th>
<th>Country ID</th>
<th>Last Update</th>
</tr>

<?php
if(isset($_POST["searchName"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM city WHERE city LIKE '%$searchvalue%'" ;
    
} else if(isset($_POST["searchID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM city WHERE city_id = $searchvalue" ;
    
} else {
    $sql = "SELECT * FROM city";
}
$result = $connect->query($sql);
if($result -> num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
       echo"<tr>";
       echo"<td>" .$row['city_id']. "</td>";
       echo"<td>" .$row['city']. "</td>";
       echo"<td>" .$row['country_id']. "</td>"; 
       echo"<td>" .$row['last_update']. "</td>"; 
       echo"</tr>";   
    }
}
if(isset($_POST["dlt_city_id"])){
    $sql_delete = "DELETE FROM city WHERE city_id=" . $_POST["dlt_city_id"];
        mysqli_query($connect, $sql_delete);
        echo '<script type="text/javascript">';
        echo 'alert("You have deleted the data");';
        echo 'window.location="city.php";';
        echo '</script>';
    }
    
    if(isset($_POST["ins_city_id"])){
        $sql_insert = "INSERT INTO city (city_id, city, country_id, last_update) VALUES (" 
                  . $_POST["ins_city_id"] . ", '" 
                  . $_POST["ins_city"] . "', " 
                  . $_POST["ins_country_id"] . ", NOW())";
        mysqli_query($connect, $sql_insert);
        echo '<script type="text/javascript">';
        echo 'alert("You have inserted the data");';
        echo 'window.location="city.php";';
        echo '</script>';
    }
    
    if(isset($_POST["upd_city_id"])){
        $sql_update = "UPDATE city SET city_id=" . $_POST["upd_city_id"] 
                      . ", city='" . $_POST["upd_city"]
                      . "', country_id=" . $_POST["upd_country_id"]
                      . ", last_update=NOW() WHERE city_id=" . $_POST["upd_old_city_id"];
                      echo($sql_update);
                     
        mysqli_query($connect, $sql_update);
        echo '<script type="text/javascript">';
        echo 'alert("You have updated the data");';
        echo 'window.location="city.php";';
        echo '</script>';
        
    }
    $connect -> close();
?>
</table id = "city_table">                    <!--End of CITY tabulation  code-->
</div>
</body>
</html>