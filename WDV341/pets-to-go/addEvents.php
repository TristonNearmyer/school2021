<?php
session_start();



include('dbConnect.php'); //access and run this external file



$inEventId = "";
$inEventName = "";
$inEventDescription ="";
$inEventDate = "";
$inEventStartTime = "";
$inEventEndTime = "";

$eventNameErrMessage = "";
$eventDescriptionErrMessage = "";
$eventDateErrMessage = "";
$eventStartTimeErrMessage = "";
$eventEndTimeErrMessage = "";

if(isset($_POST["event_form_submit"])){

	$eventId = $_POST["eventName"];
	$eventName = $_POST["eventName"];
	$eventDescription = $_POST["eventDescription"];
	$eventDate = $_POST["eventDate"];
	$eventStartTime = $_POST["eventStartTime"];
	$eventEndTime = $_POST["eventEndTime"];

	$validForm = true ;
	
	function validateEventName($inName){
		global $validForm, $eventNameErrMessage;
		
		$eventNameErrMessage = "";
		
		$inName = trim($inName);
		
		if($inName == ""){
			$validForm = false;
			
			$eventNameErrMessage = "Name cannot be blank";
		}
		
		
	}
	
	function validateEventDescription($inName){
		global $validForm, $eventDescriptionErrMessage;
		
		$eventDescriptionErrMessage = "";
		
		$inName = trim($inName);
		
		if($inName == ""){
			$validForm = false;
			
			$eventDescriptionErrMessage = "Description cannot be blank";
		}
		
	}
	
	function validateEventDate($inDate){
		global $validForm, $eventDateErrMessage;
		
		$eventDateErrMessage = "";
		
		if(false == strtotime($inDate)){
			$validForm = false;
			
			$eventDateErrMessage = "Please select a valid date";
		}
	}
	
	function validateEventTime($startTime,$endTime){
		global $validForm, $eventStartTimeErrMessage, $eventEndTimeErrMessage;
		
		$eventStartTimeErrMessage = "";
		$eventEndTimeErrMessage = "";
		
		if(false == strtotime($startTime)){
			$validForm = false;
			
			$eventStartTimeErrMessage = "please select a start time";
		}
		
		elseif(false == strtotime($endTime)){
			$validForm = false;
			
			$eventEndTimeErrMessage = "please select an end time";
		}
		
		elseif($startTime >= $endTime){
			$validForm = false;
			
			$eventStartTimeErrMessage = "Start time cannot be after the end time";
			$eventEndTimeErrMessage = "End time cannot be before the start time";
		}
	}
	
validateEventName($eventName);
validateEventDescription($eventDescription);
validateEventDate($eventDate);
validateEventTime($eventStartTime,$eventEndTime);
	
	if($validForm){
	//PDO prepared statements

	//1: prepare the sql statement

	$sql = "INSERT INTO events (event_id, event_name, event_description, event_date, event_starttime, event_endtime)
			VALUES (:eventId, :eventName, :eventDescription, :eventDate, :eventStartTime, :eventEndTime)";

	//2: create the prepared statement object

	$stmt = $conn->prepare($sql);

	//3:bind paramaters to the prepared statement object

	$stmt->bindParam(':eventId', $eventId);
	$stmt->bindParam(':eventName', $eventName);
	$stmt->bindParam(':eventDescription', $eventDescription);
	$stmt->bindParam(':eventDate', $eventDate);
	$stmt->bindParam(':eventStartTime', $eventStartTime);
	$stmt->bindParam(':eventEndTime', $eventEndTime);

	//4:Execute the prepared statement

	$stmt->execute();
		echo("<script type='text/javascript'> alert('Thank you, your event has been added'); </script>");
	}
	
	else{
		//echo("<h1>An error has occured, please try again</h1>");
		$inEventName = $_POST["eventName"];
		$inEventDescription = $_POST["eventDescription"];
		$inEventDate = $_POST["eventDate"];
		$inEventStartTime = $_POST["eventStartTime"];
		$inEventEndTime = $_POST["eventEndTime"];
	}
} //end insert events form

$conn = null; //close your connection object
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator page</title>
	 <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="proper care for pets">
  <meta name="keywords" content="proper care, domestic shorthair, German shepherd">

 <link rel="stylesheet" type="text/css" href="CSS/petsToGo.css"> 

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	
	
</head>
<style>
	table, th, td {
    border: 1px solid black;
}
	

h3{
	margin-top:10px;
	text-decoration:underline;
}

	.form{
		border-right: 1px solid black;
		border-bottom: 1px solid black;
	}
	
	.error{

		font-style: italic;

		color: #d42a58;

		font-weight: bold;

	}
	
	#formcontainer{
	background-color:gray;
	width:800px;
	margin:10px auto;
	padding:20px;
	border:2px solid black;
	border-radius:15px;
	}
	

	
input, textarea, select{
	font-size:1.1em;
	padding:2px 5px 4px;
	border-radius:5px;
	margin-top:5px;
	order:2;
	flex:1 1 auto;
	}
	


	
input[type=submit], input[type=reset]{
	color:white;
	background-color:black;
	border-radius:50px;
	padding:6px;
	width:100px;
	margin:25px;
	}
	
</style>
<body>
	<section id="top"></section>
<div class="container-fluid" style="padding: 0px">
	<header>
		<img src="images/ptgbanner.jpg" alt="banner" class="col-lg-12" style="padding: 0px">
		<h1>Pets-To-Go</h1>
	</header>
	
		<nav class="navbar justify-content-center sticky-top">
		<center>
		<ul>
			<li><a href="index.php">About Us</a></li>
			<li><a href="pets.php">About Our Pets</a></li>
			<li><a href="gallery.php">Pet Gallery</a></li>
			<li><a href="care.php">Proper Care</a></li>
			<?php if($_SESSION["Administrator"] == "valid user"){
					echo("<li><a href='addPets.php'>Add a pet</a></li>");
					echo("<li><a href='addEvents.php'>Add an Event</a></li>");
					echo("<li><a href='petsLogout.php'>Log Out</a></li>");
				} 
				else{
					echo("<li><a href='petsLogin.php'>Log In</a></li>");
				}?>
		</ul>
		</center>
		</nav>
	
	<div class="row col-12" >
	<div class="col-lg-6 form" id="formcontainer">
		
<form method="post" id="eventForm" name="eventForm" class="eventForm">
	<h2>Add an event</h2>
	
<div class="row col-lg-12">
	<div class="col-lg-12">
<label for="eventName">Event Name: </label>	<br>
	</div>
	
	<div class="col-lg-12">
<input type="text" id="eventName" name="eventName" value="<?php echo("$inEventName")?>"><span class="error"><?php echo("$eventNameErrMessage") ?></span><br>
	</div>
		</div>	
	
	<div class="row col-lg-12">
		<div class="col-lg-12">
<label for="eventDescription">Event Description:</label><br>
		</div>
		
		<div class="col-lg-12">
<textarea class="form-control" id="eventDescription" name="eventDescription" rows="10" cols="45"> <?php echo("$inEventDescription")?></textarea><span class="error"><?php echo("$eventDescriptionErrMessage") ?></span><br>
		</div>
	</div>
	
	<div class="row col-lg-12">
		<div class="col-lg-12">
<lable for="eventDate">Date:</lable><br>
		</div>
		
		<div class="col-lg-12">
<input type="date" id="eventDate" name="eventDate" value="<?php echo("$inEventDate")?>"><span class="error"><?php echo("$eventDateErrMessage") ?></span><br>
		</div>
	</div>
	
	<div class="row col-lg-12">
		<div class="col-lg-12">
<label for="eventStartTime">Start Time:</label><br>
		</div>
		
		<div class="col-lg-12">
<input type="time" id="eventStartTime" name="eventStartTime" value="<?php echo("$inEventStartTime")?>"><span class="error"><?php echo("$eventStartTimeErrMessage") ?></span><br>
		</div>
	</div>
	
	<div class="row col-lg-12">
		<div class="col-lg-12">
<label for="eventEndTime">End Time:</label><br>
		</div>
		
		<div class="col-lg-12">
<input type="time" id="eventEndTime" name="eventEndTime" value="<?php echo("$inEventEndTime")?>"><span class="error"><?php echo("$eventEndTimeErrMessage") ?></span><br>
		</div>
	</div>
	
	<div class="row col-lg-12">
		<div class="col-6">
<input name="event_form_submit" id="event_form_submit" type="submit" value="submit">
		</div>
		
		<div class="col-6">
<input name="reset" id="eventFormReset" type="submit" value="reset">
		</div>
	</div>
	</form>
		</div>
	<!-- end of insert event form -->
		<div class="row col-6">
		
			
	<div class="col-lg-12 " >
	
				<?php
	echo "<table class='table' style='border: solid 1px black;'>";
 echo "<tr><th>Event Name</th><th>Event Description</th><th>Event Date </th><th>Start Time</th><th>End Time</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

include("dbConnect.php");
    $stmt = $conn->prepare("SELECT event_name, event_description, event_date, event_starttime, event_endtime FROM events"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
	   
$conn = null;
echo "</table>";
	   ?>
	</div>
		</div>

		


</div> <!--close container div-->
</body>
</html>
