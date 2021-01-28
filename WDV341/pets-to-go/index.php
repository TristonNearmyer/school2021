<?php
session_start();



?>
<!DOCTYPE html>
<html>
<head>
	<title>Pets-2-Go</title>
	<!-- Author: Triston Nearmyer
		Date: December 6 2018
		-->
 <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="About, pets to go">
  <meta name="keywords" content="aobut us, hours, events">

 <link rel="stylesheet" type="text/css" href="CSS/petsToGo.css">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	
	
</head>

<body>
<section id="top"></section>
<div class="container-fluid" style="padding: 0px">
	
	<header class="col-lg-12" style="padding: 0px">
		
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
			<?php if(!isset($_SESSION["Administrator"])){
					echo("<li><a href='petsLogin.php'>Log In</a></li>");

					}
					elseif($_SESSION["Administrator"] == "valid user"){
						echo("<li><a href='addPets.php'>Add a pet</a></li>");
					echo("<li><a href='addEvents.php'>Add an Event</a></li>");
						echo("<li><a href='petsLogout.php'>Log Out</a></li>");
							
						}?>
		</ul>
		</center>
		</nav>
	<div class="row">
	<div class="col-lg-4 hours">
		
		<h2>Hours:</h2>
		<p>Sunday: 12:00 noon to 5:00 pm</p>
		<p>Monday – Thursday: 10:00 am to 7:00 pm</p>
		<p>Friday: 10:00 am to 4:00 pm</p>
		<p>Saturday: 9:00 am to 5:00 pm</p>

		<h2>Pet’s To Go  Upcoming Events:</h2>
		
<?php
		include("dbConnect.php");
		

    $stmt = $conn->prepare("SELECT event_name, event_description, event_date, event_starttime, event_endtime FROM events"); 
    $stmt->execute();

    // set the resulting array to associative
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $date = date("d-M", strtotime($result['event_date']));
    $formatedDate = strtolower($date);
	
	$startTime = date("h:i A", strtotime($result['event_starttime']));
	$formatedStartTime = strtolower($startTime);
		
	$endTime = date("h:i A", strtotime($result['event_endtime']));
	$formatedEndTime = strtolower($endTime);
		
		?>
		
		<h3><strong><?php echo($result['event_name']); ?></strong></h3>
		<p><strong>Date: <?php echo($formatedDate); ?></strong></p>
		<p><strong>Time: <?php echo($formatedStartTime . "-" . $formatedEndTime) ?> </strong></p>
		<p><?php echo($result['event_description']); ?></p>
		
		<?php
	}

$conn = null;

?>
		
		<h2>Become a member:</h2>
		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" style="text-align: center;">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="YDC5BWTNDQYBJ">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


	</div>
	
	<div class="col-lg-8 about">
		
		<h1>About Us:</h1>
		<p>Founded in 1996 we are Springfield’s only no-kill animal shelter. Since it’s opening Pets to Go has placed an estimated 18,000 homeless cats and dogs in new households. Where do these animals come from? 40% are owner surrenders and the other 60% are animals we rescue from shelters that euthanize.
		We have a dedicated staff of 15 (half are part-time). And our 200-plus volunteers are our backbone (thank you volunteers and donors!). Many of the rescued animals who come to Pets to Go get more love and attention in our shelter than they’ve ever known before. Our shelter continues to grow and improve. Drop by and get to know us better!</p>
		
			<div class="col-lg-12 newsletter" style="display: flex; flex-direction: column; text-align: center; align-items: center;">
		<h1>Sign up for our monthly newsletter!</h1>
		<p>everything you could want to know all in one handy newsletter. montly events and new additions to our furry family</p>
		<div style="width: 50%;">
		 <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="4WJ47KZXFKBK2">
			<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form></div>		
				
	</div>

	</div>
		
	</div>
	
	<footer class="row">
		<div class="col-lg-6">
	<p><a href="#top">Go to Top</a></p>
	<a href="Contact_Form.php">Contact Us</a>
	<p>Pets To Go Animal Shelter</p>
	<p>3183 S Veterans Pkwy</p>
	<p>Springfield, Illinois 62704</p>

	<p>(217) 698-3091</p>
			</div>
	<div class="col-lg-6">
	<img src="images/ptglogo.png" alt="logo" width="200" height="204">
	</div>
	</footer>

</div> <!--close container div-->
</body>
</html>
