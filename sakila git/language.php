
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
    <title>Language</title>
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
    <a class="link" href="payment.php">PAYMENT</a>
    <a class="link" href="rental.php">RENTAL</a>
    <a class="link" href="staff.php">STAFF</a>
    <a class="link" href="store.php">STORE</a>
</div>
<div class="header">
    <a style="float:left;font-size:25px;cursor:pointer;" onclick="openSideBar()">&#9776;</a>
    <h1>LANGUAGE</h1>
</div>
<button class="collapsible">Menu</button>
<div class="contentmenu">
    <button class="collapsible">Insert</button>
        <div class="content">
            <form method="post">
                <label>Language ID</label><br>
                <input type="number" id="ins_language_id" name="ins_language_id" value="" min="0"><br>
                <label>Name</label><br>
                <input type="text" id="ins_language_name" name="ins_language_name" value="" maxlength="20"><br>
                <input type="submit" name="insert" value="Insert"><br>
            </form>
        </div>
    <button class="collapsible">Update</button>
        <div class="content">
            <form method="post">
                <label>Old Language ID</label>
                <input type="number" id="upd_old_language_id" name="upd_old_language_id" value="" min="0"><br>
                <label>New Language ID</label>
                <input type="number" id="upd_language_id" name="upd_language_id" value="" min="0"><br>
                <label>Name</label>
                <input type="text" id="upd_language_name" name="upd_language_name" value="" maxlength="20"><br>
                <input type="submit" name="update" value="Update"><br>
            </form>
        </div>
    <button class="collapsible">Delete</button>
        <div class="content">
            <form method="post">
                <label>Language ID</label>
                <input type="number" id="dlt_language_id" name="dlt_language_id" value="" min="0"><br>
                <input type="submit" name="delete" value="Delete"><br>
            </form>
        </div>
    <button class="collapsible">Search By Language ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter language ID..">
                <input type="submit" name="searchID" value="Search">
            </form>
        </div>
    <button class="collapsible">Search By Language Name</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="text" name="searchValue" placeholder="Enter language name..">
                <input type="submit" name="searchName" value="Search">
            </form>
        </div>
</div>

<script src="sakilascript.js"></script>

<div class="tableWrap">
<table id = "language table">
<tr>
<th>Language ID</th>
<th>Name</th>
<th>Last Update</th>
</tr>

<?php
if(isset($_POST["searchName"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM language WHERE name LIKE '%$searchvalue%'" ;
    
} else if(isset($_POST["searchID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM language WHERE language_id = $searchvalue" ;
    
} else {
    $sql = "SELECT * FROM language";
}
$result = $con->query($sql);
if($result -> num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
       echo"<tr>";
       echo"<td>" .$row['language_id']. "</td>";
       echo"<td>" .$row['name']. "</td>";
       echo"<td>" .$row['last_update']. "</td>"; 
       echo"</tr>";   
    }
}
if(isset($_POST["dlt_language_id"])){
$sql_delete = "DELETE FROM language WHERE language_id=" . $_POST["dlt_language_id"];
    mysqli_query($con, $sql_delete);
    echo '<script type="text/javascript">';
    echo 'alert("You have deleted the data");';
    echo 'window.location="language.php";';
    echo '</script>';
}

if(isset($_POST["ins_language_id"])){
    $sql_insert = "INSERT INTO language (language_id, name, last_update) VALUES (" 
              . $_POST["ins_language_id"] . ", '" 
              . $_POST["ins_language_name"] . "', NOW())";
    mysqli_query($con, $sql_insert);
    echo '<script type="text/javascript">';
    echo 'alert("You have inserted the data");';
    echo 'window.location="language.php";';
    echo '</script>';
}

if(isset($_POST["upd_language_id"])){
    $sql_update = "UPDATE language SET language_id=" . $_POST["upd_language_id"] 
                  . ", name='" . $_POST["upd_language_name"]
                  . "', last_update=NOW() WHERE language_id=" . $_POST["upd_old_language_id"];
    mysqli_query($con, $sql_update);
    echo '<script type="text/javascript">';
    echo 'alert("You have updated the data");';
    echo 'window.location="language.php";';
    echo '</script>';
}

$con -> close();
?>
</table>                  
</div>
</body>
</html>