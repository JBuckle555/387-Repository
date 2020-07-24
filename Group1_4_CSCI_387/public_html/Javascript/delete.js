function deleteClass(classID){
  if(confirm("Do you want to delete this course?")){
    var StudentID = document.getElementById('StudentID').innerText;
    location.href = "deleteFunction.php?classID="+classID+"&StudentID="+StudentID;
  };
}
