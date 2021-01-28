<?php
session_start();



require('dbConnect.php'); //access and run this external file

$inPetId = "";
$inPetName = "";
$inPetDescription ="";
$inPetBreed = "";
$inPetTitle = "";

$petNameErrMessage = "";
$petDescriptionErrMessage = "";
$petBreedErrMessage = "";
$petTitleErrMessage = "";
$imageErrMessage = "";

if(isset($_POST["form_submit"])){
	
	$petId = $_POST["petsName"];
	$petName = $_POST["petsName"];
	$petDescription = $_POST["petsDescription"];
	$petBreed = $_POST["petsBreed"];
	$petTitle = $_POST["petsTitle"];
	
	$petPicture = $_FILES['photo']['name'];
	$temp_dir = $_FILES['photo']['tmp_name'];
	$imageSize = $_FILES['photo']['size'];
	
	
	
	$validForm = true ;
	
	function validateImage($inVal){
		global $validForm, $imageErrMessage;
		
		$imageErrMessage = "";
		
		if($inVal == ""){
			$validForm = false;
			
			$imageErrMessage = "please select an image";
		}
	}

	function validatePetName($inName){
		global $validForm, $petNameErrMessage;
		
		$petNameErrMessage = "";
		
		$inName = trim($inName);
		
		if($inName == ""){
			$validForm = false;
			
			$petNameErrMessage = "Name cannot be blank";
		}
		
		elseif (!preg_match("/^[a-zA-Z&, ]*$/", $inName)){

			$validForm = false;
			
			$petNameErrMessage = "No special characters or numbers";
		}
	}
	
	function validatePetDescription($inName){
		global $validForm, $petDescriptionErrMessage;
		
		$petDescriptionErrMessage = "";
		
		$inName = trim($inName);
		
		if($inName == ""){
			$validForm = false;
			
			$petDescriptionErrMessage = "Description cannot be blank";
		}
		
	}
	
	function validatePetBreed($inName){
		global $validForm, $petBreedErrMessage;
		
		$petBreedErrMessage = "";
		
		$inName = trim($inName);
		
		if($inName == ""){
			$validForm = false;
			
			$petBreedErrMessage = "Breed cannot be blank";
		}
		
		elseif (!preg_match("/^[a-zA-Z&, ]*$/", $inName)){

			$validForm = false;
			
			$petBreedErrMessage = "No special characters or numbers";
		}
	}
	
	function validatePetTitle($inName){
		global $validForm, $petTitleErrMessage;
		
		$petTitleErrMessage = "";
		
		$inName = trim($inName);
		
		if($inName == ""){
			$validForm = false;
			
			$petTitleErrMessage = "Title cannot be blank";
		}
		
		elseif (!preg_match("/^[a-zA-Z&, ]*$/", $inName)){

			$validForm = false;
			
			$petBreedErrMessage = "No special characters or numbers";
		}
	}
	
validatePetName($petName);
validatePetDescription($petDescription);
validatePetBreed($petBreed);
validatePetTitle($petTitle);
validateImage($petPicture);
	

if($validForm){
	
	$upload_dir = 'uploads';
	$imgExt = strtolower(pathinfo($petPicture,PATHINFO_EXTENSION));
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
	$picProfile = rand(1000, 1000000).".".$imgExt;
	move_uploaded_file($temp_dir, $upload_dir. $picProfile);
	//PDO prepared statements

	//1: prepare the sql statement

	$sql = "INSERT INTO pets (pet_id, pets_name, pets_description, pets_breed, pets_title, pets_picture)
			VALUES (:petId, :petName, :petDescription, :petBreed, :petTitle, :petPic)";

	//2: create the prepared statement object

	$stmt = $conn->prepare($sql);

	//3:bind paramaters to the prepared statement object

	$stmt->bindParam(':petId', $petId);
	$stmt->bindParam(':petName', $petName);
	$stmt->bindParam(':petDescription', $petDescription);
	$stmt->bindParam(':petBreed', $petBreed);
	$stmt->bindParam(':petTitle', $petTitle);
	$stmt->bindParam(':petPic', $picProfile);

	//4:Execute the prepared statement

	$stmt->execute();
	
	echo("<script type='text/javascript'> alert('Thank you, your pet has been added'); </script>");
}
	
else{
	//echo("<h1>An error has occured, please try again</h1>");
	
	$inPetName = $_POST["petsName"];
	$inPetDescription = $_POST["petsDescription"];
	$inPetBreed = $_POST["petsBreed"];
	$inPetTitle = $_POST["petsTitle"];
}
	} //end insert pets form

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
	border-radius:100px;
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
		
		
			
<form method="post" id="petsForm" name="petsForm" enctype="multipart/form-data">
	<h2>Add a pet</h2>
<div class="row col-lg-12">	
	<div class="col-lg-12">
<label for="petsName">Pet Name: </label>	<br>
		</div>
	<div class="col-12">
<input type="text" id="petsName" name="petsName" value="<?php echo("$inPetName") ?>"><span class="error"><?php echo("$petNameErrMessage") ?></span><br>
	<br>
	</div>
</div>

<div class="row col-lg-12">
	<div class="col-lg-12">
<label for="petsDescription">Pet Description:</label><br>
	</div>
	
	<div class="col-lg-12">
<textarea class="form-control" id="petsDescription" name="petsDescription" rows="10" cols="45"> <?php echo("$inPetDescription")?> </textarea><span class="error"><?php echo("$petDescriptionErrMessage") ?></span><br>
	<br>
	</div>

</div>
	
<div class="row col-lg-12">
	<div class="col-lg-12">
<label for="petBreed">Pet Breed:</label><br>
	</div>
	
	<div class="col-lg-12">
<input type="text" id="petsBreed" name="petsBreed" value="<?php echo("$inPetBreed")?>"><span class="error"><?php echo("$petBreedErrMessage") ?></span><br>
	</div>
	
	</div>	
	
<div class="row col-lg-12">
	<div class="col-lg-12">
<lable for="petsTitle">Title:</lable><br>
	</div>
	
	<div class="col-lg-12">
<input type="text" id="petsTitle" name="petsTitle" value="<?php echo("$inPetTitle")?>"><span class="error"><?php echo("$petTitleErrMessage") ?></span><br>
	</div>
	</div>
	
<div class="row col-lg-12">
	<div class="col-lg-12">
	<lable for="photo">Add a picture:</lable><span class="error"><?php echo("$imageErrMessage"); ?></span><br>
	</div>
	
	<div class="col-lg-12">
	<input type="file" name="photo" id="photo" accept="*/image">
	</div>

	</div>
<div class="row col-lg-12">
	<div class="col-6">
<input name="form_submit" id="form_submit" type="submit" value="submit">
	</div>

	<div class="col-6">
<input name="reset" id="button" type="submit" value="reset">
	</div>
	
	</div>
	</form>
		
		<h2>Delete From Table</h2>
			<?php
	$inName = "";

$deleteErrMessage = "";
		
		if(isset($_POST["deletePetForm"])){
			$inName = $_POST["deletePetName"];
			include("dbConnect.php");
			$validForm = true ;
			
			function validateDelete($inVal){
				global $validForm, $deleteErrMessage ;
				
				$deleteErrMessage = "";
				
				$inVal = trim($inVal);
				
				if($inVal == ""){
					$validForm = false;
					
					$deleteErrMessage = "please enter a valid name";
				}
			}
			
			validateDelete($inName);
			
			if($validForm){
			$query = "DELETE FROM pets Where pets_name = :name";
			
			$stmt = $conn->prepare($query);
				
				//$stmt->bindParam(':name', $inName);
			
			$stmt->execute(
				array(
					'name' => $inName
				)
			);
	
			echo("<script>alert('pet has been deleted')</script>");
			
			}
			
		
		}
	
	?>
		
		<form method="post" id="deletePet" name="deletePet">
	<div class="col-lg-12">
		<div class="col-lg-12">
	<label for="deletePetName">Pet Name</label>	
			</div>
		<div class="col-lg-12">
	<input type="text" id="deletePetName" name="deletePetName" value="">
			</div>
			</div>
			
	<div class="row col-lg-12">
		<div class="col-6">
	<input type="submit" id="deletePetForm" name="deletePetForm" value="Delete">
	</div>	
		<div class="col-6">
		<input type="submit" id="resetDeleteForm" name="resetDeleteForm" value="reset">
		</div>
			</div>
	</form>
		</div>
	<!-- end of insert event form -->
		<div class="row col-6">
	<div class="col-12 petsTable" >
	
		<?php
	echo "<table class='table' style='border: solid 1px black;'>";
 echo "<tr><th>Pet Name</th><th>Pet Description</th><th>Pet Breed</th></tr>";

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
    $stmt = $conn->prepare("SELECT pets_name, pets_description, pets_breed FROM pets"); 
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
			</div>

		


</div> <!--close container div-->
</body>
</html>
