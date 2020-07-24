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

    if (isset($_POST["submit"])) {
      if(($_POST["First_Name"]!=="")&&($_POST["Last_Name"]!=="")&&($_POST["Email"]!=="")&&($_POST["Birthday"]!=="")&&($_POST["Degree"]!=="")){
        $query = "BEGIN;
                  SET FOREIGN_KEY_CHECKS = 0;
                  UPDATE Student SET First_Name =?, Last_Name =?, Email =?, Birthday =?, Degree =? where StudentID =?;
                  SET FOREIGN_KEY_CHECKS = 1;
                  COMMIT;
                  ";
        $stmt = $mysqli -> prepare($query);
        $stmt -> execute([$_POST["First_Name"],$_POST["Last_Name"],$_POST["Email"],$_POST["Birthday"],$_POST["Degree"],$_SESSION["id"]]);


      if ($stmt){
        $_SESSION['message'] = "Your Profile is updated";
      redirect ('test.php');
    }else{
      $_SESSION['message'] = "Error! Cannot update profile";
      redirect('editProfile.php');
    }
  }else{
    $_SESSION['message'] = "Please do not leave any fields blank";
    redirect('editProfile.php');
  }


}


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

</head>
<body>

    <div class="headerP"> Group 14 Institute </div>




<!-- Top Navigation Menu -->
<div class="topnav" id="nav">
 <button class="buttonP" onClick="loadProfile()" ><p>My Profile</p></button>
			 <button class="buttonP" onclick="addCourse()" ><p>Add Course<p></button>
			<button class="buttonP" onClick="deleteCourse()"  ><p>Drop Course</p></button>
			<button class="buttonP" onclick="viewSchedule()" ><p>View Schedule<p></button>

<div class="name">
<div class="user">
  <?php
  $query = "SELECT * FROM Student WHERE StudentID = ? LIMIT 1";
  $stmt = $mysqli -> prepare($query);
  $stmt -> execute([$_SESSION["id"]]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

echo"<td class='user'>  ".$row["First_Name"]."  ".$row["Last_Name"]."</td>";
?>
</div>
<?php

  echo "<td><input style='height:20px;width:50px;font-size:10px; padding-bottom:15px;' class='logout' type='button' value='Logout' onclick='logout()'></td>";

?>

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

echo "<form method='POST' action='editProfile.php'>";
  echo"<table>";
  echo "<tr>";
  echo "<td>First Name</td>";
  echo"  <td><input type=text name = 'First_Name' value = {$row["First_Name"]} /></td>";
  echo"  </tr>";

  echo "<tr>";
  echo "<td>Last Name</td>";
  echo"  <td><input type=text name = 'Last_Name' value = {$row["Last_Name"]} /></td>";
  echo"  </tr>";


  echo"<tr>";
  echo"<td>Student ID</td>";
  echo"<td>".$_SESSION["id"]."</td>";
  echo"</tr>";


  echo"<tr>";
  echo"<td>Email</td>";

  echo"<td><input type=text name = 'Email' value = {$row["Email"]} /></td>";


  echo"</tr>";


  echo"  <tr>";
  echo"<td>Date of Birth</td>";
  echo"<td><input type=date name = 'Birthday' value = {$row["Birthday"]} /></td>";
  echo"</tr>";


  echo"<tr>";
  echo"<td>Degree</td>";
  echo"<td><input type=text name = 'Degree' value = {$row["Degree"]} /></td>";
  echo"</tr>";

  echo"</table>";
  echo "<button class='editButton' type='submit' name='submit'> Submit</button>";
  echo"</form>";

        ?>

    </div>
     <div class="footer">
<?php

new_footer("CSCI_387 Team");
Database::dbDisconnect();

?>

</div>
</body>
</html>
