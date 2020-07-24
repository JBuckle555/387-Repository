<?php
require_once("session.php");
require_once("functions.php");
require_once('/home/group14/DataBase387.php');
	$mysqli = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,USERNAME,PASSWORD);
  $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


///////////////////////////Auto Complete Suggestion//////////////////////////////
if (isset($_GET['input'])){
$return_arr = array();

try {
		$input = '%'.$_GET['input'].'%';
		$query = "SELECT * FROM Student WHERE advisorID = ? AND (First_Name LIKE ? or Last_Name LIKE ?) ";
		$stmt = $mysqli -> prepare($query);
		$stmt->execute([$_SESSION['id'],$input,$input]);

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				//$return_arr[] =  "".$row['First_Name']." " .$row['Last_Name']."" ;

			$return_arr[] = ["label" =>"".$row['First_Name']." " .$row['Last_Name']. "", "id" => $row['StudentID'] ];
		}

} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
}


	/* Toss back results as json encoded array. */
	echo json_encode($return_arr);
}
//////////////////////////////////Display Student Profile/////////////////////////////////
if (isset($_GET['student'])&&isset($_GET['classID'])){
	if($_GET['classID']!==""){
		$query = "SELECT * FROM Student natural join Enrollment natural join Class WHERE studentID =? AND classID =?";
		$stmt = $mysqli -> prepare($query);
		$stmt -> execute([$_GET['student'],$_GET['classID']]);
	}else{
		$query = "SELECT * FROM Student WHERE StudentID = ? LIMIT 1";
		$stmt = $mysqli -> prepare($query);
		$stmt -> execute([$_GET['student']]);
	}



	if($stmt->rowCount() > 0){
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(($row["advisorID"]==$_SESSION['id']) or ($row["InstructorID"]==$_SESSION['id']) ){


			echo"<img src='https://www.pngkey.com/png/full/230-2301779_best-classified-apps-default-user-profile.png' alt='User Image'>";
		

		echo "<br><br>";
		echo"<table class ='table'>";
	  echo"<td>Name</td>";
	  echo "";
	  echo"  <td>".$row["First_Name"]."  ".$row["Last_Name"]."</td>";
	  echo"  </tr>";
	  echo"<tr>";
	  echo  "<td>Student ID</td>";
	  echo"  <td>".$row["StudentID"]."</td>";
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
			}else{
				echo"You do not have permission to see <b>".$row["First_Name"]."  ".$row["Last_Name"]."</b>'s Profile";
			}
	}else{
		echo "Student does not exist. Please select from the drop down";
	}

}

//////////////////////////////////Course Search/////////////////////////////////
if (isset($_GET['course'])){
$return_arr = array();

try {
		$input = '%'.$_GET['course'].'%';
		$query = "SELECT * FROM Course Where Department_code LIKE ? ";
		$stmt = $mysqli -> prepare($query);
		$stmt->execute([$input]);

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$return_arr[] =  "".$row['Department_code']." " .$row['CourseID']."" ;
			//	$return_arr[] = ["label" =>"".$row['Department_code']." " .$row['CourseID']. "", "section" => $row['SectionID'] ];
		}

} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
}
	echo json_encode($return_arr);
}

//////////////////////////////////Display all Courses/////////////////////////////////
if (isset($_GET['department'])&&isset($_GET['courseID'])&&isset($_GET['section'])){
		$_GET['department'] = ''.$_GET['department'].'%';


	if($_GET['section']==""){

				//CASE 1: only department code provided
		if($_GET['courseID']==""){
			$query = "SELECT * FROM Course NATURAL JOIN Class WHERE Department_code LIKE ? ";
			$stmt = $mysqli -> prepare($query);
			$stmt->execute([$_GET['department']]);

		}

			//Case 2: Department code and Course ID
		else{
			$_GET['courseID'] = ''.$_GET['courseID'].'%';
			$query = "SELECT * FROM Course NATURAL JOIN Class WHERE Department_code LIKE ? AND CourseID LIKE ? ";
			$stmt = $mysqli -> prepare($query);
			$stmt->execute([$_GET['department'],$_GET['courseID']]);
		}

	}
		//Case 3: Department code, course ID and section ID are provided or none of them provided
	else{
		$_GET['courseID'] = ''.$_GET['courseID'].'%';
		$query = "SELECT * FROM Course NATURAL JOIN Class WHERE Department_code LIKE ? AND CourseID LIKE ? AND SectionID = ?";
		$stmt = $mysqli -> prepare($query);
		$stmt->execute([$_GET['department'],$_GET['courseID'],$_GET['section']]);
	}

if($stmt->rowCount() > 0){

	//echo "<ul class='Course-Name'>";
	echo				"<table class='course-table' border='1'>";
	echo				"<thead>";

	echo				"</thead>";
	echo				"<tbody>";

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$x=$row['ClassID'];
	$query1 = "SELECT * FROM Student NATURAL JOIN Enrollment NATURAL JOIN Class WHERE ClassID = $x";
	$stmt1 = $mysqli -> prepare($query1);
	$stmt1->execute();

	$x2=$row['InstructorID'];
	$query2 = "SELECT * FROM Instructor WHERE InstructorID = $x2";
	$stmt2 = $mysqli -> prepare($query2);
	$stmt2->execute();
	$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

          echo				"<tr style='background:#dcdae3'>";
					echo							"<td style='display:none' id='courseID{$row['ClassID']}' >".$row['Department_code']." ".$row['CourseID']."</td>";
					echo							"<td style='display:none' id='".$row['ClassID']."'value =".$row['ClassID']." >".$row['ClassID']."</td>";

          echo							"<td style='color: #3F2B96; font-weight: bold; '>".$row['Department_code']." ".$row['CourseID'].", &nbsp &nbsp".$row['Course_Name']."</td>";
			if($_SESSION['userType']=='S'){//IF the student search for class
				echo							"<td style='text-align: right'><input  class='register' type='button' value='Register' onclick='register(document.getElementById(".$row['ClassID'].").innerText)'></td>";

			}else if($_SESSION['userType']=='I'){//If Instructor searches for class
				echo							"<td style='text-align: right'><input style='background: #2d66cf; color: white;' type='button' value='View all Students' onclick='displayStudent(document.getElementById(".$row['ClassID'].").innerText)'></td>";

			}
          echo "</tr>";
          echo				"<tr>";
          echo							"<td > &nbsp &nbsp &nbsp &nbsp &nbsp Section &nbsp &nbsp ".$row['SectionID']."<p style='text-align:left'> &nbsp &nbsp &nbsp &nbsp &nbsp Total Seats Taken &nbsp &nbsp ".$stmt1->rowCount()."/".$row['Total_Seat']."</p><p>&nbsp &nbsp &nbsp &nbsp &nbsp Location &nbsp &nbsp{$row['Location']}</p></td>";
					echo							"<td > &nbsp &nbsp &nbsp  Instructor &nbsp &nbsp {$row2['First_Name']}  {$row2['Last_Name']}<p style='text-align:left'> &nbsp &nbsp &nbsp  Credit &nbsp &nbsp {$row['Credit']}</p><p style='min-width: 300px'>&nbsp &nbsp &nbsp Day/Time &nbsp &nbsp{$row['Day']}&nbsp &nbsp{$row['Time']}</p></td>";
        //  echo							"<td >Credit &nbsp &nbsp ".$row['Credit']."&nbsp hrs</td>";
          echo "</tr>";
          echo "<tr>";
        //  echo							"<td style='margin-left:100px;'> &nbsp &nbsp &nbsp &nbsp &nbsp Location &nbsp &nbsp".$row['Location']."</td>";
        //  echo							"<td >Day/Time &nbsp &nbsp".$row['Day']."&nbsp &nbsp".$row['Time']."</td>";


          echo						"</tr>";
        }
        echo "<tr style='height: 35px'>";
        echo "</tr>";
        echo					"</tbody>";
        echo				"</table>";

      }else{
        echo "<b>You do not have any Classes at the moment</b>";
      }

	}

	///////////////////////////////Display all Students/////////////////////////
if (isset($_GET['all-student'])){
	$query2 = "SELECT * FROM Class WHERE ClassID =?";
	$stmt2 = $mysqli -> prepare($query2);
	$stmt2->execute([$_GET['all-student']]);
	$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	echo "<ul></ul>";
	echo "<ul class='Course-Name'>";
	echo				"<table class='course-table' border='1'>";

	echo				"<thead>";
	echo 				"<b>Here is the list of all students in ".$row2['Department_code']."  ".$row2['CourseID']." Section ".$row2['SectionID']."</b>";
	echo				"<tr>";
	echo				"<th>Student ID</th>";
	echo				"<th>First Name</th>";
	echo				"<th>Last Name</th>";
	echo				"<th>View Profile?</th>";
	echo				"<th>Drop From This Course?</th>";
	echo				"</tr>";
	echo				"</thead>";
	echo				"<tbody>";
	$query = "SELECT * FROM Student NATURAL JOIN Enrollment NATURAL JOIN Class WHERE ClassID =?";
	$stmt = $mysqli -> prepare($query);
	$stmt->execute([$_GET['all-student']]);
	echo"<div id ='classID' style='display: none;'>{$_GET['all-student']}</div>";
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo							"<tr>";
			echo 							"<td style ='display:none' id='TeachingInstructorID'>{$row['InstructorID']}</td>";
			echo							"<td style='text-align:center' id= Student{$row['StudentID']} value ={$row['StudentID']} >{$row['StudentID']}</td>";
			echo							"<td style='text-align:center'>".$row['First_Name']."</td>";
			echo							"<td style='text-align:center'>".$row['Last_Name']."</td>";

			echo							"<td style='text-align:center'><input type='button' value='View profile' onclick='searchStudent({$row['StudentID']},{$row['ClassID']})'></td>";
			echo							"<td style='text-align:center'><input type='button' value='Drop From Course' onclick='deleteStudent({$row['StudentID']})'></td>";
			echo						"</tr>";
	}
	echo					"</tbody>";
	echo				"</table>";
	echo			"</ul>";

}

////////////////////////////////////////////////
	$mysqli = null;


	//Database::dbDisconnect();
?>
