<?php
require_once("session.php");
require_once("functions.php");
require_once("database.php");
new_header("Login");
echo "<link rel='stylesheet' href='stylesheets/alert.css'>";

$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (($output = message()) !== null) {
		echo $output;
	}

  if (isset($_POST["submit"])) {
    if (isset($_POST["username"]) && $_POST["password"] !== ""){

      $query = "SELECT * FROM Users WHERE username = ? LIMIT 1";
      $stmt = $mysqli -> prepare($query);
      $stmt -> execute([$_POST["username"]]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if($stmt) {  //Check if we have a username in database

        if(password_check($_POST["password"], $row["hashed_password"])){ //Check password on that username

				//	$_SESSION["username"] = $_POST["username"];
					//Store the ID of the one who log in so we can pull their data
					$_SESSION["id"] = $row["userID"];
					$_SESSION['userType'] = $row["userType"];
						if($row["userType"]=='S'){
							redirect("studentTest.php");
						}
						else if ($row["userType"]=='I'){
							redirect("instructor.php");
						}
						else{
							redirect("admin.html");
						}

        }else{ // If password does not match
          $_SESSION["message"] = "Username/Password could not be found";
          redirect ("main.php");
        }

      }else{ // If username does not exist in database
        $_SESSION["message"] = "Username/Password could not be found";
        redirect ("main.php");
        }


      }else{ // If username/ password are empty
				$_SESSION["message"] = "Please log in first";
				redirect ("mainTest.php");
			}
  }

?>
<!-----------End of PHP ---------------------------------->

<body class="container" >
<center>


<div class="text-center" style="padding:10%; margin-top: 5%;">
	<div class="logo">Login</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="login-form" class="text-left" action="main.php" method="post">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username" class="sr-only">Username</label>
						<input type="text" class="form-control" id="lg_username" name="username"placeholder="Username" required=""
						oninvalid="this.setCustomValidity('Username Field Empty')"
 						oninput="setCustomValidity('')">
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password" name="password" placeholder="Password" required=""
						oninvalid="this.setCustomValidity('Password Field Empty')"
 						oninput="setCustomValidity('')">
					</div>
					<div class="form-group login-group-checkbox">
						<input type="checkbox" id="lg_remember" name="lg_remember">
						<label for="lg_remember">remember</label>
					</div>
				</div>
				<button type="submit" class="login-button" name="submit" id="Submit"><i class="fa fa-chevron-right"></i>Login</button>
			</div>
			<!-- <div class="etc-login-form">
				<p>New User? <a href="addLogin.php">Create new account</a></p>
			</div> -->
		</form>
	</div>
	</div>
</div>
</center>
</body>

<?php

new_footer("CSCI_387 Team");

Database::dbDisconnect();


 ?>
