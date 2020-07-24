var courses = document.getElementById("Courses");
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
    document.getElementById("SearchBox").setAttribute("style","display: block")
    document.getElementById("showinfo").setAttribute("style","display: none;");
    document.getElementById("hideinfo").setAttribute("style","display: inline;");
}

function infoHide(){
    document.getElementById("SearchBox").setAttribute("style", "display: none;");
    document.getElementById("showinfo").setAttribute("style","display: inline;");
    document.getElementById("hideinfo").setAttribute("style","display: none;");
}
function notImplement(){
  alert('This function is not implement yet');
}

/////////// Auto Complete Suggetion on Student Search - This also store Student in in hidden field///////
$(function() {
  $('#search').autocomplete({
    source: function (request, response) {
     $.ajax({
         url: "search.php",
         type: 'get',
         data: {
           input: request.term
         },
         dataType: "json",
         success: function(data) {
             response(data);
           },
         error: function () {

              }
            });
          },
      select: function (event, ui) {
           // Set selection
         $('.auto').val(ui.item.label); // display the selected text
         $('#studentID').val(ui.item.id); // save selected id to input
         return false;
        }

        });
    });
/////////////////////////////////Search Student Profile////////////////////////////////////////////////

function searchStudent(studentID) {

       if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
       } else {
           // code for IE6, IE5
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               document.getElementById("SearchBox").innerHTML = this.responseText;
           }
       };
       xmlhttp.open("GET","search.php?student=" + studentID,true);
       xmlhttp.send();
       this.infoShow();
   }



 ///////////////////////Search Course Auto Complete///////////////////////////////////
 $(function() {
   $('#course-search').autocomplete({
     source: function (request, response) {
      $.ajax({
          url: "search.php",
          type: 'get',
          data: {
            course: request.term
          },
          dataType: "json",
          success: function(data) {
              response(data);
            },
          error: function () {

               }
             });
           }
         });
     });

 ///////////////////////Display all Class from a Course///////////////////////////////////
 function searchCourse() {
   var string = document.getElementById('course-search').value;
   var index = string.indexOf(" ");
   var department = string.substr(0, index);
   var courseID = string.substr(index + 1);
   var section = document.getElementById('section').value;
   var query = "?department="+ department +"&courseID="+courseID+"&section="+section;
         if (window.XMLHttpRequest) {
             // code for IE7+, Firefox, Chrome, Opera, Safari
             xmlhttp = new XMLHttpRequest();
         } else {
             // code for IE6, IE5
             xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         }
         xmlhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("Courses").innerHTML = this.responseText;
             }
         };
         xmlhttp.open("GET","search.php" + query,true);
         xmlhttp.send();
         this.courseInfoShow();
     }
////////////////////Display All students within a course////////////////////////
function displayStudent(courseID) {

       if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
       } else {
           // code for IE6, IE5
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               document.getElementById("Courses").innerHTML = this.responseText;
           }
       };
       xmlhttp.open("GET","search.php?all-student=" + courseID,true);
       xmlhttp.send();
       this.courseInfoShow();
   }
