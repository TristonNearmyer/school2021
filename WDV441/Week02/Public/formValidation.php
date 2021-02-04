<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Validate Forms</title>
	<?php
	
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
				
				
				
				//$inDate = explode("/",$inDate);
				
				echo("<script>console.log($inDate);</script>");
				
				$month = intval($inDate[0]);
				$day = intval($inDate[1]);
				$year = intval($inDate[2]);
				
				if(checkdate($month,$day,$year)){
					
				}
				else{
					$dateOfBirthErrMessage = "please enter valid date";
				}
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
			validateDateOfBirth($dateOfBirth);
			
			if($validForm){
				
				echo("<script>alert('the form has been submitted');</script>");
				
			}else{
				echo("<script>alert('an error has occured, please try again');</script>");
			}
			
		}
	
	?>
</head>

<body>
	
	<div class="form">
		<form method="post" id="form">
		
			<label for="firstName">Enter first name:</label>	
			<input type="text" id="firstName" name="firstName"><br>

			<label for="lastName">Enter last name:</label>
			<input type="text" id="lastName" name="lastName"><br>

			<label for="dateOfBirth">Enter your date of birth:</label>
			<input type="date" id="dateOfBirth" name="dateOfBirth"><br>

			<label for="userEmail">Enter your Email:</label>
			<input type="email" id="userEmail" name="userEmail"><br>

			<label for="userMessage">Message:</label>
			<textarea id="userMessage" name="userMessage"></textarea><br>

			<input type="submit" id="submitForm" name="submitForm" value="Submit">
			<input type="reset" id="resetForm">
			
		</form>
	</div>
	
	
</body>
</html>