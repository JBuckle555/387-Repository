<?php
require_once("session.php");
require_once("functions.php");
require_once('/home/group14/DataBase387.php');
	$mysqli = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,USERNAME,PASSWORD);
  $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if (($output = message()) !== null) {
	echo $output;
}

if (isset($_GET['department'])&&isset($_GET['courseID'])&&isset($_GET['classID'])){
				$query = "SELECT * from Enrollment natural join Class natural join Course where StudentID =? and Department_code=? and CourseID =?";
				$stmt = $mysqli -> prepare($query);
				$stmt -> execute([$_SESSION['id'],$_GET['department'],$_GET['courseID']]);

					//Check if the student already register for the same class
				if($stmt->rowCount() > 0 ) {
				$_SESSION["message"] =  "You cannot register multiple class of the same course";
				}
				else{

					$query = "SELECT * from Enrollment natural join Class WHERE ClassID =?";
					$stmt = $mysqli -> prepare($query);
					$stmt -> execute([$_GET['classID']]);
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					if(($stmt->rowCount() > 0) and($stmt->rowCount() >= $row['Total_Seat'])){
						echo  "".$stmt->rowCount()." and ".$row['Total_Seat']."";
							$_SESSION["message"] = "Class is full. Cannot register!";
						}else{
								$query2 = "INSERT INTO Enrollment(StudentID, ClassID) values(?,?)";
								$stmt2 = $mysqli -> prepare($query2);
								$stmt2 -> execute([$_SESSION['id'],$_GET['classID']]);
								if($stmt2){
									$_SESSION["message"] = "Register class successful";
								}else{
									$_SESSION["message"] = "Error! Cannot register";
								}
					}

				}

}
	redirect("add.php");
    ?>
