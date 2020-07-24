<?php
require_once("session.php");
require_once("functions.php");

require_once("database.php");
new_header_profile("Profile");
echo "<link rel='stylesheet' href='stylesheets/alert.css'>";

$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "SELECT * FROM Student WHERE StudentID = ? LIMIT 1";
$stmt = $mysqli -> prepare($query);
$stmt -> execute([$_SESSION["id"]]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);


?>





<body>

<img src="https://www.pngkey.com/png/full/230-2301779_best-classified-apps-default-user-profile.png" alt="User Image">
<br><br>
<?php
  echo"<table>";
  echo"<td>Name</td>";
  echo "";
  echo"  <td>".$row["First_Name"]."  ".$row["Last_Name"]."</td>";

  echo"  </tr>";
  echo"<tr>";
  echo  "<td>Student ID</td>";
  echo"  <td>".$_SESSION["id"]."</td>";



    echo"</tr>";
    echo"<tr>";
  echo"<td>Email</td>";
  echo"<td>".$row["Email"]."</td>";
  echo"</tr>";
  echo"  <tr>";
  echo"<td>Date of Birth</td>";
  echo"<td>".$row["Birthday"]."</td>";
  echo"</tr>";
  echo"    <tr>";
  echo"<td>Degree</td>";
  echo"<td>".$row["Degree"]."</td>";
  echo"</tr>";
  echo"</table>";
?>
<button class="editButton"> Edit Profile </button>

</body>

<?php

new_footer("CSCI_387 Team");
$stmt -> close();
Database::dbDisconnect();

?>
