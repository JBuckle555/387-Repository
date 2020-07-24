

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
	<meta charset="UTF-8">
	<title> Add Course</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
		<link rel='stylesheet' href='stylesheets/alert.css'>
 	<link rel="stylesheet" href="stylesheets/profileTest.css">
 	<link rel="stylesheet" href="stylesheets/mobilestyle.css">
	 <link rel="stylesheet" type="text/css" href="stylesheets/Add.css">
	 <link rel="stylesheet" href="stylesheets/courseViewT.css">





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
<div class="computer">
        <?php
        $query2 = "SELECT * FROM Student natural join Enrollment natural join Class natural join Course WHERE StudentID =?";
        $stmt2 = $mysqli -> prepare($query2);
        $stmt2->execute([$_SESSION['id']]);
        if($stmt2->rowCount() > 0){


          echo				"<table class='' border='0'>";
          echo				"<thead>";
          echo				"<tr>";
          echo				"<th>Class ID</th>";
          echo				"<th>Course</th>";
          echo				"<th>Section</th>";
          echo				"<th>Course Name</th>";
          echo				"<th>Credit</th>";
          echo				"<th>Location</th>";
          echo				"<th>Day</th>";
          echo				"<th>Time</th>";
          echo        "<th>Option</th>";
          echo				"</tr>";
          echo				"</thead>";
          echo				"<tbody>";
					//////////////////////////This code reserve the ID of student for Delete functionality////////////////DO NOT DELETE
					echo 	"<div id = 'StudentID' style='display: none;'>".$row['StudentID']."<div>";
					///////////////////////////////////////////////////////////////////////

          while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
          echo				"<tr>";

          echo							"<td style='text-align:center' id='".$row2['ClassID']."'value =".$row2['ClassID']." > ".$row2['ClassID']."</td>";
          echo							"<td style='text-align:center'>".$row2['Department_code']." ".$row2['CourseID']."</td>";
          echo							"<td style='text-align:center'>".$row2['SectionID']."</td>";
          echo							"<td style='text-align:center'>".$row2['Course_Name']."</td>";
          echo							"<td style='text-align:center'>".$row2['Credit']."</td>";
          echo							"<td style='text-align:center'>".$row2['Location']."</td>";
          echo							"<td style='text-align:center'>".$row2['Day']."</td>";
          echo							"<td style='text-align:center'>".$row2['Time']."</td>";
          echo							"<td><button id ='button' value=".$row2['ClassID']." onclick='deleteClass(this.value)'>Delete</button></td>";
          echo						"</tr>";
        }
        echo					"</tbody>";
        echo				"</table>";
        echo			"</ul>";
      }else{
        echo "<b>You do not have any Classes at the moment</b>";
      }

        ?>
</div>
<div class="mobile">
        <?php
        $query2 = "SELECT * FROM Student natural join Enrollment natural join Class natural join Course WHERE StudentID =?";
        $stmt2 = $mysqli -> prepare($query2);
        $stmt2->execute([$_SESSION['id']]);
        if($stmt2->rowCount() > 0){


          echo				"<table class='hello' border='0'>";
          echo				"<thead>";
          echo				"</thead>";
          echo				"<tbody>";
					//////////////////////////This code reserve the ID of student for Delete functionality////////////////DO NOT DELETE
					echo 	"<div id = 'StudentID' style='display: none;'>".$row['StudentID']."<div>";
					///////////////////////////////////////////////////////////////////////

          while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
         
		echo "<tr>";
          echo							"<td style=' width: 100%;'  ".$row2['ClassID']."'value =".$row2['ClassID']." >Class ID:</td>";
           echo							"<td style=' width: 100%;'  ".$row2['ClassID']."'value =".$row2['ClassID']." >".$row2['ClassID']."</td>";
         
         echo "</tr>";
         
          echo "<tr>";
         
         echo 							"<td > Course </td>";
        echo 							"<td > ".$row2['Department_code']." ".$row2['CourseID']."</td>";

          echo "</tr>";
         
          echo "<tr>";
          echo							"<td >Section </td>";
          echo							"<td >".$row2['SectionID']."</td>";
        
         echo "</tr>";
          
          echo "<tr>";
          echo							"<td >Course Name  </td>";
          echo							"<td >   ".$row2['Course_Name']."</td>";

         echo "</tr>";
          
          echo "<tr>";
          echo							"<td >Credit </td>";
          echo							"<td > ".$row2['Credit']."</td>";

         echo "</tr>";
       
         echo "<tr>";
          echo							"<td >Location  </td>";
          echo							"<td >   ".$row2['Location']."</td>";

         echo "</tr>";
        
         echo "<tr>";
          echo							"<td >Day </td>";
           echo							"<td > ".$row2['Day']."</td>";

        echo "</tr>";
        
         
         echo "<tr>";
         echo							"<td >Time </td>";
         echo							"<td > ".$row2['Time']."</td>";
        
        echo "</tr>";
        echo "<tr>";
         echo							"<td >Time </td>";
         echo							"<td > ".$row2['Total_Seat']."</td>";
        
        echo "</tr>"; echo "<tr>"; 
        
          echo							"<td style='text-align: right'><button id ='button' value=".$row2['ClassID']." onclick='deleteClass(this.value)'> Delete</button></td>";
           echo							"<td style='text-align: center'></td>";
      
         echo "</tr>";
          echo "<tr>"; 
        
          echo							"<td style='background: #9ebae8'></td>";
              echo							"<td style='background: #9ebae8'></td>";
       
         echo "</tr>";
         
         
        
        }
        echo					"</tbody>";
        echo				"</table>";

      }else{
        echo "<b>You do not have any Classes at the moment</b>";
      }

        ?>
</div>
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
