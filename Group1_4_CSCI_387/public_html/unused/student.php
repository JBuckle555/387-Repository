
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

  <html class="Student">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
    <meta charset="utf-8">
    <title>Student</title>
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="stylesheets/student.css">
  </head>
  <body>
    <div class="header"><h1>Group 14 Institute</h1></div>

    <?php
    echo"<div class='userHeader'>".$row['First_Name']." ||||||||||||| <button class = 'log-out-button' id ='log-out' type ='button'>Log out</button></div>";
    ?>

    <div class ="container">
    <div class="options">
      <button class="button3"><p><a href="profile.php" target="iframe_a">My Profile</a></p> </button><br>
      <button class="button2"><p><a href="addCourse.html" target="iframe_a">Add</a></button><br>
      <button class="button3"><p><a href="dropCourse.html" target="iframe_a">Drop</a></p> </button><br>
      <button  class="button4"><p><a href="viewSchedule.html" target="iframe_a">View Schedule</a></p> </button><br>
    </div>
    <div class="target">
      <iframe height="100%" width="100%" src="inst.html" name="iframe_a"></iframe>
    </div>
  </div>
      <br>

  </body>
</html>

<?php
  new_footer("CSCI_387 Team 1-4");
//$stmt -> close();
  Database::dbDisconnect();
 ?>
