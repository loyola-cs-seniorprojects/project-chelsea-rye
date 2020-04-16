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

?>

<head>
<title>Degree Planner</title>

<!-- Instructions for the user on top of the second screen -->
<h3> Drag and drop the courses listed into each of the boxes to create a degree plan </h3>

<!-- Style the second screen -->
<style>
#coursecol{
        display: inline-block;
        float: left;
        border: solid black;
        width: 15%;
        background: grey;
        font-weight: italic;
        color: black;
        overflow: auto;
        max-height: 600px;
background-color: rgba(33,33,33,0.2)
}

#years{
        background: green;
        background-opacity:0.2;
        color: #444444;
    text-shadow: -1px -1px 1px #000, 1px 1px 1px #ccc;
}
.boxes{
        height:180px;
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
<!-- Create the course column that will hold all of the required courses for the chosen degree/major/minor combination -->
<div id = coursecol style= overflow-y: scroll; height= 400px ;>
<?php

// Retrieve the degree combination the user chose from the drop down menu
$users_choice = $_POST['degrees'];
echo "<strong>", $users_choice, "</strong></br>";

// Get the required courses from the database tables based on what the user chose from the drop down menu
$sql = "SELECT courseID, course_title FROM `$users_choice`";

$result = mysqli_query($mysqli, $sql);

               if (mysqli_num_rows($result) > 0)
                {
                //      $course_list = [];
                        while($row = mysqli_fetch_assoc($result))
                        {
                                //$c[] = array("course_title"=>$row['course_title']);
                //              $id = $row['courseID'];                         
                                //$course_list[$id]=$row['course_title'];

                        echo "<br/>", $row['course_title'];
                        }
                }
                else
                {
                        echo "Error";
                }

//              for ( $i = 0, $len = count($course_list); $i < $len; $i += 1)
//              {
  //             echo '<tr id='coursecol'>
    //                                  <td><br>' . $course_list[$i] . '</td>
      //              </tr>';

//echo "<br/><strong>", $users_choice, "</strong>";
?>
        </div>

        <!-- Create the 12 sections (8 semesters and 4 summers) -->
        <table style="width:80%">
                <tr id = years>
                        <th align = center>Freshman</th>
                        <th>Sophomore</th>
                        <th>Junior</th>
                        <th>Senior</th>
                </tr>
                <tr>
                        <th>Fall Semester</th>
                        <th>Fall Semester</th>
                        <th>Fall Semester</th>
                        <th>Fall Semester</th>
                </tr>


                <tr>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                </tr>


                 <tr>
                        <th>Spring Semester</th>
                        <th>Spring Semester</th>
                        <th>Spring Semester</th>
                        <th>Spring Semester</th>
                </tr>

                <tr>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                </tr>


                 <tr>
                        <th>Summer</th>
                        <th>Summer</th>
                        <th>Summer</th>
                        <th>Summer</th>
                </tr>

                <tr>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                </tr>
        </table>

</body>
