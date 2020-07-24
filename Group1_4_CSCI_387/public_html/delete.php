<?php
require_once("session.php");
require_once("functions.php");
require_once("database.php");
new_header_profile("Drop Course");
verify_login();

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
		<meta charset="UTF-8">
			<title> Add Course</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
			<link rel='stylesheet' href='stylesheets/alert.css'>
	 		<link rel="stylesheet" href="stylesheets/profileTest.css">
	 		<link rel="stylesheet" href="stylesheets/mobilestyle.css">
		 	<link rel="stylesheet" type="text/css" href="stylesheets/Add.css">
		 	<link rel="stylesheet" href="stylesheets/courseView.css">
	</head>
	<body>
		<div class="headerP" style="padding-bottom: 1%">
  	<img onclick="loadHome()" style="
  		margin-right: auto;
  		width: 15%;"src="images/logo.png" alt="Ole Miss Logo">
    <div class="user">


	<?php
		echo"<td class='user'>  ".$row["First_Name"]."  ".$row["Last_Name"]."</td>";
		?>
		</div>
		</div>

<!-- Top Navigation Menu -->
	<div class="topnav" id="nav">
	 	<button class="buttonP" onClick="loadProfile()" id="viewGrade"><p>My Profile</p></button>
		<button class="buttonP" onclick="addCourse()" ><p>Add Course<p></button>
		<button class="buttonP" onClick="deleteCourse()"  ><p>Drop Course</p></button>
		<button class="buttonP" onclick="viewSchedule()" ><p>View Schedule<p></button>
	<div class="name">
		<button class="buttonP" onclick="logout()" ><p>Logout<p></button>
	</div>
	  <a href="" class="active"> &nbsp &nbsp &nbsp &nbsp   Drop Course &nbsp &nbsp &nbsp &nbsp</a>

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
	<?php
		if (($output = message()) !== null) {
			echo $output;
			}
    $query2 = "SELECT * FROM Student natural join Enrollment natural join Class natural join Course WHERE StudentID =?";
    $stmt2 = $mysqli -> prepare($query2);
    $stmt2->execute([$_SESSION['id']]);

			if($stmt2->rowCount() > 0){
        echo				"<table class='' border='0'>";
        echo				"<thead>";
        echo				"</thead>";
        echo				"<tbody>";
				//////////////////////////This code reserve the ID of student for Delete functionality////////////////DO NOT DELETE
				echo 	"<div id = 'StudentID' style='display: none;'>".$row['StudentID']."<div>";
				///////////////////////////////////////////////////////////////////////

      while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
				$x2=$row2['InstructorID'];
				$query3 = "SELECT * FROM Instructor WHERE InstructorID = $x2";
				$stmt3 = $mysqli -> prepare($query3);
				$stmt3->execute();


				$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
				echo				"<tr>";
        echo				"<td style='display:none' id='".$row2['ClassID']."'value =".$row2['ClassID']." > ".$row2['ClassID']."</td>";
        echo							"<td style='color: #3F2B96; font-weight: bold;'>".$row2['Department_code']." ".$row2['CourseID'].", &nbsp &nbsp".$row2['Course_Name']."</td>";
        echo							"<td style='text-align: right'><button id ='button' value=".$row2['ClassID']." onclick='deleteClass(this.value)'>Delete</button></td>";
        echo 				"</tr>";
        echo				"<tr>";
        echo							"<td style='margin-left:50px;'>&nbsp &nbsp &nbsp &nbsp &nbsp Section &nbsp &nbsp".$row2['SectionID']."</td>";
        echo							"<td >Credit &nbsp &nbsp ".$row2['Credit']."&nbsp hrs</td>";
        echo 				"</tr>";
        echo 				"<tr>";
				echo							"<td style='margin-left:100px;'> &nbsp &nbsp &nbsp &nbsp &nbsp Location &nbsp &nbsp".$row2['Location']."<p>&nbsp &nbsp &nbsp &nbsp &nbsp Instructor &nbsp &nbsp {$row3['First_Name']}  {$row3['Last_Name']}</p></td>";
        echo							"<td >Day/Time &nbsp &nbsp".$row2['Day']."&nbsp &nbsp".$row2['Time']."</td>";
        echo				"</tr>";
      }
      	echo					"</tbody>";
      	echo				"</table>";
      	echo			"</ul>";
    }else{
      echo "<b>You do not have any Classes at the moment</b>";
    }

        ?>
    </div>
     <div class="footer">
       <script src="Javascript/delete.js"></script>
<?php

new_footer("CSCI_387 Team");
Database::dbDisconnect();

?>
</div>

</body>
</html>
