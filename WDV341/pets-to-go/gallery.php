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
  <meta name="description" content="pet pictures, descriptions">
  <meta name="keywords" content="domestic shorthair, shephard mix">

 <link rel="stylesheet" type="text/css" href="CSS/petsToGo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<style>

p,h3 {
	text-align:center;
	margin-bottom:10px;
	
	}

h3 span{
	color:blue;
	font-weight:bold;
	text-decoration:underline;
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
	
	<div class="col-lg-12 row">
		
		<?php
		include("dbConnect.php");
		

    $stmt = $conn->prepare("SELECT pets_name, pets_description, pets_breed, pets_title, pets_picture FROM pets"); 
    $stmt->execute();

    // set the resulting array to associative
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
  
		
		?>
		<div class="col-12 gallary">
		
		<h3><?php echo($result['pets_breed']); ?></h3>
		<center><img src="uploads<?php echo($result['pets_picture']); ?>" alt="animal" height="225" width="225" ></center>
		<p>Breed: <?php echo($result['pets_title']); ?></p>
		<h3><span><?php echo($result['pets_name']); ?></span></h3>
		<p><?php echo($result['pets_description']); ?></p>
		
		</div>
			
		<?php
	}

$conn = null;

?>
		
		
		
	
	
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
