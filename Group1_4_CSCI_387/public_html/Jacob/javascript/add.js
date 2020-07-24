function extras(){
	document.getElementById("button").addEventListener("click", function(){

		document.getElementById("button").disabled = "disabled";
		var searchOption = document.getElementsByClassName('search');
        searchOption[0].parentNode.removeChild(searchOption[0]);



		var text = "Advanced Search Settings";
		var header = document.createElement("h2");
		var newNode = document.createTextNode(text);
		header.appendChild(newNode);
		document.getElementById("advancedSearch").appendChild(header);
		header.setAttribute("style", "text-align:center; padding-bottom:20px;");


	
		var form = document.createElement("form");
		document.getElementById("advancedSearch").appendChild(form);
		form.setAttribute("id", "myForm")



		var courseName = "Course Name: ";
		var header = document.createElement("h5");
		var newerNode = document.createTextNode(courseName);
		header.appendChild(newerNode);
		document.getElementById("advancedSearch").appendChild(header);
		header.setAttribute("style", "display: block; margin-left: auto;margin-right: auto; width: 40%;");
		var input = document.createElement("input");
		input.setAttribute("type", "text");
		header.appendChild(input)
		form.appendChild(header);
		



		var instructor = "Instructor: ";
		var header = document.createElement("h5");
		var newerNode = document.createTextNode(instructor);
		header.appendChild(newerNode);
		document.getElementById("advancedSearch").appendChild(header);
		header.setAttribute("style", "display: block; margin-left: auto;margin-right: auto; width: 40%;");
		var input = document.createElement("input");
		input.setAttribute("type", "text");
		header.appendChild(input)
		form.appendChild(header);



		var department = "Department: ";
		var header = document.createElement("h5");
		var evenNewerNode = document.createTextNode(department);
		header.appendChild(evenNewerNode);
		document.getElementById("advancedSearch").appendChild(header);
		header.setAttribute("style", "display: block; margin-left: auto;margin-right: auto; width: 40%; ");
		var dropdown = document.createElement("select");
		dropdown.setAttribute("class", "dropdown");
		header.appendChild(dropdown);
		var allDepartments = ["Any","Aerospace Studies","African American Studies Program","Arch Dalrymple III Department of History","Art History",
			"Biomedical Engineering","Biomolecular Sciences","Biomolecular Sciences - Pharmacognosy","Biomolecular Sciences - Pharmacology","Business Administration",
			"Center for Intel & Security Studies","Center for the Study of Southern Culture","Chemical Engineering","Chemistry & Biochemistry","Civil Engineering","Classics","College of Liberal Arts","Communication Sciences & Disorders",
			"Computer & Information Science","Croft Inst for International Studies","Developmental Studies","Economics","Electrical Engineering","Engineering","English","Finance",
			"Gender Studies","Geology & Geological Engineering","Graduate School","Health, Exercise Sci & Recreation Mgmt","Higher Education","Leadership & Counselor Education","Legal Studies",
			"Liberal Arts","Management","Management Information Systems","Marketing","Master of Business Administration","Mathematics","Mechanical Engineering","Military Science & Leadership",
			"Modern Languages","Music","Naval Science","Nutrition & Hospitality Management","Patterson School of Accountancy","Pharmaceutics & Drug Delivery","Pharmacy Administration","Pharmacy Practice",
			"Philosophy & Religion","Physics & Astronomy","Political Science","Psychology","Public Policy Leadership","Sally McDonnell Barksdale Honors College","School of Applied Sciences","School of Education","School of Engineering",
			"School of Journalism and New Media","School of Law","School of Pharmacy","Social Work","Sociology & Anthropology",
			"Speech","Teacher Education","Theatre & Film","University Studies","Writing & Rhetoric"]
		for(var i = 0; i < allDepartments.length; i++){
			var option = document.createElement("option");
				dropdown.appendChild(option);
				var text = allDepartments[i];
				var newNode = document.createTextNode(text);
				option.appendChild(newNode);
		}
		form.appendChild(header);



		var campus = "Campus: ";
		var header = document.createElement("h5");
		var newerNode = document.createTextNode(campus);
		header.appendChild(newerNode);
		document.getElementById("advancedSearch").appendChild(header);
		header.setAttribute("style", "display: block; margin-left: auto;margin-right: auto; width: 40%;");
		var dropdown = document.createElement("select");
		dropdown.setAttribute("class", "dropdown");
		header.appendChild(dropdown);

		var campus = ["Any", "Booneville Campus", "Desoto Center", "Grenada Campus", "Oxford (Main Campus)", "Rankin Regional Campus", "Tupelo Center"]
		for (var i = 0; i < campus.length; i++){
			var option = document.createElement("option");
			dropdown.appendChild(option);
			var text = campus[i];
			var newNode = document.createTextNode(text);
			option.appendChild(newNode);
		}
		form.appendChild(header);

		//way too many classrooms. i dont want to do this :(
		// var classroom = "Classroom: ";
		// var header6 = document.createElement("h5");
		// var newerNode = document.createTextNode(classroom);
		// header6.appendChild(newerNode);
		// document.getElementById("advancedSearch").appendChild(header6);
		// header6.setAttribute("style", "text-align:center;");

		var level = "Level: ";
		var header = document.createElement("h5");
		var newerNode = document.createTextNode(level);
		header.appendChild(newerNode);
		document.getElementById("advancedSearch").appendChild(header);
		header.setAttribute("style", "display: block; margin-left: auto;margin-right: auto; width: 40%;");
		var dropdown = document.createElement("select");
		dropdown.setAttribute("class", "dropdown");
		header.appendChild(dropdown);
		var allLevels = ["Any", "IS High School","Developmental","Intermediate", "100 Level","200 Level","300 Level","400 Level","500 Level","600 Level","700 Level"]
		for (var i = 0; i < allLevels.length; i++){
			var option = document.createElement("option");
			dropdown.appendChild(option);
			var text = allLevels[i];
			var newNode = document.createTextNode(text);
			option.appendChild(newNode);
		}
		form.appendChild(header);



		var program = "Program Type: ";
		var header = document.createElement("h5");
		var newerNode = document.createTextNode(program);
		header.appendChild(newerNode);
		document.getElementById("advancedSearch").appendChild(header);
		header.setAttribute("style", "display: block; margin-left: auto;margin-right: auto; width: 40%;");
		var dropdown = document.createElement("select");
		dropdown.setAttribute("class", "dropdown");
		header.appendChild(dropdown);
		var allLevels = ["Any", "IS High School","Undergraduate", "Graduate", "Law", "Pharm D"]
		for (var i = 0; i < allLevels.length; i++){
			var option = document.createElement("option");
			dropdown.appendChild(option);
			var text = allLevels[i];
			var newNode = document.createTextNode(text);
			option.appendChild(newNode);
		}
		form.appendChild(header);



		var program = "Category: ";
		var header = document.createElement("h5");
		var newerNode = document.createTextNode(program);
		header.appendChild(newerNode);
		document.getElementById("advancedSearch").appendChild(header);
		header.setAttribute("style", "display: block; margin-left: auto;margin-right: auto; width: 40%;");
		var dropdown = document.createElement("select");
		dropdown.setAttribute("class", "dropdown");
		header.appendChild(dropdown);
		var allLevels = ["Any", "Clinical Instruction","Correspondence", "Dissertation", "Ensemble", "Field Supervision of Student Teaching",
							"Independent Study", "Laboratory", "Lecture","Lecture/Lab", "Practicum/Internship", 
							"Recitation/Discussion","Seminar,Studio", "Study Out-of-Country","Study Out-of-State",
							"Thesis", "Tutorial" ]
		for (var i = 0; i < allLevels.length; i++){
			var option = document.createElement("option");
			dropdown.appendChild(option);
			var text = allLevels[i];
			var newNode = document.createTextNode(text);
			option.appendChild(newNode);
		}
		form.appendChild(header);



		var subject = "Subject Area: ";
		var header = document.createElement("h5");
		var newerNode = document.createTextNode(subject);
		header.appendChild(newerNode);
		document.getElementById("advancedSearch").appendChild(header);
		header.setAttribute("style", "display: block; margin-left: auto;margin-right: auto; width: 40%;");
		var dropdown = document.createElement("select");
		dropdown.setAttribute("class", "dropdown");
		header.appendChild(dropdown);
		var subjectArea =
			["Any","Natural Resources and Conservation","Architecture and Related Services","Area, Ethnic, Cultural, Gender and Group Studies",
			"Communication, Journalism and Related Programs","Communications TechnologiesTechnicians and Support Services","Computer and Information Sciences and Support Services",
			"Personal and Culinary Services","Education","Engineering","Engineering Technologies and Engineering-related Fields","Foreign Languages, Literatures, and Linguistics",
			"Family and Consumer SciencesHuman Sciences","Legal Professions and Studies 23English Language and LiteratureLetters",
			"Liberal Arts and Sciences, General Studies and Humanities","Library Science","Biological and Biomedical Sciences",
			"Mathematics and Statistics 28Military Science, Leadership and Operational Art","Military Technologies and Applied Sciences",
			"MultiInterdisciplinary Studies","Parks, Recreation, Leisure and  Fitness Studies","Basic Skills and DevelopmentalRemedial Education",
			"Citizenship Activities","Health-Related Knowledge and Skills","Leisure and Recreational Activities","Personal Awareness and Self-Improvement",
			"Philosophy and Religious Studies","Physical Sciences","Psychology","Homeland Security, Law Enforcement, Firefighting and Related Protective Services",
			"Public Administration and Social Service Professions","Social Science","Visual and Performing Arts","Health Professions and Related Programs",
			"Business, Management, Marketing, and Related Support Services","History"]
		for (var i = 0; i < subjectArea.length; i++){
			var option = document.createElement("option");
			dropdown.appendChild(option);
			var text = subjectArea[i];
			var newNode = document.createTextNode(text);
			option.appendChild(newNode);
		}
		form.appendChild(header);



		var courseType = "Course Type: ";
		var header = document.createElement("h5");
		var newerNode = document.createTextNode(courseType);
		header.appendChild(newerNode);
		document.getElementById("advancedSearch").appendChild(header);
		header.setAttribute("style", "display: block; margin-left: auto;margin-right: auto; width: 40%;");
		var dropdown = document.createElement("select");
		dropdown.setAttribute("class", "dropdown");
		header.appendChild(dropdown);
		var allLevels = ["Any", "Hybrid Course","Correspondence", "Interactive or Compressed Video", "Online  - Mini Session", "Online, Internet, or Web-based",
							"Online, Internet, or Web-based (Program)", "Other Distance Learning", "Print-based correspondence course","Traditional", "Traditional - Mini Session"]
		for (var i = 0; i < allLevels.length; i++){
			var option = document.createElement("option");
			dropdown.appendChild(option);
			var text = allLevels[i];
			var newNode = document.createTextNode(text);
			option.appendChild(newNode);
		}
		form.appendChild(header);



		var meetingDays = "Meeting Days: ";
		var header = document.createElement("h5");
		var newerNode = document.createTextNode(meetingDays);
		header.appendChild(newerNode);
		document.getElementById("advancedSearch").appendChild(header);
		header.setAttribute("style", "display: block; margin-left: auto; margin-right: auto; width: 40%;");

		var checkbox = document.createElement("input");
		checkbox.setAttribute("type", "checkbox")
		header.appendChild(checkbox);
		var label = document.createElement("label");
		label.setAttribute("style", "font-size: 18px; padding-left: 2px; padding-right: 10px;");
		header.appendChild(label);
		label.innerHTML = "Mon";

		var checkbox = document.createElement("input");
		checkbox.setAttribute("type", "checkbox");
		header.appendChild(checkbox);
		var label = document.createElement("label");
		label.setAttribute("style", "font-size: 18px; padding-left: 2px; padding-right: 10px;");
		header.appendChild(label);
		label.innerHTML = "Tue";

		var checkbox = document.createElement("input");
		checkbox.setAttribute("type", "checkbox");
		header.appendChild(checkbox);
		var label = document.createElement("label");
		label.setAttribute("style", "font-size: 18px; padding-left: 2px; padding-right: 10px;");
		header.appendChild(label);
		label.innerHTML = "Wed";

		var checkbox = document.createElement("input");
		checkbox.setAttribute("type", "checkbox");
		header.appendChild(checkbox);
		var label = document.createElement("label");
		label.setAttribute("style", "font-size: 18px; padding-left: 2px; padding-right: 10px;");
		header.appendChild(label);
		label.innerHTML = "Thu";

		var checkbox = document.createElement("input");
		checkbox.setAttribute("type", "checkbox");
		header.appendChild(checkbox);
		var label = document.createElement("label");
		label.setAttribute("style", "font-size: 18px; padding-left: 2px; padding-right: 10px;");
		header.appendChild(label);
		label.innerHTML = "Fri";

		var checkbox = document.createElement("input");
		checkbox.setAttribute("type", "checkbox");
		header.appendChild(checkbox);
		var label = document.createElement("label");
		label.setAttribute("style", "font-size: 18px; padding-left: 2px; padding-right: 10px;");
		header.appendChild(label);
		label.innerHTML = "Sat";

		var checkbox = document.createElement("input");
		checkbox.setAttribute("type", "checkbox");
		header.appendChild(checkbox);
		var label = document.createElement("label");
		label.setAttribute("style", "font-size: 18px; padding-left: 2px; padding-right: 10px;");
		header.appendChild(label);
		label.innerHTML = "Sun";



		var showOnly = "Show Only: ";
		var header = document.createElement("h5");
		var newerNode = document.createTextNode(showOnly);
		header.appendChild(newerNode);
		document.getElementById("advancedSearch").appendChild(header);
		header.setAttribute("style", "display: block; margin-left: auto; margin-right: auto; width: 40%;");

		var checkbox = document.createElement("input");
		checkbox.setAttribute("type", "checkbox");
		header.appendChild(checkbox);
		var label = document.createElement("label");
		label.setAttribute("style", "font-size: 16px; padding-left: 2px; padding-right: 10px;");
		header.appendChild(label);
		label.innerHTML = "Open Sections";

		var checkbox = document.createElement("input");
		checkbox.setAttribute("type", "checkbox");
		header.appendChild(checkbox);
		var label = document.createElement("label");
		label.setAttribute("style", "font-size: 16px; padding-left: 2px; padding-right: 10px;");
		header.appendChild(label);
		label.innerHTML = "Closed Sections";




 		var div = document.createElement("div");
 		div.setAttribute("style", "display: flex; align-items: center;justify-content: center;");
 		document.getElementById("advancedSearch").appendChild(div);
		var submit = document.createElement("button");
		submit.setAttribute("type", "button");
		submit.setAttribute("id", "advancedSearch");
		submit.innerHTML = "Search";
		submit.setAttribute("style", "height:40px; width:80px;");
		submit.setAttribute("onClick", "searchFunction()");
		submit.setAttribute("class", "btn btn-success");

		var reset = document.createElement("input");
		reset.setAttribute("type", "reset");
		reset.setAttribute("value", "Reset");
		reset.setAttribute("onClick", "myFunction()");
		reset.setAttribute("style", "height:40px; width:80px;")
		reset.setAttribute("class", "btn btn-danger");

		div.appendChild(submit);
		div.appendChild(reset);

	})
}

function searchFunction() {
  	document.getElementById('classes').setAttribute("style", "display: block;");
  	document.getElementById('addClass').setAttribute("style", "display: block;");
}

function myFunction() {
	document.getElementById("myForm").reset();

	var checkbox = document.getElementsByTagName("input");
		for (var i = 0; i < checkbox.length; ++i) { 
			checkbox[i].checked = false; 
		}
}

function check() {
	var checked = document.getElementsByClassName('checkbox');
	 for (var i = 0; i < checked.length; i++){
		if (checked[i].checked === true){
			document.getElementById("addClass").disabled = false;
		}
	}
}

function addClass(){
	var checked = document.getElementsByClassName('checkbox');
	var idk = []
	 for (var i = 0; i < checked.length; i++){
		if (checked[i].checked == false){
			idk.push("false");
		}
		if (checked[i].checked == true){
			idk.push("true");
		}
	}
	if(idk.includes("true")){
		//do something
		console.log("has class selected");
	}

	else{
		alert("No class selected")
	}

}