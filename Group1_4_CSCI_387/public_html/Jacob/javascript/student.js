var courses = document.getElementsById("Courses");


function courseInfoShow() {


   
   Courses.setAttribute("style", "display: block;");
   document.getElementById("show").setAttribute("style","display: none;");
   document.getElementById("hide").setAttribute("style","display: inline;");
}


function courseInfoHide(){

   
   Courses.setAttribute("style", "display: none;");
   document.getElementById("show").setAttribute("style","display: inline;");
   document.getElementById("hide").setAttribute("style","display: none;");

  
   
     
}


function infoShow(){
    document.getElementById("Student-Information").setAttribute("style","display: block")
    document.getElementById("showinfo").setAttribute("style","display: none;");
    document.getElementById("hideinfo").setAttribute("style","display: inline;");
 
}

function infoHide(){
    document.getElementById("Student-Information").setAttribute("style", "display: none;");
    document.getElementById("showinfo").setAttribute("style","display: inline;");
    document.getElementById("hideinfo").setAttribute("style","display: none;");
 
}
