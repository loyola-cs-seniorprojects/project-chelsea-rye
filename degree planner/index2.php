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
//$result= $mysqli->query("select course from $jsvar")?>






<head>
<script>
        var option =  localStorage.getItem("storageName");
        //var o = document.write("the option:",option); 

        //function getChoice(){

        //      window.location.href = "index2.php?name="+ option;
        //}



//      xmlhttp.open("GET", "index2.php?option="+option,true);
//      xmlhttp.send();


</script>
<title>Degree Planner</title>
<style>
#coursecol{
    display: inline-block;
    float: left;
        border: solid black;
        width: 15%;
        height: 90%;
        background: grey;
        opacity: 0.2;}

#years{
        background: green;
        background-opacity:0.2;
        color: #444444;
    text-shadow: -1px -1px 1px #000, 1px 1px 1px #ccc;
}
.boxes{
        height:120px;
        border: solid black;
        }

h4{

  margin-left: 5%;}
table{
display: table; width: 100%;

    float: left;
    padding-left: 10px;
}

</style>
</head>

<body>
        <?php
                //this holds the users degree combo choice      
                $jsvar = "<script>document.write(localStorage.getItem('storageName'))</script>";
                echo "your cvar=";
                echo $jsvar;

                //$sql = "SELECT course_title FROM `".$jsvar."%`";
                $sql = "SELECT course_title FROM `$jsvar`";

                //$sql = "SELECT course_title FROM `BS Computer Science Major`";

                echo $sql;
                $result = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($result) > 0)
                {
                        while($row = mysqli_fetch_assoc($result))
                        {
                                echo "<br/>", $row['course_title'];
                        }
                }
                else
                {
                        echo "Error";
                }
        ?>

        <h4 id =degree> 
                <script>
                         document.getElementById('degree').innerHTML = option;
                </script>
        </h4>


        <div id= coursecol >
        </div>

        <table style="width:80%">
                <tr id = years>
                        <th align = center>Freshman</th>
                        <th>Sophomore</th>
                        <th>Junior</th>
                        <th>Senior</th>
                </tr>
                <tr>
                        <th>Semester 1</th>
                        <th>Semester 1</th>
                        <th>Semester 1</th>
                        <th>Semester 1</th>
                </tr>


                <tr>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                </tr>


                 <tr>
                        <th>Semester 2</th>
                        <th>Semester 2</th>
                        <th>Semester 2</th>
                        <th>Semester 2</th>
                </tr>

                <tr>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                </tr>


                 <tr>
                        <th>Semester 3</th>
                        <th>Semester 3</th>
                        <th>Semester 3</th>
                        <th>Semester 3</th>
                </tr>

                <tr>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                </tr>

 <tr>
                        <th>Semester 4</th>
                        <th>Semester 4</th>
                        <th>Semester 4</th>
                        <th>Semester 4</th>
                </tr>
                
                <tr>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                </tr>
        </table>

</body>
