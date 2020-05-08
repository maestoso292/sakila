
<?php

$con = mysqli_connect("localhost", "root", "","sakila");

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
    <a class="link" href="inventory.php">INVENTORY</a>
    <a class="link" href="language.php">LANGUAGE</a>
    <a class="link" href="payment.php">PAYMENT</a>
    <a class="link" href="rental.php">RENTAL</a>
    <a class="link" href="staff.php">STAFF</a>
    <a class="link" href="store.php">STORE</a>
</div>
<div class="header">
    <a style="float:left;font-size:25px;cursor:pointer;" onclick="openSideBar()">&#9776;</a> 
    <h1>FILM TEXT</h1>
</div>
<button class="collapsible">Menu</button>
<div class="contentmenu">
    <button class="collapsible">Insert</button>
        <div class="content">
            <form method="post">
                <label>Film ID</label><br>
                <input type="number" id="ins_film_id" name="ins_film_id" value="" min="0"><br>
                <label>Title</label><br>
                <input type="text" id="ins_title" name="ins_title" value="" maxlength="50"><br>
                <label>Description</label><br>
                <input type="text" id="ins_description" name="ins_description" value="" maxlength="256"><br>
                <input type="submit" name="insert" value="Insert"><br>
            </form>
        </div>
    <button class="collapsible">Update</button>
        <div class="content">
            <form method="post">
                <label>Old Film ID</label>
                <input type="number" id="upd_old_film_id" name="upd_old_film_id" value="" min="0"><br>
                <label>New Film ID</label>
                <input type="number" id="upd_film_id" name="upd_film_id" value="" min="0"><br>
                <label>Title</label>
                <input type="text" id="upd_title" name="upd_title" value="" maxlength="50"><br>
                <label>Description</label><br>
                <input type="text" id="upd_description" name="upd_description" value="" maxlength="256"><br><br>
                <input type="submit" name="update" value="Update"><br>
            </form>
        </div>
    <button class="collapsible">Delete</button>
        <div class="content">
            <form method="post">
                <label>Film ID</label>
                <input type="number" id="dlt_film_id" name="dlt_film_id" value="" min="0"><br>
                <input type="submit" name="delete" value="Delete"><br>
            </form>
        </div>
    <button class="collapsible">Search By Film ID</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="number" name="searchValue" min="0" placeholder="Enter film ID..">
                <input type="submit" name="searchID" value="Search">
            </form>
        </div>
    <button class="collapsible">Search By Film Title</button>
        <div class="content">
            <form action="" method="post" target="_blank">
                <input type="text" name="searchValue" placeholder="Enter film title..">
                <input type="submit" name="searchName" value="Search">
            </form>
        </div>
</div>

<script src="sakilascript.js"></script>

<div class="tableWrap">      
<table id = "film_text table">
<tr>
<th>Film ID</th>
<th>Title</th>
<th>Description</th>
</tr>

<?php
if(isset($_POST["searchName"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM film_text WHERE title LIKE '%$searchvalue%'" ;
    
} else if(isset($_POST["searchID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM film_text WHERE film_id = $searchvalue" ;
    
} else {
    $sql = "SELECT * FROM film_text";
}
$result = $con->query($sql);
if($result -> num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
       echo"<tr>";
       echo"<td>" .$row['film_id']. "</td>";
       echo"<td>" .$row['title']. "</td>";
       echo"<td>" .$row['description']. "</td>"; 
       echo"</tr>";   
    }
}
if(isset($_POST["dlt_film_id"])){
$sql_delete = "DELETE FROM film_text WHERE film_id=" . $_POST["dlt_film_id"];
    mysqli_query($con, $sql_delete);
    echo '<script type="text/javascript">';
    echo 'alert("You have deleted the data");';
    echo 'window.location="film_text.php";';
    echo '</script>';
}

if(isset($_POST["ins_film_id"])){
    $sql_insert = "INSERT INTO film_text (film_id, title, description) VALUES (" 
              . $_POST["ins_film_id"] . ", '" 
              . $_POST["ins_title"] . "', '"
              . $_POST["ins_description"] . "')";
    mysqli_query($con, $sql_insert);
    echo '<script type="text/javascript">';
    echo 'alert("You have inserted the data");';
    echo 'window.location="film_text.php";';
    echo '</script>';
}

if(isset($_POST["upd_film_id"])){
    $sql_update = "UPDATE film_text SET film_id=" . $_POST["upd_film_id"] 
                  . ", title='" . $_POST["upd_title"]
                  . "', description='" . $_POST["upd_description"] 
                  . "' WHERE film_id=" . $_POST["upd_old_film_id"];
    mysqli_query($con, $sql_update);
    echo '<script type="text/javascript">';
    echo 'alert("You have updated the data");';
    echo 'window.location="film_text.php";';
    echo '</script>';
}
$con -> close();
?>
</table id = "film_text table">                  
</div>
</body>
</html>