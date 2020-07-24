<html>
<head>

<link rel="stylesheet" href="stylesheets/home.css">

</head>
<body OnLoad="document.myform.ticket.focus();">
<?php
require_once("functions.php");
require_once("database.php");

  $mysqli = Database::dbConnect();
  $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $i=0;

  if (isset($_POST["submit"])&& isset($_POST['ticketNum'])) {
    if(($_POST["ticket"]!=="")){
        $array = str_split($_POST["ticket"]);
        $length=count($array);
        $number=(($array[0]*1000)+($array[1]*100)+($array[2]*10)+$array[3]);
        $end=(($array[10]*100)+($array[11]*10)+$array[12]);
        $query3="SELECT * from newticket WHERE ticketNum=$number";
        $stmt3=$mysqli -> prepare($query3);
        $stmt3 -> execute();
        if($stmt3){
        $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
        $rows7=$stmt3->rowCount();
       
        if($rows7==1 or $_POST["ticket"]==0){
        
        $price=$row3['Price'];
        $id=$_POST['ticketNum'];
        $query4="SELECT * from dailyrecord WHERE ticketNum=$id AND DATE(date)=CURDATE()";
        $stmt4=$mysqli -> prepare($query4);
        $stmt4 -> execute();
        $row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
         if($row4['start']==0 && $end!=0){

          $sale=(-($row3['totalTicks']-$end+1)*$price)+($row4['totalActivated']*300)+$row4["sum"];
        }
        elseif($row4['start']!=0 && $end==0){

          $sale=($row4['totalActivated']*300)+$row4["sum"];
        }
        elseif($row4['start']==0 && $end==0){
          $sale=($row4['totalActivated']*300)+$row4["sum"];
        }
        else{
           $sale=((-($row3['totalTicks']-$end+1)*$price)+($row4['totalActivated']*300))+$row4["sum"];
        }
           $query ="BEGIN;
      SET FOREIGN_KEY_CHECKS = 0;
      UPDATE dailyrecord SET  end=?, sum=? where ticketNum=? AND DATE(Date)=CURDATE(); 
      SET FOREIGN_KEY_CHECKS = 1;
      COMMIT;
      ";
      $stmt = $mysqli -> prepare($query);
      
      $stmt->execute([$end,$sale,$_POST['ticketNum']]);
      
      }
      else{
        echo "Please activate the book first!";
      }

    }}
  }

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
     echo "<th>Box# </th>";
          echo "<th>Date </th>";
          echo "<th>Start </th>";
          echo "<th>End </th>";
          echo "<th>Tickets Activated </th>";
          echo "<th>Total Sale </th>";
          

          $prev=1;
          echo "</tr>";
      while($row1 = $stmt->fetch(PDO::FETCH_ASSOC)) {
          
          echo "<tr>";
          echo "<td>".$row1["ticketNum"]." </td>";
          echo "<td>".$row1["Date"]." </td>";
          echo "<td>".$row1["start"]." </td>";
          if($row1["end"]!=""){
          echo "<td>".$row1["end"]." </td>";
          }
          elseif($prev!=''){
            echo "<form name='myform' 
            method='POST' action='endday.php' >";
            echo"  <td><input type=text name = 'ticket' value = '' /></td>";
            echo "<button style='display:none'class='editButton' type='submit' name='submit' 
            > Submit</button>";
            echo "<input type='hidden' name='ticketNum' value='".htmlspecialchars($row1['ticketNum'])."'/>";
            echo"</form>";  
            
          }
          else{
            echo "<td></td>";
          }
          $prev=$row1["end"];
          echo "<td>".$row1["totalActivated"]."</td>";
          echo "<td>".$row1['sum']."</td>";
          
          echo "</tr>";
  }
      echo "  </tbody>";
      echo "</table>";
      echo "</center>";
      
  }
        ?>
        </body>
        </html>