
<?php
require_once("session.php");
require_once("functions.php");
require_once("database.php");
verify_login();

if (($output = message()) !== null) {
		echo $output;
	}

  $mysqli = Database::dbConnect();
  $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = "SELECT * FROM Instructor WHERE InstructorID = ? LIMIT 1";
  $stmt = $mysqli -> prepare($query);
  $stmt -> execute([$_SESSION["id"]]);

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<html class ="Instructor">
<head>
    <meta charset="utf-8">
    <title>Instructor</title>
		<link rel='stylesheet' href='stylesheets/alert.css'>
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
		<link rel="stylesheet" href="stylesheets/profile-testing.css">
		<link rel="stylesheet" href="stylesheets/instructor.css">
		
</head>
<body>
<div id="page-container">


<div id = 'headerP' style="display: inline-block;width: 100%; padding-bottom: 1%;">
    <img style="display: block; float:left;
  width: 20%;"src="images/logo.png" alt="Ole Miss Logo">
    <div id="instructorInfo">
			<?php
				echo"<h1 style='font-size:20px; float:right;'class='Instructor-Name'>".$row["First_Name"]."  ".$row["Last_Name"]."</h1>";
				echo"<h2 style='font-size:15px; float:right; margin-top:2%;margin-left:100px;' class='Instructor-ID'>ID:  ".$_SESSION["id"]."</h2>";
  			?>
			  	<button class="btn btn-outline-dark" style='height:20px;width:65px;font-size:10px; padding-bottom:20px;display: block; float:right;margin-top:2%;' onclick="logout()">Log out</button>
		</div>
 </div>



	<div class="container" id="page-container">
	  <div class="row">
<style type="text/css">
	#headerP {
    padding: 15px;
    margin: 0px;
    text-align: left;
    background: linear-gradient(90deg, #3F2B96 0%, #A8C0FF 100%);
    font-size: 40px;
    font-family: Apple Chancery, cursive;
    font-weight: bold;
    height: 13%;
    color: white;
	}

}
</style>

	    <div class="col">
	    	<hr><p class="searchTitles" style="font-size: 20px;">Search Students By Name<p/><hr>
	    	<label>Student Search</label>
		      <input id="search" type="text" name="Student-Search" placeholder="Student Search..." value="" class ="auto">

		      <input type='hidden' id='studentID' />

		      <input type="button" class="btn btn-outline-primary" name="answer" value="Search" onclick="searchStudent(document.getElementById('studentID').value)" />

		      <div class="Instructor-Info">
			    <label for="Instructor-Info">Student Info</label>
		      <input class="btn btn-primary" type="button" id="showinfo" value="Show" onclick="infoShow()">
		      <input class="btn btn-primary" type="button" id="hideinfo" value="Hide" onclick="infoHide()">
		 	</div>


		 	<div id=SearchBox>
			</div>
	    </div>


	    <div class="col">
	    	<hr><p class="searchTitles" style="font-size: 20px;">Search Students By Courses<p/><hr>
			  	<div class="Course" >
					<div class="Courser-Info" >
					    <!--<label for="Course-Info">Course Info</label>
					    <select id="Course-Info" name="courses-display" class="Course-control" name="Info">
					      <option value="Enrolled">Current</option>
					      <option value="Favorite">Next</option>
				      -->
					    <label>Course Search</label>
					    <input id="course-search" type="text"  placeholder="Course code" value="">
					    <input type="button" class="btn btn-outline-primary" value ="Search" onclick="searchCourse()"/>
					    <br>
					    <label>Section:</label>
					    <input id="section" type="text" placeholder="Section ID" value="">
					    <br>
					    <label for="Instructor-Info">Course Info</label>
					    <input class="btn btn-primary" type="button" id="show" value="Show" onclick="courseInfoShow()">
					    <input class="btn btn-primary" type="button" id="hide" value="Hide" onclick="courseInfoHide()">
					</div>

					<div id="Courses" >
					</div>

				    
				</div>
	    </div>


	  </div>

	</div>
		  <?php

new_footer("CSCI_387 Team");
Database::dbDisconnect();
 ?>
</div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="Javascript/instruct.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

</body>
</html>
