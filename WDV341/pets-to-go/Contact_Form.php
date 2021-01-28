<?php
	
	require 'Emailer.php'; 

$inCustomerFirstName = "";
$inCustomerLastName = "";
$inCustomerEmail = "";
$inTopic = "";
$inMessage = "";

$customerEmailErrMessage = "";
	$customerFirstNameErrMessage = "";
	$customerLastNameErrMessage = "";
	$topicErrMessage = "";
	$messageErrMessage = "";
	
	if(isset($_POST["submitEmail"])){
		
	$inCustomerEmail = $_POST["customerEmail"];
	$inCustomerFirstName = $_POST["firstName"];
	$inCustomerLastName = $_POST["lastName"];
	
	if(isset($_POST["topic"])){	
		$inTopic = $_POST["topic"];
	}
		
	$inMessage = $_POST["message"];
		
	
		
	$validForm = true ;
		
		function validateCustomerEmail($inVal){
			global $validForm, $customerEmailErrMessage;
			
			$customerEmailErrMessage = "";
			
			$inVal = trim($inVal);
			
			if($inVal == ""){
				$validForm = false;
			
				$customerEmailErrMessage = "email must be filled";
			}
			
			elseif (!filter_var($inVal, FILTER_VALIDATE_EMAIL)) {
				$validForm = false;
				
				$customerEmailErrMessage = "please enter a valid email";
			}
			
		}
		
		function validateCustomerFirstName($inName){
			global $validForm, $customerFirstNameErrMessage ;
			
			$customerFirstNameErrMessage = "";
			
			$inName = trim($inName);
			
			if($inName == ""){
				$validForm = false;
				
				$customerFirstNameErrMessage = "Name cannot be empty";
			}
			
			elseif (!preg_match("/^[a-zA-Z ]*$/", $inName)){

			$validForm = false;
			
			$customerFirstNameErrMessage = "No special characters or numbers";
			}
		}
		
		function validateCustomerLastName($inName){
			global $validForm, $customerLastNameErrMessage ;
			
			$customerLastNameErrMessage = "";
			
			$inName = trim($inName);
			
			if($inName == ""){
				$validForm = false;
				
				$customerLastNameErrMessage = "Name cannot be empty";
			}
			
			elseif (!preg_match("/^[a-zA-Z ]*$/", $inName)){

			$validForm = false;
			
			$customerLastNameErrMessage = "No special characters or numbers";
			}
		}
		
		function validateMessage($inVal){
			global $validForm, $messageErrMessage;
			
			$messageErrMessage = "";
			
			$inVal = trim($inVal);
			
			if($inVal == ""){
				$validForm = false;
				
				$messageErrMessage = "message cannot be blank";
			}
			
		}
		
		function validateTopic ($inVal){
			global $validForm, $topicErrMessage;
			
			$topicErrMessage = "";
			
			if($inVal == "default"){
				$validForm = false;
				
				$topicErrMessage = "pleae choose a topic";
			}
		}
		
		validateCustomerEmail($inCustomerEmail);
		validateCustomerFirstName($inCustomerFirstName);
		validateCustomerLastName($inCustomerLastName);
		validateTopic($inTopic);
		validateMessage($inMessage);
		
		if($validForm){
	
	$emailTest = new Emailer(); 
	
	$emailTest->setSenderEmail("contact@tristonnearmyer.com");
	
	$emailTest->setRecipientEmail($inCustomerEmail);
	
	$emailTest->setCustomerInfo($inCustomerEmail, $inCustomerFirstName,$inCustomerLastName);
	
	$emailTest->setSubject($inTopic);
	
	$emailTest->setMessage($inMessage);
	
	
		
	$emailTest->sendEmail(); //send email to SMTP server
			
			echo("<script> alert('Your message has been set. A team member will get back to you as soon as possible.')</script>");
			
	//header('Location: index.php');
		
	
			
	
	
		}
		
		else{
			echo("an error has occured. one or more fields may be invalid, please try again");
		}
		
	}
	?>
	
</body>
</html>

<!DOCTYPE html>
<html>
<head>

<title>Contact Me Form</title>

<style>

*{
	box-sizing:border-box;
	margin:0;
	padding:0;
	}

body{
	font-family:"Helvetica",Ariel,sans-serif;
	font-size:125%;
	color:#333;
	background-color:#gray;
	}
	
#formcontainer{
	background-color:lightgray;
	width:800px;
	margin:10px auto;
	padding:20px;
	border:2px solid black;
	border-radius:15px;
	}
	
legend{
	width:100%;
	border-bottom:1px dotted purple;
	padding-bottom:5px;
	margin-bottom:15px:
	font-size:1.3em;
	}
	
fieldset1{
	width:25em;
	margin:20px;
	}

fieldset1 div{
	margin:5px 0;
	display:flex;
	align-items:center;
	}
	
input, textarea, select{
	font-size:1.1em;
	padding:2px 5px 4px;
	border-radius:5px;
	margin-top:5px;
	order:2;
	flex:1 1 auto;
	}
	
label{
	order:1;
	width:10em;
	text-align:right;
	padding-right:0.5em;
	}
	
fieldset2{
	width:25em;
	margin:20px;
	}

fieldset2 div{
	margin:5px 0;
	display:flex;
	align-items:top;
	}
	
input[type=submit], input[type=reset]{
	color:white;
	background-color:black;
	border-radius:50px;
	padding:6px;
	width:50px;
	margin:25px;
	}

</style>

</head>
<body>
<div id="formcontainer">
<form id="contact_form" method ="post">
	<legend>Contact Me!</legend>
		<p style="font-style:italic;">Send us a message. We would love to hear from you</p>
	
	<fieldset1>
		<div>
			<label for="firstName">First Name</label><span><?php echo($customerFirstNameErrMessage); ?></span>
			<input id="firstName" name="firstName" type="text" value="<?php echo($inCustomerFirstName); ?>">
		</div>
		
		<div>
			<label for="lastName">Last Name</label><span><?php echo($customerLastNameErrMessage); ?></span>
			<input id="lastName" name="lastName" type="text" value="<?php echo($inCustomerLastName); ?>">
		</div>
		
		<div>
			<label for="customerEmail">Email Address</label><span><?php echo($customerEmailErrMessage); ?></span>
			<input id="customerEmail" name="customerEmail" type="text" placeholder="name@anywhere.com" value="<?php echo($inCustomerEmail); ?>">
		</div>
		<div>
			<label for="topic">Topic</label><span><?php echo($topicErrMessage); ?></span>
			<select id="topic" name="topic">
				<option value="default"<?php if($inTopic == "default"){echo("selected");}?></option>>---Select Your Topic---</option>
				<option value="Adoption" <?php if($inTopic == "Adoption"){echo("selected");}?>> Adoption</option>
				<option value="Volunteering" <?php if($inTopic == "Volunteering"){echo("selected");}?>> Volunteering</option>
				<option value="Spay/Neuter Clinic" <?php if($inTopic == "Spay/Neuter Clinic"){echo("selected");}?>>SPAY/NEUTER CLINIC</option>
				<option value="Animal Rescue" <?php if($inTopic == "Animal Rescue"){echo("selected");}?>>ANIMAL RESCUE</option>
				<option value="Rehabilitation" <?php if($inTopic == "Rehabilitation"){echo("selected");}?>>REHABILITATION</option>
				<option value="Event Questions" <?php if($inTopic == "Event Questions"){echo("selected");}?>>EVENT QUESTIONS</option>
				<option value="Other" <?php if($inTopic == "Other"){echo("selected");}?>>OTHER</option>
			</select>
			
		</div>
	</fieldset1>
	
	<fieldset2>
		<div>
			<label for="message"> Message</label><span><?php echo($messageErrMessage); ?></span>
			<textarea id="message" name="message" rows="10" cols="45"><?php echo($inMessage); ?></textarea>
		</div>
		
		<div>
			<input type="submit" id="submitEmail" name="submitEmail" value="Submit">
			<input type="submit" id="button2" name="button" value="Reset">
		</div>
		<div><p><strong><center><a href="index.php">Back to website</a></center></strong></p></div>
	</fieldset2>
	</form>
</div><!--close formcontainer-->
</body>

</html>