<head>
<link rel="stylesheet" href="stylesheets/home.css">

</head>
<body OnLoad="document.myform.ticket.focus();">
<?php
require_once("functions.php");
require_once("database.php");

  $mysqli = Database::dbConnect();
  $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  

  if (isset($_POST["submit"])) {
    if(($_POST["ticket"]!=="")){
      
        $array = str_split($_POST["ticket"]);
        $length=count($array);
        $number=(($array[0]*1000)+($array[1]*100)+($array[2]*10)+$array[3]);
        $query7="SELECT * FROM newticket  WHERE ticketNum=$number";
        $stmt7 = $mysqli -> prepare($query7);
        $stmt7->execute();
        $rows7=$stmt7->rowCount();
        $price=$row7['Price'];
        $rows7=$stmt7->rowCount();
        if($rows7==1 or $_POST["ticket"]==0){
        $start=(($array[10]*100)+($array[11]*10)+$array[12]);
        $sale=($row7["totalTicks"]-$start+1)*$row7["Price"];
        $date=date("Y/m/d");
	$query1 = "SELECT * FROM dailyrecord  WHERE DATE(Date) = CURDATE()";
	$stmt1 = $mysqli -> prepare($query1);
  $stmt1->execute();
  date_default_timezone_set('America/Mexico_City');
  $rows=$stmt1->rowCount();
      $query = "SET FOREIGN_KEY_CHECKS = 0;
            INSERT INTO dailyrecord (start,date,ticketNum,totalActivated) VALUES (?,?,?,?);

            SET FOREIGN_KEY_CHECKS = 1;";
      $stmt = $mysqli -> prepare($query);
      $stmt -> execute([$start,date("Y/m/d"),$rows+1,0]);


    if ($stmt){
      
       
       
    
  }else{
    
    echo 'Cant update';
  }

}
  else{
    echo 'Ticket not activated!';
  }
}else{
 
  echo "no blank please";
}


}
echo "<form name='myform' method='POST' action='startday.php' >";
  echo"<table >";
  echo "<tr>";
  echo "<td>Scan Ticket</td>";
  echo"  <td><input type=text name = 'ticket' value = '' /></td>";
  
  echo"  </tr>";

 


  

  echo"</table>";
  echo "<button style='display:none' class='editButton' type='submit' name='submit' > Submit</button>";
 
  echo"</form>";
  $query2 ="SELECT * from dailyrecord WHERE DATE(Date)=CURDATE()";
  $stmt = $mysqli -> prepare($query2);
  $stmt -> execute();

  if ($stmt) {
      
      echo "<center>";
      echo "<table id='endtable' style='text-align:center'>";
      echo "<thead>";
      echo "</thead>";
      echo "<tbody style='text-align:center'>";
     
     echo "<tr>";
     echo "<th>Box#</th>";
          
          echo "<th>Start </th>";
          echo "<th>End </th>";
          echo "<th>Total Activated </th>";
          echo "<th>Total Sale </th>";
          

          
          echo "</tr>";
      while($row1 = $stmt->fetch(PDO::FETCH_ASSOC)) {
          
          echo "<tr>";
          echo "<td>".$row1["ticketNum"]." </td>";
         
          echo "<td>".$row1["start"]." </td>";
          echo "<td>".$row1["end"]." </td>";
          echo "<td>".$row1["totalActivated"]." </td>";
          echo "<td>".$row1["sum"]." </td>";
          

          
          echo "</tr>";
  }
      echo "  </tbody>";
      echo "</table>";
      echo "</center>";
      
  }
        ?>
        </body>