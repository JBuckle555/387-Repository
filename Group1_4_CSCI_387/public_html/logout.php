<?php

	require_once("session.php");
	require_once("database.php");
  require_once("functions.php");
	verify_login();

if(!isset($_SESSION["id"])) {
	$_SESSION["message"] = "You must login in first!";
	redirect("main.php");
}


if (($output = message()) !== null) {
	echo $output;
}
/////////////////////////////////////////////////////////////////////////////////////////
	 $_SESSION["id"] = NULL;
////////////////////////////////////////////////////////////////////////////////////////

  $_SESSION["message"] = "Log out Success";
 redirect("main.php");

 ?>
