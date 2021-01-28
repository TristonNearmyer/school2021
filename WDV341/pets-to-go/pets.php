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
 <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="about pets, pets to go">
  <meta name="keywords" content="our pets, hours, events, volunteer, spay/neuter clinic, animal rescue, rehabilitation">

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
		<p>Sunday 12:00 noon to 5:00 pm</p>
		<p>Monday – Thursday 10:00 am to 7:00 pm</p>
		<p>Friday 10:00 am to 4:00 pm</p>
		<p>Saturday 9:00 am to 5:00 pm</p>

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


	</div>
	
	<div class="col-lg-8 about">
		
		<h1>Our Pets are Looking for Someone Like You</h1>
		<p>Because of tough economic times, fewer people can afford to keep their pets. So the number of homeless animals in and around Springfield is increasing dramatically.
		Pets to Go is a nonprofit, no-kill animal shelter serving the Springfield area. Our mission is to give these homeless animals a second chance through our rescue, shelter, and adoption programs.
		We were founded in 1990 with a few simple goals: save and place cats and dogs in new homes, and educate the public about spaying and neutering their pets.
		We’re now one of the largest no-kill shelters in the state! Each year, Pets to Go helps more than 1,300 cats and dogs find permanent homes.<br>
		<span>VOLUNTEERS:</span> We can always use a hand! You can help by caring for our homeless cats and dogs, keeping the shelter clean, helping us raise funds, or fostering pets. Find out about becoming a Pets to Go volunteer.<br>
		<span>SPAY/NEUTER CLINIC:</span> Spaying or neutering your pet is the best way to stop the flood of homeless animals in Springfield. Our modern spay and neuter clinic has a top-notch professional team.<br>
		<span>ANIMAL RESCUE:</span> Our animals come from overcrowded area shelters, local families that can no longer care for their dog or cat, and rescue groups throughout the state. We give homeless, abandoned, and sometimes abused animals a second chance at a healthy, happy life with a caring guardian.<br>
		<span>REHABILITATION:</span> Pets to Go retrains animals with behavioral problems to be better companions in their new homes. And after the adoption, we’re here to help with behavior consultations, training classes, and more.</p>

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
