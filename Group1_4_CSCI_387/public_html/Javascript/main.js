
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds();
var timeValue = now.getMonth() +"/" + now.getDate() +"/" + now.getFullYear()+" ";
timeValue += "" + ((hours >12) ? hours -12 :hours);
timeValue += ((minutes < 10) ? ":0" : ":"  + minutes);
timeValue += ((seconds < 10) ? ":0" : ":"  + seconds);
timeValue += (hours >= 12) ? " P.M." : " A.M.";
document.getElementById('footer').innerHTML += "<br>"+timeValue;

var random = function randomNumber(num){
  return Math.floor(Math.random()*num)+1;
};


var backButton = document.getElementById('back');
if(backButton !=null){
  backButton.addEventListener("click",function(){
    location.href= "main.php";
  });
}
function loadProfile(){

        location.href = "test.php";
  }
    function addCourse(){

        location.href = "add.php";
  }
    function deleteCourse(){
      location.href = "delete.php";
    }
    function viewSchedule(){
      location.href = "viewSchedule.php"
    }
    function main(){

        location.href = "main.php";
  }
  function logout(){

        location.href = "logout.php";
  }
  function editProfile(){
      location.href = "editProfile.php";
  }
  function loadHome(){
      location.href = "studentTest.php";
  }
function abc(event) {
event.preventDefault();
var href = event.currentTarget.getAttribute('href')
window.location= href;
}

function myFunction() {



    var x = document.getElementById("myLinks");

    if (x.style.display === "block") {
       x.style.display = "none";
   } else {
       x.style.display = "block";
    }
}
