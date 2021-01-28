<?php

//this php file will connect to the wdv341 database
//it will pull the form data from the $_POST variable
//it will format an INSERT SQL statement
//it will create a prepared statement
//it will bind the parameters to the prepared statement
//it will execute the prepared statment to insert into the database
//it will display a success/failure message to the user

require('dbConnect.php'); //access and run this external file

$inEventId = "";
$inEventName = "";
$inEventDescription ="";
$inEventPresenter = "";
$inEventDate = "";
$inEventTime = "";



$validForm = true;

if(isset($_POST["form_submit"])){
		
	echo("<h1>thank you, your event has been added</h1>");
	$eventId = $_POST["eventName"];
	$eventName = $_POST["eventName"];
	$eventDescription = $_POST["eventDescription"];
	$eventPresenter = $_POST["eventPresenter"];
	$eventDate = $_POST["eventDate"];
	$eventTime = $_POST["eventTime"];



	//PDO prepared statements

	//1: prepare the sql statement

	$sql = "INSERT INTO wdv341_event (event_id, event_name, event_description, event_presenter, event_date, event_time)
			VALUES (:eventId, :eventName, :eventDescription, :eventPresenter, :eventDate, :eventTime)";

	//2: create the prepared statement object

	$stmt = $conn->prepare($sql);

	//3:bind paramaters to the prepared statement object

	$stmt->bindParam(':eventId', $eventId);
	$stmt->bindParam(':eventName', $eventName);
	$stmt->bindParam(':eventDescription', $eventDescription);
	$stmt->bindParam(':eventPresenter', $eventPresenter);
	$stmt->bindParam(':eventDate', $eventDate);
	$stmt->bindParam(':eventTime', $eventTime);

	//4:Execute the prepared statement

	$stmt->execute();
	}


$conn = null; //close your connection object
?>
<html>
<head>
<meta charset="utf-8">
<title>Insert Events</title>
</head>
<body>	
</body>	
</html>