<!doctype html>
<html lang="en">
<?php
require_once("session.php");
require_once("functions.php");

require_once("database.php");
new_header_profile("Add Course");


$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "SELECT * FROM Student WHERE StudentID = ? LIMIT 1";
$stmt = $mysqli -> prepare($query);
$stmt -> execute([$_SESSION["id"]]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<head>
	<meta charset="UTF-8">
	<title> Add Course</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 	<link rel="stylesheet" href="stylesheets/profile.css">
 	<link rel="stylesheet" href="stylesheets/mobilestyle.css">
	
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
	function loadProfile(){

        location.href = "test.php";
 	}
 		function addCourse(){

        location.href = "add.php";
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
	<style>
		ul.nav {
  			list-style-type: none;
  			margin: 0;
  			padding: 0;
		}
	</style>
</head>
<body>
    
    <div class="headerP"> Group 14 Institute </div>
  



<!-- Top Navigation Menu -->
<div class="topnav" id="nav">
<div class="name">
  <?php
echo"<td>  ".$row["First_Name"]."  ".$row["Last_Name"]."</td>";


?>
</div>
  <a href="" class="active"> &nbsp &nbsp &nbsp &nbsp   Add Course &nbsp &nbsp &nbsp &nbsp 
</a>
   
  <div id="myLinks" >
    <a onclick='abc(event)' href="test.php">My Profile</a>
    <a href="#contact">Drop Course</a>
    <a href="#about">View Schedule</a>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
 
</div>


<div class="optionsP">
        
    <ul class="nav">
       <li> <button class="buttonP" onClick="loadProfile()" style="font-size: 20px;" ><p>My Profile</p></button></li>
       <li> <button class="buttonP" onclick="addCourse()"style="font-size: 20px;" ><p>Add<p></button></li>
       <li> <button class="buttonP" onClick="loadProfile()" style="font-size: 20px;" ><p>Drop Course</p></button></li>
       <li> <button class="buttonP" onclick="addCourse()" style="font-size: 20px;"><p>View Schedule<p></button></li>
    </ul>
        
    </div>
    <div class="space"></div>
    <div class="targetP" >
            <!-- This is where test2.php should be inserted -->
        

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
        <button class="editButton"> Edit Profile </button>
    </div>
     <div class="footer">
<?php

new_footer("CSCI_387 Team");
$stmt -> close();
Database::dbDisconnect();

?>
</div>
</body>
</html>