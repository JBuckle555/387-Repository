

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
     document.getElementById("Instructor-Information").setAttribute("style","display: block")
     document.getElementById("showinfo").setAttribute("style","display: none;");
     document.getElementById("hideinfo").setAttribute("style","display: inline;");
  
 }
 
 function infoHide(){
     document.getElementById("Instructor-Information").setAttribute("style", "display: none;");
     document.getElementById("showinfo").setAttribute("style","display: inline;");
     document.getElementById("hideinfo").setAttribute("style","display: none;");
  
 }
 

// function show() {
//   var x = document.getElementById("show");
//   var y = document.getElementById("hide");
//   if (x.style.display === "none") {
//     x.style.display = "block";
//   } else {
//     x.style.display = "none";
//     y.style.display = "block";
//   }
// }

/*
  
  function myFunction() {
    document.getElementById("myForm").reset();
  
    var checkbox = document.getElementsByTagName("input");
      for (var i = 0; i < checkbox.length; ++i) { 
          checkbox[i].checked = false; 
      }
  }*/