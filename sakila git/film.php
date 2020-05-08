
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
    <a class="link" href="customer.php">CUSTOMER</a>
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
    <h1>FILM</h1>
</div>
<button class="collapsible">Menu</button>
<div class="contentmenu">
    <button class="collapsible">Insert</button>
        <div class="content">
            <form method="post">
                <label>Film ID</label><br>
                <input type="number" id="ins_film_id" name="ins_film_id" value="" min="0"><br>
                <label>Title</label><br>
                <input type="text" id="ins_title" name="ins_title" value="" min="0"><br>
                <label>Description</label><br>
                <input type="text" id="ins_description" name="ins_description" value="" min="0"><br>
                <label>Release Year</label><br>
                <input type="number" id="ins_release_year" name="ins_release_year" value="" min="0"><br>
                <label>Language ID</label><br>
                <input type="number" id="ins_language_id" name="ins_language_id" value="" min="0"><br>
                <label>Original Language ID</label><br>
                <input type="text" id="ins_original_language_id" name="ins_original_language_id" value="" min="0"><br>
                <label>Rental Duration</label><br>
                <input type="number" id="ins_rental_duration" name="ins_rental_duration" value="" min="0"><br>
                <label>Rental Rate</label><br>
                <input type="number" id="ins_rental_rate" name="ins_rental_rate" value="" min="0" step=".01"><br>
                <label>Length</label><br>
                <input type="number" id="ins_length" name="ins_length" value="" min="0"><br>
                <label>Replacement Cost</label><br>
                <input type="number" id="ins_replacement_cost" name="ins_replacement_cost" value="" min="0" step="0.01"><br>
                <label>Rating</label><br>
                <input type="text" id="ins_rating" name="ins_rating" value=""><br>
                <label>Special Features</label><br>
                <input type="text" id="ins_special_features" name="ins_special_features" value="" min="0"><br>
                <input type="submit" name="insert" value="Insert"><br>
            </form>   
        </div>
    <button class="collapsible">Update</button>
        <div class="content">
            <form method="post">
                <label>Old Film ID</label><br>
                <input type="number" id="upd_old_film_id" name="upd_old_film_id" value="" min="0"><br>
                <label>New Film ID</label><br>
                <input type="number" id="upd_film_id" name="upd_film_id" value="" min="0"><br>
                <label>Title</label><br>
                <input type="text" id="upd_title" name="upd_title" value="" min="0"><br>
                <label>Description</label><br>
                <input type="text" id="upd_description" name="upd_description" value="" min="0"><br>
                <label>Release Year</label><br>
                <input type="number" id="upd_release_year" name="upd_release_year" value="" min="0"><br>
                <label>Language ID</label><br>
                <input type="number" id="upd_language_id" name="upd_language_id" value="" min="0"><br>
                <label>Original Language ID</label><br>
                <input type="number" id="upd_original_language_id" name="upd_original_language_id" value="" min="0"><br>
                <label>Rental Duration</label><br>
                <input type="number" id="upd_rental_duration" name="upd_rental_duration" value="" min="0"><br>
                <label>Rental Rate</label><br>
                <input type="number" id="upd_rental_rate" name="upd_rental_rate" value="" min="0" step=".01"><br>
                <label>Length</label><br>
                <input type="number" id="upd_length" name="upd_length" value="" min="0"><br>
                <label>Replacement Cost</label><br>
                <input type="number" id="upd_replacement_cost" name="upd_replacement_cost" value="" min="0" step=".01"><br>
                <label>Rating</label><br>
                <input type="text" id="upd_rating" name="upd_rating" value="" min="0"><br>
                <label>Special Features</label><br>
                <input type="text" id="upd_special_features" name="upd_special_features" value="" min="0"><br>              
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

<table id = "film_table">

<tr>
<th>Film ID </th>
<th>Title</th>
<th>Description</th>
<th>Release Year </th>
<th>Language ID </th>
<th>Original Language ID </th>
<th>Rental Duration </th>
<th>Rental Rate </th>
<th>Length</th>
<th>Replacement Cost </th>
<th>Rating </th>
<th>Special Features </th>
<th>Last Update </th>
</tr>

<?php
if(isset($_POST["searchName"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM film WHERE title LIKE '%$searchvalue%'" ;
    
} else if(isset($_POST["searchID"])){
    $searchvalue = $_POST["searchValue"];
    $sql = "SELECT * FROM film WHERE film_id = $searchvalue" ;
    
} else {
    $sql = "SELECT * FROM film";
}
$result = $connect->query($sql);
if($result -> num_rows > 0 ){
    while($row = $result -> fetch_assoc()){
       echo"<tr>";
       echo"<td>" .$row['film_id']. "</td>";
       echo"<td>" .$row['title']. "</td>";
       echo"<td>" .$row['description']. "</td>"; 
       echo"<td>" .$row['release_year']. "</td>"; 
       echo"<td>" .$row['language_id']. "</td>"; 
       echo"<td>" .$row['original_language_id']. "</td>"; 
       echo"<td>" .$row['rental_duration']. "</td>"; 
       echo"<td>" .$row['rental_rate']. "</td>"; 
       echo"<td>" .$row['length']. "</td>"; 
       echo"<td>" .$row['replacement_cost']. "</td>"; 
       echo"<td>" .$row['rating']. "</td>"; 
       echo"<td>" .$row['special_features']. "</td>"; 
       echo"<td>" .$row['last_update']. "</td>"; 
       echo"</tr>";   
    }
}
if(isset($_POST["ins_film_id"])){
    $sql_insert = "INSERT INTO film (film_id,title, description,release_year,language_id,original_language_id,rental_duration,rental_rate,length,replacement_cost,rating,special_features,last_update) VALUES (" 
              . $_POST["ins_film_id"] . ", '" 
              . $_POST["ins_title"] . "', '" 
              . $_POST["ins_description"] . "', " 
              . $_POST["ins_release_year"] . ", " 
              . $_POST["ins_language_id"] . ", '" 
              . $_POST["ins_original_language_id"] . "', " 
              . $_POST["ins_rental_duration"] . ", " 
              . $_POST["ins_rental_rate"] . ", " 
              . $_POST["ins_length"] . ", " 
              . $_POST["ins_replacement_cost"] . ", '" 
              . $_POST["ins_rating"] . "', '" 
              . $_POST["ins_special_features"] . "', NOW())";
       
    
    mysqli_query($connect, $sql_insert);
    echo '<script type="text/javascript">';
    echo 'alert("You have inserted the data");';
    echo 'window.location="film.php";';
    echo '</script>'; 
    
}

if(isset($_POST["upd_film_id"])){
    $sql_update = "UPDATE film SET film_id=" . $_POST["upd_film_id"] 
                  . ", title='" . $_POST["upd_title"]
                  . "', description='" . $_POST["upd_description"]
                  . "', release_year=" . $_POST["upd_release_year"]
                  . ", language_id=" . $_POST["upd_language_id"]
                  . ", original_language_id=" . $_POST["upd_original_language_id"]
                  . ", rental_duration=" . $_POST["upd_rental_duration"]
                  . ", rental_rate=" . $_POST["upd_rental_rate"]
                  . ", length=" . $_POST["upd_length"]
                  . ", replacement_cost=" . $_POST["upd_replacement_cost"]
                  . ", rating='" . $_POST["upd_rating"]
                  . "', special_features='" . $_POST["upd_special_features"]
                              
                ."', last_update=NOW() WHERE film_id=" . $_POST["upd_old_film_id"];

    mysqli_query($connect, $sql_update);
    echo '<script type="text/javascript">';
    echo 'alert("You have updated the data");';
    echo 'window.location="film.php";';
    echo '</script>';
   
}

if(isset($_POST["dlt_film_id"])){
    $sql_delete = "DELETE FROM film WHERE film_id=" . $_POST["dlt_film_id"];

        mysqli_query($connect, $sql_delete);
        echo '<script type="text/javascript">';
        echo 'alert("You have deleted the data");';
        echo 'window.location="film.php";';
        echo '</script>';
        
    }

$connect -> close()
?>
</table id = "film_table">                  
</div>
</body>
</html>