// JavaScript Document
/*
	This file will:

	- Create a Javascript object including an array
	- Convert the Javascript object into a JSON object
	- Store the JSON object into local storage

	Goal: Provide an example of how to create a JSON object in Javascript
	Goal: Provide an example of how to consume a JSON object in Javascript

	Use the following data for your JSON object
*/

let studentArray = [];

let student1Info = {
		student_id: 332443,
		student_gpa:  3.6,
		student_courses: ["WDV101","WDV131","WDV105"]
};

let student2Info = {
	student_id: 545467,
	student_gpa: 2.7,
	student_courses: ["WDV101","WDV131","WDV105","WDV221","WDV205"]
};

let student3Info = {
	student_id: 128574,
	student_gpa: 3.4,
	student_courses: ["WDV101","WDV131","WDV105","WDV221","WDV205","WDV341"]
};


let student1InfoJSON = JSON.stringify(student1Info);
localStorage.setItem("Student 1", student1InfoJSON);

let student2InfoJSON = JSON.stringify(student2Info);
localStorage.setItem("Student 2", student2InfoJSON);

let student3InfoJSON = JSON.stringify(student3Info);
localStorage.setItem("Student 3", student3InfoJSON);


//student1Info.push(studentArray);
//student2Info.push(studentArray);
//student3Info.push(studentArray);
