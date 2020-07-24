<?php
require_once("session.php");
require_once("functions.php");
require_once("database.php");
new_header_profile("Add Course");
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
		<button class="buttonP"  onclick="logout()" ><p>Logout<p></button>
	</div>
  	<a href="" class="active"> &nbsp &nbsp &nbsp &nbsp   Add Course &nbsp &nbsp &nbsp &nbsp</a>

  <div id="myLinks" >
    <a onclick='abc(event)' href="test.php">My Profile</a>
    <a onclick='abc(event)' href="delete.php">Drop Course</a>
    <a onclick='abc(event)' href="viewSchedule.php">View Schedule</a>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>

</div>
    <div class="targetP" >

      <title>Add Classes</title>
			<br>
  		<h1 id = "title" style="text-align: left; margin-top:0px;">Add Classes to Schedule</h1>
  		<hr>
  	<?php
  		if (($output = message()) !== null) {
				echo $output;
			}
  		?>
			<div class="search">
    		<form action="" method="POST">
					<label>Search Class</label>
						<input id="course-search" type="text"  placeholder="Course code" value="">
					<label>Section:</label>
						<input id="section" type="text" placeholder="Section ID" value="">
						<input type="button" value ="Search" onclick="searchCourse()"/>
  			</form>
			</div>
	<div id="Courses" >
					</div>

	 <div id = "classes">
	   <div>test</div>

	   <?php
     $submitButton = $_POST['answer'];
      if($submitButton){
        redirect("addCourse.php");
      }
      ?>
	</div>

	<div class="push"></div>

    </div>
			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	     <script src="Javascript/instruct.js"></script>
	     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

<div class="footer">
<?php
new_footer("CSCI_387 Team");
Database::dbDisconnect();
?>
</div>


</body>
</html>
