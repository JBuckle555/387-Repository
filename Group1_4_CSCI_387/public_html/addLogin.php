<?php


	require_once("session.php");
	require_once("functions.php");
	require_once("database.php");


    echo "<link rel='stylesheet' href='stylesheets/styles.css'>";
		echo "<link rel='stylesheet' href='stylesheets/alert.css'>";
	$mysqli = Database::dbConnect();
	$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if (($output = message()) !== null) {
		echo $output;
	}

new_header("Add Users 387");
	if (($output = message()) !== null) {
		echo $output;
	}
 ///////////////////////////////////////////////////////////////////////////////////////////////
 			//Adding User function
if (isset($_POST["submit"])) {
	if (isset($_POST["username"]) && $_POST["password"] !== ""){
		$password = password_encrypt($_POST["password"]);


		$query = "SELECT * FROM Users WHERE userName = ?";


		$stmt = $mysqli -> prepare($query);
		$stmt -> execute([$_POST["username"]]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if($stmt->rowCount() > 0) {  //Check if this username already exists in database
			$_SESSION["message"] = "The username already exists";
			redirect("addLogin.php");
		}

		else{ //If username does not exist, we start adding this username
			//We must stop foreign key check because userID is refering to a non-existence Student or Instructor
			// In the future, we must also create a student or instructor who inherists the userID that just created

			$query = "SET FOREIGN_KEY_CHECKS = 0;
								INSERT INTO Users (userName, hashed_password, userType) VALUES (?,?,?);

								SET FOREIGN_KEY_CHECKS = 1;";
			$stmt = $mysqli -> prepare($query);
			$stmt -> execute([$_POST["username"], $password, $_POST["usertype"]]);

			if($stmt) {
				//////////////////If the new user is student, we first grab the id of the new user, then create a new Student using that ID/////////////
				if($_POST["usertype"]=='S'){
					$query = "SELECT max(userID) as newID FROM Users";

					$stmt = $mysqli -> prepare($query);
					$stmt -> execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);

					$query2 = "SET FOREIGN_KEY_CHECKS = 0;
										INSERT INTO Student (StudentID) VALUES (?);
										SET FOREIGN_KEY_CHECKS = 1;";
					$stmt = $mysqli -> prepare($query2);
					$stmt -> execute([$row['newID']]);




					$_SESSION["message"] = "Student ".$row["newID"]." successfully created";

				}else{
					$_SESSION["message"] = "An Instructor or Admin was created";
				}


			}
			else {
				$_SESSION["message"] = "User could not be created";
			}
		redirect("addLogin.php");
		}

	}else{
			$_SESSION["message"] = "Please fill in all data";
			redirect ("addLogin.php");
	}
}


////////////////////////////////////////////////////////////////////////////////////////////////
?>



		<h1 class = "logo-text">Add Users to 387!</h1>
<!--/////////////////////////////////////////////////////////////////////////////////////////////// -->
		<!-- FORM INPUT -->
<center>
	<form action="addLogin.php" method="post" background-color="white">
		<table>
			<tr>

			<tr>
			<td>Username:</td>
			<td><input type="text" name="username" value=""></td>
			</tr>
			<tr>
			<td>Password:</td>
			<td><input type="password" name="password" value=""></td>
			</tr>
			<tr>
				<td>User Type:</td>
				<td>
					<select class="dropdown" name="usertype">
					<option value="S">Student</option>
					<option value="I">Instructor</option>
					<option value="A">Admin</option>
				</select>
			</td>
			</tr>
		</table>
		<button type="submit" name="submit"> Add</button>
	</form>


<!--///////////////////////////////////////////////////////////////////////////////////////////////// -->
		<!-- A list of all current Users -->
			<p><br /><br /><hr />
			<h1 class = "logo-text">Current User</h1>

	<?php
	$query ="SELECT * from Users";
	$stmt = $mysqli -> prepare($query);
	$stmt -> execute();

	if ($stmt) {
		echo "<div class='row' style='text-align:center;margin-left:42%;'>";
		echo "<center>";
		echo "<table style='text-align:center'>";
		echo "<thead>";
		echo "</thead>";
		echo "<tbody style='text-align:center'>";
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr><td>".$row["userName"]."</td>";

			echo "<td><a href='deleteLogin.php?id=".urlencode($row[id])."' onclick='return confirm('Are you sure you want to delete?')'>Delete</a></td>";
			echo "</tr>";
	}
		echo "  </tbody>";
		echo "</table>";
		echo "</center>";
		echo "</div>";
	}
	echo "<br /><button id = 'back' type = 'button'>Back to main page</button>";
	?>
<!--//////////////////////////////////////////////////////////////////////////////////////////////// -->

	</div>
	</label>
</center>
<?php
new_footer("CSCI_387 Team");
Database::dbDisconnect();
?>
