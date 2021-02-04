<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Validate Forms</title>
	<?php
	
	require("../Inc/Emailer.php");
	
		$firstName = "";
		$lastName = "";
		$dateOfBirth = "";
		$userEmail = "";
		$userMessage = "";
	
		$firstNameErrMessage = "";
		$lastNameErrMessage = "";
		$dateOfBirthErrMessage = "";
		$userEmailErrMessage = "";
		$userMessageErrMessage = "";
	
	
		if(isset($_POST["submitForm"])){
			
			$firstName = $_POST["firstName"];
			$lastName = $_POST["lastName"];
			$dateOfBirth = $_POST["dateOfBirth"];
			$userEmail = $_POST["userEmail"];
			$userMessage = $_POST["userMessage"];
			
			$validForm = true;
			
			function validateFirstName($inName){
				global $validForm, $firstNameErrMessage ;
			
				$firstNameErrMessage = "";

				$inName = trim($inName);

				if($inName == ""){
					$validForm = false;

					$firstNameErrMessage = "Name cannot be empty";
				}

				elseif (!preg_match("/^[a-zA-Z ]*$/", $inName)){

				$validForm = false;

				$firstNameErrMessage = "No special characters or numbers";
				}
			}
			
			function validateLastName($inName){
				global $validForm, $lastNameErrMessage ;
			
				$lastNameErrMessage = "";

				$inName = trim($inName);

				if($inName == ""){
					$validForm = false;

					$lastNameErrMessage = "Name cannot be empty";
				}

				elseif (!preg_match("/^[a-zA-Z ]*$/", $inName)){

				$validForm = false;

				$lastNameErrMessage = "No special characters or numbers";
				}
			}
			
			function validateDateOfBirth($inDate){
				global $validForm, $dateOfBirthErrMessage;
				
				$dateOfBirthErrMessage = "";
				
				if (false === strtotime($inDate)) { 
					return false;
				} 
				list($year, $month, $day) = explode('-', $inDate); 
				
				return checkdate($month, $day, $year);

				/*$inDate = explode("/",$inDate);
				
				echo("<script>console.log($inDate);</script>");
				
				$month = intval($inDate[0]);
				$day = intval($inDate[1]);
				$year = intval($inDate[2]);
				
				if(checkdate($month,$day,$year)){
					
				}
				else{
					$dateOfBirthErrMessage = "please enter valid date";
				}*/
			}
			
			function validateUserEmail($inEmail){
				global $validForm, $userEmailErrMessage;
			
				$userEmailErrMessage = "";

				$inEmail = trim($inEmail);

				if($inEmail == ""){
					$validForm = false;

					$userEmailErrMessage = "email must be filled";
				}

				elseif (!filter_var($inEmail, FILTER_VALIDATE_EMAIL)) {
					$validForm = false;

					$userEmailErrMessage = "please enter a valid email";
				}
			}
			
			function validateUserMessage($inMessage){
				global $validForm, $userMessageErrMessage;
				
				$userMessageErrMessage = "";

				$inMessage = trim($inMessage);

				if($inMessage == ""){
					$validForm = false;

					$userMessageErrMessage = "cannot be empty";
				}
				
			}
			
			validateFirstName($firstName);
			validateLastName($lastName);
			validateUserEmail($userEmail);
			if (validateDateOfBirth($dateOfBirth)){
				
			}else{
				$validForm = false;
				$dateOfBirthErrMessage = "please select a valid date";
			};
			
			if($validForm){
				
				echo("<script>alert('the form has been submitted');</script>");
				
				$emailTest = new Emailer(); 
	
				$emailTest->setSenderEmail("gbgrandberg@dmacc.edu");

				$emailTest->setRecipientEmail($userEmail);

				$emailTest->setCustomerInfo($userEmail, $firstName, $lastName);

				$emailTest->setSubject("week 2 homework");

				$emailTest->setMessage($firstName, $lastName, $dateOfBirth, $userEmail, $userMessage);



				$emailTest->sendEmail();
				
			}else{
				echo("<script>alert('an error has occured, please try again');</script>");
			}
			
		}
	
	?>
</head>

<body>
	
	<div class="form">
		<form method="post" id="form">
		
			<label for="firstName">Enter first name: <?php echo($firstNameErrMessage); ?></label>	
			<input type="text" id="firstName" name="firstName"><br>

			<label for="lastName">Enter last name:<?php echo($lastNameErrMessage); ?></label>
			<input type="text" id="lastName" name="lastName"><br>

			<label for="dateOfBirth">Enter your date of birth:<?php echo($dateOfBirthErrMessage); ?></label>
			<input type="date" id="dateOfBirth" name="dateOfBirth" min="1921-01-01" max="2021-02-04"><br>

			<label for="userEmail">Enter your Email:<?php echo($userEmailErrMessage); ?></label>
			<input type="email" id="userEmail" name="userEmail"><br>

			<label for="userMessage">Message:<?php echo($userMessageErrMessage); ?></label>
			<textarea id="userMessage" name="userMessage"></textarea><br>

			<input type="submit" id="submitForm" name="submitForm" value="Submit">
			<input type="reset" id="resetForm">
			
		</form>
	</div>
	
	
</body>
</html>