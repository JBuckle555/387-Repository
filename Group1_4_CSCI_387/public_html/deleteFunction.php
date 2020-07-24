<?php
require_once("session.php");
require_once("functions.php");
require_once("database.php");
verify_login();

$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if (($output = message()) !== null) {
    echo $output;
  }

if (isset($_GET['classID'])&&isset($_GET['StudentID'])){
  if(	$_SESSION['userType']=='I') {
    $query = "SELECT InstructorID FROM Class WHERE ClassID =?";
    $stmt = $mysqli -> prepare($query);
    $stmt -> execute([$_GET['classID']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row['InstructorID']!=$_SESSION['id'] ){
        $_SESSION["message"] = "You do not have permission to drop this student";
        redirect("instructor.php");
    }

  }



      $query = "BEGIN;
                SET FOREIGN_KEY_CHECKS = 0;
                DELETE FROM Enrollment WHERE StudentID = ? AND ClassID = ?;
                SET FOREIGN_KEY_CHECKS = 1;
                COMMIT";
		   $stmt = $mysqli -> prepare($query);
		   $stmt -> execute([$_GET['StudentID'],$_GET['classID']]);

    if ($stmt) {
      if(	$_SESSION['userType']=='S') {
        $_SESSION["message"] = "Class deleted";
      }else{
        $_SESSION['message'] = "This student has been dropped from this course";
      }
    		}
    		else {
    			$_SESSION["message"] = "Error! Could not delete";
    		}

    if(	$_SESSION['userType']=='S') {//If this is student
          redirect("delete.php");
        }else{ // If this is instructor
          redirect("instructor.php");
        }

}
?>
