<?php
require_once("functions.php");
require_once("database.php");

  $mysqli = Database::dbConnect();
  $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
			<title> Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="stylesheets/home.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
   
  } );
  function startday(){

location.href = "startday.php";
}
function endday(){

location.href = "endday.php";
}
  </script>
  </head>
<body style="background-color:#e0dfda">

<?php

 /*  if (isset($_POST["startday"])) {
    $query = "SET FOREIGN_KEY_CHECKS = 0;
    INSERT INTO dailyrecord (id,Date) VALUES (?,?);

    SET FOREIGN_KEY_CHECKS = 1;";
$stmt = $mysqli -> prepare($query);
$stmt -> execute([0,date("Y/m/d")]);

if($stmt){
  
}

  }*/

  if (isset($_POST["submit"])) {
    if(($_POST["ticketNum"]!=="")&&($_POST["Name"]!=="")&&($_POST["Price"]!=="")&&($_POST["totalTicks"]!=="")){
        $array = str_split($_POST["ticketNum"]);
        $length=count($array);
        $number=(($array[0]*1000)+($array[1]*100)+($array[2]*10)+$array[3]);
        
      $query = "SET FOREIGN_KEY_CHECKS = 0;
            INSERT INTO newticket (ticketNum, Name, Price,totalTicks) VALUES (?,?,?,?);

            SET FOREIGN_KEY_CHECKS = 1;";
      $stmt = $mysqli -> prepare($query);
      $stmt -> execute([$number,$_POST["Name"],$_POST["Price"],$_POST["totalTicks"]]);


    if ($stmt){
       
    
  }else{
    
    echo 'babal';
  }
}
    else{
      echo "<h3 style='color:red'>Please fill out complete information!</h3>";
    }
}
elseif(isset($_POST["activate"])){
  
    if(($_POST["boxnum"]!=="")&&($_POST["booknumber"]!=="")){
      $array = str_split($_POST["booknumber"]);
      $length=count($array);
      
      if($length==14){
        
        $number=(($array[0]*1000)+($array[1]*100)+($array[2]*10)+$array[3]);
        $query7="SELECT * FROM newticket  WHERE ticketNum=$number";
        $stmt7 = $mysqli -> prepare($query7);
        $stmt7->execute();
        $rows7=$stmt7->rowCount();
        if($rows7==1){
           $ticketnumber=($_POST["booknumber"]-($array[10]*1000)-($array[11]*100)-($array[12]*10)-$array[13])/10000;
     
          $query6="SELECT * FROM activated  WHERE number=$ticketnumber";
          $stmt6 = $mysqli -> prepare($query6);
          $stmt6->execute();
          $rows6=$stmt6->rowCount();
       
       
          if($rows6==0){
             $box=$_POST["boxnum"];
           
 
             date_default_timezone_set('America/Mexico_City');
             $query3 = "SET FOREIGN_KEY_CHECKS = 0;
             INSERT INTO activated (number,Date,box) VALUES (?,?,?);

             SET FOREIGN_KEY_CHECKS = 1;";
             $stmt3 = $mysqli -> prepare($query3);
             $stmt3 -> execute([$ticketnumber,date("Y/m/d"),$_POST["boxnum"]]);
             $stmt3->closeCursor();
             if($stmt3){
                 $query1 = "SELECT * FROM dailyrecord  WHERE ticketNum=$box AND DATE(Date) = CURDATE()";
                	$stmt1 = $mysqli -> prepare($query1);
                  $stmt1->execute();
  
                  $rows=$stmt1->rowCount();
                  $new=$rows['totalActivated']+1;
  
                  $query ="BEGIN;
                  SET FOREIGN_KEY_CHECKS = 0;
                   UPDATE dailyrecord SET  totalActivated=totalActivated+1 where ticketNum=? AND DATE(Date) = CURDATE();
                  SET FOREIGN_KEY_CHECKS = 1;
                   COMMIT;
                    ";
                 $stmt = $mysqli -> prepare($query);
                 $stmt -> execute([$_POST['boxnum']]);
                 echo "<h3 style='color:blue'>Successfull!</h3>";

             }
             else{

             }
          }
          else{
             echo "<h3 style='color:red'>The book is already activated!</h3>";
          }
      } 
      else{

        echo "<h3 style='color:red'>The lottery is not recognised! Please save the ticket first as a new in the system.</h3>";
      }
    }
    
    else{
        echo "<h3 style='color:red'>Please scan book properly! There should be 14 digits number.</h3>";
      }
}
else{
  echo "<h3 style='color:red'>Please fill the both boxes!</h3>";
}
}
?><div class="topnav">
  
  <button style="margin-left:12px" class="buttonP" onClick="startday()" id="viewGrade"><p>Start Day</p></button>
		<button class="buttonP" onClick="endday()" ><p>End Day<p></button>

  
    </div>
    <br>
<div class="manage">
  <br>
<div class="activateticket">
 
<h3 style="height: 40px;margin-top:0px;background-color:#589cf5"> Activate the Ticket</h3>
<?php
 echo "<form method='POST' action='home.php' >";
  echo"<table>";
  echo "<tr>";
  echo "<td>Box</td>";
  echo"  <td><input type=text name = 'boxnum' value = '' /></td>";
  echo"  </tr>";
  echo "<tr>";
  echo "<td>Scan</td>";
  echo"  <td><input type=text name = 'booknumber' value = '' /></td>";
  echo"  </tr>";

 
  

  echo"</table>";
  echo "<br>";
  echo "<button class='buttonC' type='submit' name='activate' > Activate</button>";
  echo"</form>";
  
 
        ?>
        </div>
<div class="newticket"> 
 
<h3 style="height: 40px;margin-top:0px;background-color:#589cf5">Save new ticket type in the system </h3>

<?php

echo "<form method='POST' action='home.php' >";
  echo"<table>";
  echo "<tr>";
  

  echo "<tr>";
  echo "<td>Name</td>";
  echo"  <td><input type=text name = 'Name' value ='' /></td>";
  echo"  </tr>";


 


  echo"<tr>";
  echo"<td>Price</td>";

  echo"<td><input type=text name = 'Price' value ='' /></td>";


  echo"</tr>";


  echo"  <tr>";
  echo"<td>Total Tickets</td>";
  echo"<td><input type=text name= 'totalTicks' value ='' /></td>";
  echo"</tr>";


  echo "<td>Book Number(Scan)</td>";
  echo"  <td><input type=text name = 'ticketNum' value = '' /></td>";
  echo"  </tr>";

  echo"</table>";
  echo "<br>";
  echo "<button style='text-align:center' class='buttonC' type='submit' name='submit' > Submit</button>";
  echo"</form>";
  
?>
</div>

</div>
<br>
<div class="viewdata">
  <br>
  <?php
  echo "<form autocomplete='off' method='POST' action='home.php'>";
echo "<p> &nbsp Date: <input name='date' type='text' id='datepicker' > <button  class='buttonC' type='submit' name='datebutton' > View Record</button></p> ";

echo "</form>";
?>
  <br>
  <div class="table">
<?php
if(isset($_POST["datebutton"])){
  if(($_POST["date"]!=="")){
    
    $date=$_POST["date"];
    $datereal=DATE($date);
  }
  
}
elseif($_POST["date"]==""){
    date_default_timezone_set('America/Mexico_City');
    $datereal=date("Y/m/d");
  }
 
  date_default_timezone_set('America/Mexico_City');
$query2 ="SELECT * from dailyrecord WHERE Date=?";
$stmt4 = $mysqli -> prepare($query2);
$stmt4 -> execute([$datereal]);
$row2 = $stmt4->rowCount();

 
  if($row2==0){
    echo "<h3 style='color:red'>No data for the day ".$datereal."</h3>";
  }
elseif ($stmt4) {
    
    echo "<center>";
    echo "<table id='endtable' style='text-align:center'>";
    echo "<thead>";
    echo "</thead>";
    echo "<tbody style='text-align:center'>";
   echo "Date: ".$datereal."";
   echo "<tr>";
   echo "<th>Box#</th>";
        
        echo "<th>Start </th>";
        echo "<th>End </th>";
        echo "<th>Total Activated </th>";
        echo "<th>Total Sale </th>";
        

        
        echo "</tr>";
        $sum=0;
        $books=0;
   
    while($row1 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
        
        echo "<tr>";
        echo "<td>".$row1["ticketNum"]." </td>";
        
        echo "<td>".sprintf('%03d',$row1["start"])." </td>";
        echo "<td>".sprintf('%03d',$row1["end"])." </td>";
        echo "<td>".$row1["totalActivated"]." </td>";
        echo "<td>".$row1["sum"]." </td>";
        $books=$books+$row1["totalActivated"];
        $sum=$sum+$row1["sum"];
        
        echo "</tr>";
}
echo "<tr style='background: #a19c9c'>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td>Total Books Activated: ".$books."</td>";
 echo "<td>Total Sale:$ ".$sum."</td> ";
 echo "</tr>";
    echo "  </tbody>";
    echo "</table>";
    echo "</center>";
    
}

?>
</div>
<br>
<div class="viewactivatedticket">
  <br>

  
  <div class="table">
<?php
if(isset($_POST["datebutton"])){
  if(($_POST["date"]!=="")){
    
    $date=$_POST["date"];
    $datereal=DATE($date);
  }
  
}
elseif($_POST["date"]==""){
    date_default_timezone_set('America/Mexico_City');
    $datereal=date("Y/m/d");
  }
 
  date_default_timezone_set('America/Mexico_City');
$query2 ="SELECT * from activated WHERE Date=?";
$stmt4 = $mysqli -> prepare($query2);
$stmt4 -> execute([$datereal]);
$row2 = $stmt4->rowCount();

 
  if($row2==0){
    echo "<h3 style='color:blue'>No Ticket Activated! ".$datereal."</h3>";
  }
elseif ($stmt4) {
    
    echo "<center>";
    echo "<table id='endtable' style='text-align:center'>";
    echo "<thead>";
    echo "</thead>";
    echo "<tbody style='text-align:center'>";
   echo "Books Activated on Date: ".$datereal."";
   echo "<tr>";
   echo "<th>Box#</th>";
        
        echo "<th>Name </th>";
        echo "<th>Book Number </th>";
        
        

        
        echo "</tr>";
        $sum=0;
        $books=0;
   
    while($row1 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
      $array = str_split($row1["number"]);
      $max=count($array)-6;
      $number=0;
      $i=$max;
      for ($x = 0; $x < $max; $x++) {
        $number=$number+($array[$x]*pow(10,$i-1));
        $i=$i-1;
      }
      
      $query3 ="SELECT * from newticket WHERE ticketNum=?";
      $stmt5 = $mysqli -> prepare($query3);
      $stmt5 -> execute([$number]);
      $row2 = $stmt5->fetch(PDO::FETCH_ASSOC);
        echo "<tr>";
        echo "<td>".$row1["Box"]." </td>";
        echo "<td>".$row2["Name"]."</td>";
        echo "<td>".sprintf('%010d',$row1["number"])." </td>";
        
        
        
       
        
        echo "</tr>";
}

    echo "  </tbody>";
    echo "</table>";
    echo "</center>";
    
}

?>
</div>
<br>
</div>
</body>
</html>