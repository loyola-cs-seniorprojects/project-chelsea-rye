<?php

include "config.php";

// Create connection
$mysqli = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<html>
<head>
<title>Degree Planner</title>

 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="CSS/jquery-ui-theme-base2.css" type="text/css">


<!-- Bootstrap and jQuery styling for second screen -->
<link rel="stylesheet" href="CSS/bootstrap.4.4.1.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" type="text/css">
<script src="JavaScript/bootstrap.3.4.1.min.js" type="text/javascript"></script>
<script src="JavaScript/jquery.3.4.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="CSS/bootstrap.4.3.1.min.css" type="text/css">
<script src="JavaScript/slim.3.3.1.min.js" type="text/javascript"></script>
<script src="JavaScript/popper.1.14.7.min.js" type="text/javascript"></script>
<script src="JavaScript/bootstrap.4.3.1.min.js" type="text/javascript"></script>   


<!-- Add specific font -->
<link href="CSS/istokweb-worksans-fonts.css" rel="stylesheet" type="text/css">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<!-- Style the second screen -->
<!-- CSS file containing the styling of screen two -->
<link rel="stylesheet" href="CSS/screen2.css" type="text/css">

<style>
h4{
         margin-left: 5%;}

table{
        display: table;
        float: right;
        position: absolute;
        left: 18%;
        table-layout: fixed;
        border: #e6e6e6 solid 5px;}

body{
        font-family: 'Istok Web', sans-serif;}

li{
        padding:5px;}

</style>

<!-- Instructions for the user on top of the second screen -->
<div  id="instruction" class="navbar navbar-success bg-success text-white">
        <h6> Drag and drop the courses listed into each of the boxes to create a degree plan </h6>

<ul class="nav justify-content-end nav-pills">

<li>

<!-- User Manual for easy access for the user in the form of a button on the top of the second screen -->
<div>
    <!-- Button HTML (to Trigger Modal) -->
    <a href="#myModal" role="button" class="btn btn-sm btn-outline-light" data-toggle="modal">User Manual</a>

    <!-- Modal HTML -->
    <div id="myModal" class="modal fade" tabindex="-1" role = "dialog">
        <div class="modal-dialog" role = "document">
            <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title">How To Use The Loyola University Degree Planner</h5>
                </div>
                <div class="modal-body">
                    <p class="text-secondary">

<small>
<strong style ="color: green">HOW TO USE THE LOYOLA UNIVERSITY DEGREE PLANNER</strong><br><br>
1. The first screen will appear with a drop-down menu. Choose a degree/major/minor combination that you are interested in pursuing.<br><br>
2. Click the Next button to go to the next page. The second screen will appear containing a layout for you to start planning your four years. On the left hand side all the required courses for your selected degree/major/minor combination will be listed. <br><br>
3. You can drag and drop each one into one of the 12 sections covering the rest of the page.There are 8 semester sections (one fall and one spring for each of your four years at Loyola) and 4 summer sections that follow after each school year.<br><br>
4. You may move each course as often as needed within the sections.<br><br>
5. Once you have completed your degree plan, you can click on the Print button which will allow you to print out or save your degree plan.<br><br>
6. The Back button will allow you to go back to the first screen to select a new degree/major/minor combination and start the process all over again.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

</li>

  <!-- Button to print the degree plan -->
  <li class="nav-item">
       <input  type="button" class=" buttons btn btn-outline-light btn-sm"  value="Print" 
             onclick="window.print()" />
</li>

<!-- Button to go back to the first screen from the second screen -->
<li class = "nav-item">
        <input class= "buttons btn btn-outline-light btn-sm" type="button" value="Back" 
             onclick="goBack()" />
</li>
</ul>
</div>

<!-- Create the course column that will hold all of the required courses for the chosen degree/major/minor combination -->
<div class = "card rounded"  id = coursecol style="overflow: scroll; height: 628px;">

<?php

// Retrieve the degree combination the user chose from the drop down menu
$users_choice = $_POST['degrees'];
echo "<strong>", $users_choice, "</strong></br>";
// Get the required courses from the database tables based on what the user chose from the drop down menu
$sql = "SELECT courseID, course_title FROM `$users_choice`";
$result = mysqli_query($mysqli, $sql);
$reqCourses   = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>

<body>

<!-- Display all the required courses into the course column on the left side in a drag and drop state -->
 <div class="li_containers">

 <?php foreach ($result as $key => $item) { ?>

   <div class="ui-widget-content listitems" data-itemid=<?php echo $item['id'] ?> >

        <p><strong><?php echo $item['course_title'] ?></strong></p>

   </div>

 <?php } ?>
</div>
</div>

<!-- Create drag and drop feature -->
 <script type="text/javascript" src="JavaScript/jquery2-1.12.4.js"></script>
 <script type="text/javascript" src="JavaScript/draganddrop.js"></script>
 <script type="text/javascript" src="JavaScript/jquery-ui.js"></script>

<!-- Table Layout -->
<div class=" table">
        <!-- Create the 12 sections (8 semesters and 4 summers) -->
        <table class = table id = table  style="width:80%">
                <tr class = " table-dark" id = years>
                        <th>Freshman</th>
                        <th>Sophomore</th>
                        <th>Junior</th>
                        <th>Senior</th>
                </tr>
                <tr>
                        <th class = semesters>Fall Semester</th>
                        <th class = semesters>Fall Semester</th>
                        <th class = semesters>Fall Semester</th>
                        <th class = semesters>Fall Semester</th>
                </tr>


                <tr>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                </tr>


                 <tr>
                        <th class = semesters>Spring Semester</th>
                        <th class = semesters>Spring Semester</th>
                        <th class = semesters>Spring Semester</th>
                        <th class = semesters>Spring Semester</th>
                </tr>

                <tr>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                        <td class = boxes></td>
                </tr>


                 <tr>
                        <th class = semesters>Summer</th>
                        <th class = semesters>Summer</th>
                        <th class = semesters>Summer</th>
                        <th class = semesters>Summer</th>
                </tr>

                <tr>
                        <td class = "boxes"></td>
                        <td class = "boxes bottom"></td>
                        <td class = "boxes bottom"></td>
                        <td class = "boxes bottom" ></td>
                </tr>
        </table>
</div>

 <link rel="stylesheet" href="CSS/print.css" type="text/css">

<!-- Go back to screen one -->
<script src="JavaScript/goback.js" type="text/javascript"></script>

</body>
</html>
