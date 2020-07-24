
<?php
  require_once("session.php");
  require_once("functions.php");
  require_once("database.php");

  $mysqli = Database::dbConnect();
  $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = "SELECT * FROM Student WHERE StudentID = ? LIMIT 1";
  $stmt = $mysqli -> prepare($query);
  $stmt -> execute([$_SESSION["id"]]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

 ?>

  <html class="testStd">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
    <meta charset="utf-8">
    <title>testStd</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="stylesheets/student.css">
	<script>
			$( ".content" ).load( "profile.php #projects li" );
</script>
  </head>
  <body>
  <input type="submit" onclick="loadpage();"
    
    
    <div class="content"></div>
         <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    
    <script src="loadpage.js"></script>


      

  </body>
</html>
<?php
  new_footer("CSCI_387 Team 1-4");
//$stmt -> close();
  Database::dbDisconnect();
 ?>

