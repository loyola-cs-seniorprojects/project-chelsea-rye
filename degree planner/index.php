<?php

// Access the database
$servername = "cs-database.cs.loyola.edu";
$dbusername = "rbverille";
$dbpassword = "1736978";
$dbname = "degreeplanner";

// Create connection
$mysqli = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$mysqli) {
    echo "failing";
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the tables names from the degreeplanner database
$result= $mysqli->query("select table_name from information_schema.tables where table_schema = 'degreeplanner';");
?>


<head>
<title>MAIN</title>

<!-- Style the first screen -->
<style>
#prompt{ font-weight: bold; }

#title {
        font-family: Geiorgia;
        padding-bottom: 20px;}

#next { 
        float: right; 
        margin-right: 20px;
        margin-top: 20%;}

#line{  
        padding-bottom: 10%;
        border-top: 5px solid green; }

#degrees{
        left: 50% !important;
        right: 50% !important;
        text-align:center !important;}

</style>

<!-- BOOTSTRAP IMPORTS -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
        <!-- Create the title of the website on the first screen -->
        <h1 id = "title"align = "center" style = "color:green;"> Loyola University Degree Planner</h1>
        <div id= "line"> </div>

        <!-- Create the drop down menu -->
        <form action="index2.php" method="post">

        <!-- Create the prompt to go above the drop down menu and center it -->
        <h6 id = "prompt" align= "center">Choose a Degree Combination From the Menu Below:</h6>
        <div align="center">

        <select id="degrees" name="degrees">
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
 <input id = "next" style="margin-top:350px; margin-left:750px" type="submit" name="button" value="Next"/></form>

</html>
