

<?php
require_once("session.php");
require_once("functions.php");

require_once("database.php");
new_header_profile("Profile");
verify_login();

$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "SELECT * FROM Student WHERE StudentID = ? LIMIT 1";
$stmt = $mysqli -> prepare($query);
$stmt -> execute([$_SESSION["id"]]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);


?>
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



	<script type="text/javascript">
	function loadProfile(){

	        location.href = "test.php";
	 	}
	 		function addCourse(){

	        location.href = "add.php";
	 	}
			function deleteCourse(){
				location.href = "delete.php";
			}
			function viewSchedule(){
				location.href = "viewSchedule.php"
			}
			function main(){

	        location.href = "main.php";
	 	}
	 	function logout(){

	        location.href = "logout.php";
	 	}
 	function abc(event) {
  event.preventDefault();
  var href = event.currentTarget.getAttribute('href')
  window.location= href;
}

	function myFunction() {



  		var x = document.getElementById("myLinks");

  		if (x.style.display === "block") {
   			 x.style.display = "none";
 		 } else {
   			 x.style.display = "block";
  		}
}


	</script>

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
 <button class="buttonP" onClick="loadProfile()" ><p>My Profile</p></button>
			<button class="buttonP" onclick="addCourse()" ><p>Add Course<p></button>
			<button class="buttonP" onClick="deleteCourse()"  ><p>Drop Course</p></button>
			<button class="buttonP" onclick="viewSchedule()" ><p>View Schedule<p></button>
     

<div class="name">
      <button class="buttonP" onclick="logout()" ><p>Logout<p></button>

</div>

  <a href="" class="active"> &nbsp &nbsp &nbsp &nbsp   My Profile &nbsp &nbsp &nbsp &nbsp
</a>

  <div id="myLinks" >
    <a onclick='abc(event)' href="add.php">Add Course</a>
    <a onclick='abc(event)' href="delete.php">Drop Course</a>
    <a onclick='abc(event)' href="viewSchedule.php">View Schedule</a>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>

</div>



    <div class="targetP" >
            <!-- This is where test2.php should be inserted -->
<?php
if (($output = message()) !== null) {
echo $output;
}
?>
        <?php


  echo"<table>";
  echo"<td>Name</td>";
  echo "";
  echo"  <td>".$row["First_Name"]."  ".$row["Last_Name"]."</td>";

  echo"  </tr>";
  echo"<tr>";
  echo  "<td>Student ID</td>";
  echo"  <td>".$_SESSION["id"]."</td>";



    echo"</tr>";
    echo"<tr>";
  echo"<td>Email</td>";
  echo"<td>".$row["Email"]."</td>";
  echo"</tr>";
  echo"  <tr>";
  echo"<td>Date of Birth</td>";
  echo"<td>".$row["Birthday"]."</td>";
  echo"</tr>";
  echo"    <tr>";
  echo"<td>Degree</td>";
  echo"<td>".$row["Degree"]."</td>";
  echo"</tr>";
  echo"</table>";
        ?>
        <button class="editButton" onclick = "editProfile()"> Edit Profile </button>
    </div>
     <div class="footer">
<?php

new_footer("CSCI_387 Team");
Database::dbDisconnect();

?>

</div>
</body>
</html>
