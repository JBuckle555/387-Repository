<?php


require_once('/home/group14/DataBase387.php');

class Database {

	private static $mysqli = null;

	public function __construct() {
		die('Init function error');
	}

	//connect to database 
	public static function dbConnect() {
		try {
			$mysqli = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,USERNAME,PASSWORD);
		} catch ( PDOEXCEPTION $Exception ) {
			echo "Could not Connect";
		}

		return $mysqli;
	}

	public static function dbDisconnect() {
		$mysqli = null;
	}
}
?>
