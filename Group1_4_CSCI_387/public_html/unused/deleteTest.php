

<?php
require_once("session.php");
require_once("functions.php");

require_once("database.php");
new_header_profile("Add Course");
verify_login();
if (($output = message()) !== null) {
echo $output;
}
$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "SELECT * FROM Student WHERE StudentID = ? LIMIT 1";
$stmt = $mysqli -> prepare($query);
$stmt -> execute([$_SESSION["id"]]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TableSaw Stack Table</title>

	<link rel="stylesheet" href="stylesheets/courseViewT.css">
	<link rel="stylesheet" href="stylesheets/demo.css">
	<link rel="stylesheet" href="//filamentgroup.github.io/demo-head/demohead.css">
	<style>
	.democolwidth {
		width: 150px;
	}
	</style>

	<!-- <script src="../dist/dependencies/jquery.js"></script>
	<script src="../dist/tablesaw.jquery.js"></script> -->
	<script src="tablesaw.js"></script>
	<script src="tablesaw-init.js"></script>
	<script src="//filamentgroup.github.io/demo-head/loadfont.js"></script>
</head>
<body>

    <div class="headerP"> Group 14 Institute </div>




<!-- Top Navigation Menu -->
<div class="topnav" id="nav">
 <button class="buttonP" onClick="loadProfile()" id="viewGrade"><p>My Profile</p></button>
			 <button class="buttonP" onclick="addCourse()" ><p>Add Course<p></button>
			<button class="buttonP" onClick="deleteCourse()"  ><p>Drop Course</p></button>
			<button class="buttonP" onclick="viewSchedule()" ><p>View Schedule<p></button>
<div class="name">
<div class="user">
  <?php

echo"<td class='user'>  ".$row["First_Name"]."  ".$row["Last_Name"]."</td>";


?>
</div>
<?php

	echo "<td><input class='logout' type='button' value='Logout' onclick='logout()'></td>";



?>

</div>
  <a href="" class="active"> &nbsp &nbsp &nbsp &nbsp   Drop Course &nbsp &nbsp &nbsp &nbsp
</a>

  <div id="myLinks" >
    <a onclick='abc(event)' href="test.php">My Profile</a>
    <a onclick='abc(event)' href="add.php">Add Course</a>
    <a onclick='abc(event)' href="viewSchedule.php">View Schedule</a>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>

</div>


    <div class="targetP" >
            <!-- This is where test2.php should be inserted -->
<br>
<h1 id = "title"  style="text-align: left ; margin-top:0px;">Delete from your Schedule</h1>
<hr>
<div class="docs-main">
        <?php
        $query2 = "SELECT * FROM Student natural join Enrollment natural join Class natural join Course WHERE StudentID =?";
        $stmt2 = $mysqli -> prepare($query2);
        $stmt2->execute([$_SESSION['id']]);
        if($stmt2->rowCount() > 0){


          echo				"<table class='tablesaw' data-tablesaw-mode='stack'>";
          echo				"<thead>";
          echo				"<tr>";
          echo				"<th scope='col' data-tablesaw-priority='persist'>Class ID</th>";
          echo				"<th scope='col' data-tablesaw-sortable-default-col data-tablesaw-priority='3'>Course</th>";
          echo				"<th scope='col' data-tablesaw-priority='2'>Section</th>";
          echo				"<th scope='col' data-tablesaw-priority='1'>Course Name</th>";
          echo				"<th scope='col' data-tablesaw-priority='4'>Credit</th>";
          echo				"<th scope='col' data-tablesaw-priority='5'>Location</th>";
          echo				"<th scope='col' data-tablesaw-priority='6'>Day</th>";
          echo				"<th scope='col' data-tablesaw-priority='7'>Time</th>";
          echo        "<th scope='col' data-tablesaw-priority='8'>Option</th>";
          echo				"</tr>";
          echo				"</thead>";
          echo				"<tbody>";
					//////////////////////////This code reserve the ID of student for Delete functionality////////////////DO NOT DELETE
					echo 	"<div id = 'StudentID' style='display: none;'>".$row['StudentID']."<div>";
					///////////////////////////////////////////////////////////////////////

          while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
          echo				"<tr>";

          echo							"<td class='title' style='text-align:center' id='".$row2['ClassID']."'value =".$row2['ClassID']." > ".$row2['ClassID']."</td>";
          echo							"<td class='title' style='text-align:center'>".$row2['Department_code']." ".$row2['CourseID']."</td>";
          echo							"<td class='title' style='text-align:center'>".$row2['SectionID']."</td>";
          echo							"<td class='title' style='text-align:center'>".$row2['Course_Name']."</td>";
          echo							"<td class='title' style='text-align:center'>".$row2['Credit']."</td>";
          echo							"<td class='title' style='text-align:center'>".$row2['Location']."</td>";
          echo							"<td class='title' style='text-align:center'>".$row2['Day']."</td>";
          echo							"<td class='title' style='text-align:center'>".$row2['Time']."</td>";
          echo							"<td class='title'><button id ='button' value=".$row2['ClassID']." onclick='deleteClass(this.value)'>Delete</button></td>";
          echo						"</tr>";
        }
        echo					"</tbody>";
        echo				"</table>";
      
      }else{
        echo "<b>You do not have any Classes at the moment</b>";
      }

        ?>

    </div>
    </div>

</body>
</html>
