<!DOCTYPE html>
<?php

include "config.php";

// Create connection with database
$mysqli = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$mysqli) {
    echo "failing";
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the tables names from the degreeplanner database
$result= $mysqli->query("select table_name from information_schema.tables where table_schema = 'degreeplanner';");
?>

<html>
<head>
<title>MAIN</title>

<!-- Bootstrap and jQuery styling for first screen -->
<!--for the modal-->
<link rel="stylesheet" href="CSS/bootstrap.4.3.1.min.css" type="text/css">
<script type="text/javascript" src="JavaScript/slim.3.3.1.min.js"></script>
<script type="text/javascript" src="JavaScript/popper.1.14.7.min.js"></script>
<script type="text/javascript" src="JavaScript/bootstrap.4.3.1.min.js"></script>
</head>

<!-- Add specific fonts -->
<link href="CSS/corbenfont.css" type="text/css">
<link href="CSS/nobilefont.css" type="text/css">

<!-- CSS file containing the styling of screen one -->
<link rel="stylesheet" href="CSS/screen1.css" type="text/css">

<!-- BOOTSTRAP IMPORTS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="CSS/bootstrap.3.4.1.min.css" type="text/css">
<!-- jQuery library -->
<script type="text/javascript" src="JavaScript/jquery.3.4.1.min.js"></script>
<!-- Latest compiled JavaScript -->
<script type="text/javascript" src="JavaScript/bootstrap.3.4.1.min.js"></script>

<body>

<!-- Create the title of the website on the first screen -->
<h1  id = "title" align = center  style = " color: green"  > Loyola University Degree Planner</h1>

<!-- Add line below title -->
<div id= "line"> </div>

<!-- Add Loyola University Maryland crest image -->
<img src= "https://upload.wikimedia.org/wikipedia/en/thumb/0/06/Loyola_University_Maryland_shield.svg/1024px-Loyola_University_Maryland_shield.svg.png" height = 50 width =50 class = center >


        <!-- Create the drop down menu -->
        <form  action="screen2.php" method="post">

        <!-- Create the prompt to go above the drop down menu and center it -->
        <h6 id = "prompt" align= "center">Choose a Degree Combination From the Menu Below:</h6>
        <div align="center">

        <select class="btn dropdown-toggle btn-light "  id="degrees" name="degrees">
                <?php
                        // Loop through the table names and put them in the drop down menu
                        while($rows = $result->fetch_assoc()){
                                $name = $rows['table_name'];
                                echo "<option value='$name'>$name</option>";
                        }
                ?>
        </select><br/>
</body>

 <!-- Next Button -->
 <input class="btn btn-secondary" id = "next"  type="submit" name="button" value="Next"/i></form>

</html>
