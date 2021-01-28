<?php
	include("dbConnect.php");//Get the Event data from the server.

	 $stmt = $conn->prepare("SELECT event_name, event_presenter, event_description, event_date, event_time FROM wdv341_event ORDER BY event_date "); 
    $stmt->execute();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WDV341 Intro PHP  - Display Events Example</title>
    <style>
		.eventBlock{
			width:500px;
			margin-left:auto;
			margin-right:auto;
			background-color:#CCC;	
		}
		
		.displayEvent{
			text_align:left;
			font-size:18px;	
		}
		
		.displayDescription {
			margin-left:100px;
		}
	</style>
</head>

<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Example Code - Display Events as formatted output blocks</h2>   
    <h3>??? Events are available today.</h3>

<?php
	 while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
  //Display each row as formatted output in the div below
		 $date = date("d-m-Y", strtotime($result['event_date'])); 
		 $formatedDate = strftime($date);
?>
	<p>
        <div class="eventBlock">	
            <div>
            	<span class="displayEvent">Event:<?php echo($result['event_presenter']); ?></span><br>
                <span>Presenter:<?php echo($result['event_presenter']); ?></span>
            </div>
            <div>
            	<span class="displayDescription">Description:<?php echo($result['event_description']); ?></span>
            </div>
            <div>
            	<span class="displayTime">Time:<?php echo($result['event_time']); ?></span>
            </div>
            <div>
            	<span class="displayDate" <?php if($formatedDate > strftime(date("d-m-Y"))){echo("style='font-style:italic'");} elseif(date("m", $formatedDate) == date("m")){echo("style='font-style:bold; color:red;'");} ?></span>Date:<?php echo($formatedDate); ?></span>
            </div>
        </div>
    </p>

<?php
	 }
$conn = null;	//Close the database connection	
?>
</div>	
</body>
</html>