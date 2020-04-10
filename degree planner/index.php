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

// retrieve the tables names from the degreeplanner database
$result= $mysqli->query("select table_name from information_schema.tables where table_schema = 'degreeplanner';");
?>


<head>
<title>MAIN</title>
<style>

<!--  Format the first screen -->
#degrees { padding: 10px;}
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

.dropdown, .dropdown-menu{
        left: 50% !important;
        right: auto !important;
        text-align: center !important;
        transform: translate(-50%, 0) !important;}

</style>

<!-- BOOTSTRAP IMPORTS -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>



        function myNewFunction(element){
                var text = element.options[element.selectedIndex].text;
//                document.getElementById("test").innerHTML = text;
                
                var getInput = text;
                localStorage.setItem("storageName", getInput);

                      
//              xmlhttp.open("GET","index2.php"+getInput,true);
//              xmlhttp.send();

                //window.location.href = "index2.php?name="+ getInput;;
                
        }




</script>

</head>

<body>
        <h1 id = "title"align = "center" style = "color:green;"> Loyola University Degree Planner</h1>

        <div id= "line"> </div>

        <h6 id = "prompt" align= "center">Choose a Degree Combination From the Menu Below:</h6>

        <div id = degrees margin = "auto">


                <center><select name = "combos" onChange="myNewFunction(this);">
                <?php
                        // Loop through the table names and put them in the drop down menu
                        while($rows = $result->fetch_assoc()){
                                $name = $rows['table_name'];

                                echo "<option value='$name'>$name</option>";
                        }
                ?>
                </select></center>

        </div>

        <div id = "test">
        </div>
</body>


<!-- Next Button -->
        <a class="btn btn-primary" id= "next" href="index2.html" role="button">Next</a>
