

<?php
require_once("session.php");
require_once("functions.php");

require_once("database.php");
new_header_profile("Home");
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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Home </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

 	<link rel="stylesheet" href="stylesheets/profileTest.css">
 	<link rel="stylesheet" href="stylesheets/mobilestyle.css">
	 <link rel="stylesheet" type="text/css" href="stylesheets/Add.css">
	 <link rel="stylesheet" href="stylesheets/courseView.css">



	
</head>
<body>

<div class="headerP">
	<img onclick="loadHome()" style="
  margin-right: auto;
  width: 15%;padding-bottom: 1%;"src="images/logo.png" alt="Ole Miss Logo">
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

</div>
<div class="options">

        <button class="button" onClick="loadProfile()" style="font-size: 20px;" id="viewGrade"><p>My Profile</p></button>
        <button class="button" onclick="addCourse()"style="font-size: 20px;" ><p>Add<p></button>
       <button class="button" onClick="loadProfile()" style="font-size: 20px;" ><p>Drop Course</p></button>
        <button class="button" onclick="addCourse()" style="font-size: 20px;"><p>View Schedule<p></button>
   
    </div>

    <div class="target" style="text-align: center; font: 30px;"><br><br><br>Welcome to the Course Registration App! </div>

     <div class="footer">

<?php

new_footer("CSCI_387 Team");

Database::dbDisconnect();

?>
</div>
</body>
</html>
