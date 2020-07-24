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
///////////////////////////////////////////////////////////////////////////////////

if (isset($_GET["id"]) && $_GET["id"] !== "") {
	  $query = "SELECT * FROM Users WHERE userID = ?";
		$stmt = $mysqli -> prepare($query);
		$stmt -> execute([$_GET["id"]]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row['userType']==S){
        $query2 = "BEGIN;
                  SET FOREIGN_KEY_CHECKS = 0;
                  DELETE FROM Enrollment where StudentID = ?;
                  DELETE FROM Favorite where StudentID =?;
                  SET FOREIGN_KEY_CHECKS = 1;
                  COMMIT;";
          $stmt2 = $mysqli -> prepare($query2);
          $stmt2 -> execute([$_GET["id"]]);
    }

}


if ($stmt) {
			$_SESSION["message"] = "Admin successfully deleted";


		}
		else {
			$_SESSION["message"] = "Error! Could not delete admin";

		}



	redirect("addLogin.php");


	Database::dbDisconnect();


?>
