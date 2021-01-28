<?php



//print_r($_POST);



$emailToLogin = "";



$firstName = "";



$lastName = "";



$program = "";



$program2 = "";



$websiteAddress = "";



$email = "";



$linkedIn = "";



$hometown = "";



$careerGoals = "";



$threeWords = "";



$inRobotest = "";



$submitConfirm = "";





//error messages



$emailToLoginErrMsg = "";



$firstNameErrMsg = "";



$lastNameErrMsg = "";



$programErrMsg = "";



$program2ErrMsg = "";



$websiteAddressErrMsg = "";



$emailErrMsg = "";



$linkedInErrMsg = "";



$hometownErrMsg = "";



$careerGoalsErrMsg = "";



$threeWordsErrMsg = "";



$inRobotestErrMsg = "";



$submitConfirmErrMsg = "";





$validForm = true;



if(isset($_POST["submitBio"])){



	$emailToLogin = $_POST["emailToLogin"];



	$firstName = $_POST["firstName"];



	$lastName = $_POST["lastName"];



	if(isset($_POST["program"])){



		$program = $_POST["program"];



	}



	if(isset($_POST["program2"])){



		$program2 = $_POST["program2"];



	}



	$websiteAddress = $_POST["websiteAddress"];



	$email = $_POST["email"];



	$linkedIn = $_POST["linkedIn"];



	$hometown = $_POST["hometown"];



	$careerGoals = $_POST["careerGoals"];



	$threeWords = $_POST["threeWords"];



	$inRobotest = $_POST["inRobotest"];



	// echo("$emailToLogin");



	// echo("$firstName");



	// echo("$lastName");



	// echo("$program");



	// echo("$program2");



	// echo("$websiteAddress");



	// echo("$email");



	// echo("$linkedIn");



	// echo("$hometown");



	// echo("$careerGoals");



	// echo("$threeWords");



	// echo("$inRobotest");











$validForm = true;





function validateLogin($login)

		{

			global $validForm, $emailToLogin, $emailToLoginErrMsg;

			$emailToLoginErrMsg = "";

			$login = trim($login);

			if($login == "")

			{

				$validForm = false;

				$emailToLoginErrMsg = "Please enter a login email address";

			}



			elseif (!filter_var($login, FILTER_VALIDATE_EMAIL)) {

				$validForm = false;

				$emailToLoginErrMsg = "Please enter a valid login email address";

			}

		}

function validateFirstName($firstName)

							{

								global $validForm, $firstNameErrMsg;

								$firstNameErrMsg = "";

								$firstName = trim($firstName);

								if($firstName == "")

								{

									$validForm = false;

									$firstNameErrMsg = "Name cannot be blank";

								}

								elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $firstName))

								{

									$validForm = false;

									$firstNameErrMsg = "No special characters";

								}

							}

function validateLastName($lastName)

	{

		global $validForm, $lastNameErrMsg;

		$lastNameErrMsg = "";

		$lastName = trim($lastName);

		if($lastName == "")

		{

			$validForm = false;

			$lastNameErrMsg = "Name cannot be blank";

		}

		elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $lastName))

		{

			$validForm = false;

			$lastNameErrMsg = "No special characters";

		}

	}



function validateProgram($program)

	{

		global $validForm, $programErrMsg;

		$programErrMsg = "";

		if($program == "default")

		{

			$validForm = false;

			$programErrMsg = "Choose a program";

		}

	}



function validateProgram2($secondProgram)

		{

			global $validForm, $program2ErrMsg;

			$program2ErrMsg = "";

			if($secondProgram == "none")

			{

				$validForm = false;

				$program2ErrMsg = "Choose a program";

			}

		}

function validateWebsiteAddress($webAddress)

		{

			global $validForm, $websiteAddressErrMsg;

			$websiteAddressErrMsg = "";

			if($webAddress == "")

			{

				$validForm = false;

				$websiteAddressErrMsg = "Please enter a website address";

			}



			elseif (!filter_var($webAddress, FILTER_VALIDATE_URL)) {

				$validForm = false;

				$websiteAddressErrMsg = "Please enter a valid website address";

			}

		}

function validateEmail($email)

		{

			global $validForm, $emailErrMsg;

			$emailErrMsg = "";

			if($email == "")

			{

				$validForm = false;

				$emailErrMsg = "Please enter a email address";

			}



			elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

				$validForm = false;

				$emailErrMsg = "Please enter a valid email address";

			}

		}



function validateLinkedIn($linkedIn)

		{

			global $validForm, $linkedInErrMsg;

			$linkedInErrMsg = "";

			if($linkedIn == "")

			{

				$validForm = false;

				$linkedInErrMsg = "Please enter a LinkedIn URL";

			}



			elseif (!preg_match("/^https?:\\/\\/[a-z]{2,3}\\.linkedin\\.com\\/.*$/", $linkedIn))

			{

				$validForm = false;

				$linkedInErrMsg = "Please enter a valid LinkedIn URL";

			}

		}

function validateHometown($homeTown)

	{

		global $validForm, $hometownErrMsg;

		$hometownErrMsg = "";

		$homeTown = trim($homeTown);

		if($homeTown == "")

		{

			$validForm = false;

			$hometownErrMsg = "Name cannot be blank";

		}

		elseif (!preg_match("/^[a-zA-Z0-9,V ]*$/", $homeTown))

		{

			$validForm = false;

			$hometownErrMsg = "No special characters";

		}

	}



	function validateCareerGoals($careerGoals)

		{

				//valid three-words should include only numbers, letters, spaces, and basic punctuation

				global $validForm, $careerGoalsErrMsg; //Use the GLOBAL Version of these variables instead of making them local

				$careerGoalsErrMsg = ""; //Clear the error message.

				$careerGoals= trim($careerGoals);



				if(empty($careerGoals))

				{

						$validForm = false; //Invalid name so the form is invalid

						$careerGoalsErrMsg = "You cannot leave this section blank"; //Error message for this validation

				}

				elseif ( $careerGoals !== htmlspecialchars($careerGoals))

				{

					$validForm = false; //Invalid name so the form is invalid

					$careerGoalsErrMsg = "Letters, numbers,  and basic punctuation only " ; //Error message for this validation

				}

				else{

				//replace commas, double spaces

					$a = $careerGoals;

					$a = str_replace("," , " ",$a );

					$lastCount=0;



				while ($lastCount != strlen($a))

				{

					$lastCount = strlen($a);

					$a =  str_replace("  "," ",$a);

				}

				//Convert space delimited string to array

				$pieces = explode(" ", $a);

				//print_r($pieces);



			}

		}

function validateThreeWords($threeWords)

	{

			//valid three-words should include only numbers, letters, spaces, and basic punctuation

			global $validForm, $threeWordsErrMsg; //Use the GLOBAL Version of these variables instead of making them local

			$threeWordsErrMsg = ""; //Clear the error message.

			$threeWords= trim($threeWords);



			if(empty($threeWords))

			{

					$validForm = false; //Invalid name so the form is invalid

					$threeWordsErrMsg = "Three word description is required"; //Error message for this validation

			}

			elseif ( $threeWords !== htmlspecialchars($threeWords))

			{

				$validForm = false; //Invalid name so the form is invalid

				$threeWordsErrMsg = "Letters numbers,  and basic punctuation only " ; //Error message for this validation

			}

			else{

			//replace commas, double spaces

				$a = $threeWords;

				$a = str_replace("," , " ",$a );

				$lastCount=0;



			while ($lastCount != strlen($a))

			{

				$lastCount = strlen($a);

				$a =  str_replace("  "," ",$a);

			}

			//Convert space delimited string to array

			$pieces = explode(" ", $a);

			//print_r($pieces);



			//make sure that there are three adjectives

			if (count($pieces) !== 3)

			{

				$validForm = false; //Invalid name so the form is invalid

				$threeWordsErrMsg = "Three word description is required"; //Error message for this validation

			}

		}

	}

validateLogin($emailToLogin);

	//echo $emailToLoginErrMsg;

validateFirstName($firstName);

validateLastName($lastName);

validateProgram($program);

validateProgram2($program2);

validateWebsiteAddress($websiteAddress);

validateEmail($email);

validateLinkedIn($linkedIn);

validateHometown($hometown);

validateCareerGoals($careerGoals);

validateThreeWords($threeWords);



if($validForm)	//Check the form flag.  If it is still true all the data is valid and the form is ready to process

	{

		// The form  data is valid and can be processed into your database.

		echo "<html><body><h1>Thank you for your registering.</h1>";

		echo "<p>You have been successfully registered.</p>";

		echo "<p>You will recieve an email confirmation delivered to $email.</p>";

		echo "</body></html>";

		exit();		//Finishes the page so it does not display the form again.

	}

}



//echo("<p>test</p>");





/*

 Input Field validations.

validateFirstName

	// valid first name should only include letters, numbers, and spaces

	// ... must be present

validateLastName

	// valid last name should only include letters, numbers and spaces

	// ... must be present

validateProgram

	//valid program must not be default options

validateWebsiteAddress

	//valid URL format

validateWebsiteAddress2

	//valid URL format

validateLinkedIn

	//valid URL to linkedin.com

validateEmail

	//valid email should be in a proper format

	//Matches: bob@aol.com | bob@wrox.co.uk | bob@domain.info |123@123.123

	//Non-Matches: a@b | notanemail | bob@@.

validateHometown

	// valid name should only include letters, numbers, spaces, and commas

	// ... must be present

validateCareerGoals

	//valid career goals should include only numbers, letters, spaces, and basic punctuation

validateThreeWords

	//valid three-words should include only numbers, letters, spaces, and basic punctuation

*/





?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <title>DMACC Portfolio Day Bio Form</title>

  <meta name="author" content="">

  <meta name="description" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1">



  <link href="css/normalize.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">



  <!-- css3-mediaqueries.js for IE less than 9 -->



<script src="css3-mediaqueries.js"></script>

<script src="jquery-3.2.1.js"></script>

<script>



	$(document).ready(function(){

		if( $("select[name=program]	option:selected").val() == "webDevelopment")

		{

			$(".secondWeb").css("display", "inline");

		}

		else

		{

			$(".secondWeb").css("display", "none");

		}



		$("select#program").change(function(){

			if( $("select#program option:checked").val() == "webDevelopment")

			{

				$(".secondWeb").css("display", "inline");

			}

			else

			{

				$(".secondWeb").css("display", "none");

			}

		});



		function resetForm(){

			$("#firstName").val("");

			$("#lastName").val("");

			$("#program").val("default");

			$("#websiteAddress").val("");

			$("#websiteAddress2").val("");

			$("#email").val("");

			$("#hometown").val("");

			$("#careerGoals").val("");

			$("#threeWords").val("");

		}

	});





	</script>



  <style>

	img{

		display: block;

		margin: 0 auto;

	}

	.frame{

		background-image: url("orange popsicle.jpg");

		padding: 1em;

	}

	.frame2{

		background-image: url("citrus.jpg");

		padding: 1.3em;

	}

	body{

		background-image: url("bodacious.png");

		margin: 1.5em;

	}



	.main {

		padding: 1em;

		background-color: white;

	}

	form{

		text-align: center;

	}

	h2 {

		text-align: center;

	}

	.robotic{

		display: none;

	}



	.form {

		background-color:white;

		padding-left: 5em;

	}

	p {

		align:left;

	}

	.citrus{

		margin: auto;

		background-image: url("raspberry.jpg");

		padding: 1.3em;

		width: 70%;

	}

	.bamboo{

		background-image: url("bamboo.jpg");

		padding: 1em;

	}

	.violet{

		background-image: url("ultra violet.png");

		padding: .5em;

	}

	.secondWeb{

		display: none;

	}

	table{

		margin: auto;

	}

	table td{

		padding-bottom: .75em;

	}

	.error{

		font-style: italic;

		color: #d42a58;

		font-weight: bold;

	}



@media only screen and (max-width:620px) {

  /* For mobile phones: */

  img {

    width:100%;

  }

  .form {

	width:100%;

	padding-left: .1em;

	padding-top: .1em;

  }

  .citrus {

	background-image:none;

  }

  .bamboo {

	background-image:none;

  }

  .violet {

	background-image:none;

  }

  .secondWeb{

		display: none;

	}

  table{

		margin: auto;

	}

  table td{

		padding-bottom: .5em;

	}

}



  </style>



<!-- Input Field validations.

validateFirstName

	// valid first name should only include letters, numbers, and spaces

	// ... must be present

validateLastName

	// valid last name should only include letters, numbers and spaces

	// ... must be present

validateProgram

	//valid program must not be default options

validateWebsiteAddress

	//valid URL format

validateWebsiteAddress2

	//valid URL format

validateLinkedIn

	//valid URL to linkedin.com

validateEmail

	//valid email should be in a proper format

	//Matches: bob@aol.com | bob@wrox.co.uk | bob@domain.info |123@123.123

	//Non-Matches: a@b | notanemail | bob@@.

validateHometown

	// valid name should only include letters, numbers, spaces, and commas

	// ... must be present

validateCareerGoals

	//valid career goals should include only numbers, letters, spaces, and basic punctuation

validateThreeWords

	//valid three-words should include only numbers, letters, spaces, and basic punctuation

-->



</head>



<section class="orange">

<body>

<div class="frame2">

<div class="frame">



  <div class="main">

  <div><img src="madonna.gif" alt="Mix gif" ></div>

  <br>



<!--<a href = 'dmaccPortfolioDayLogout.php'>Log Out</a>-->



<section class="citrus">

<section class="bamboo">

<section class="violet">



	<div class="main form">



	<h2></h2>

	</table>

	<form id="portfolioBioForm" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">



		<table>

		<tr>

		<td>Login Email:<br> <input type="text" id="emailToLogin" name="emailToLogin" value="<?php echo("$emailToLogin"); ?>"/><span class="error"><?php echo("$emailToLoginErrMsg");?></span></td>

		</tr>

		<tr>

		<td>First Name:<br> <input type="text" id="firstName" name="firstName" value="<?php echo("$firstName"); ?>"/><br><span class="error" id="firstNameError"><?php echo("$firstNameErrMsg");?></span></td>

		</tr>

		<tr>

		<td>Last Name:<br> <input type="text" id="lastName" name="lastName" value="<?php echo("$lastName"); ?>" /><br><span class="error" id="lastNameError"><?php echo("$lastNameErrMsg");?></span></td>

		</tr>

		<tr>

		<td >Program:<br> <select id="program" name="program">



				<option value="default"<?php if($program == "default"){echo("selected");}?></option>>---Select Your Program---</option>

				<option value="animation" <?php if($program == "animation"){echo("selected");}?> >Animation</option>

				<option value="graphicDesign" <?php if($program == "graphicDesign"){echo("selected");}?>>Graphic Design</option>

				<option value="photography" <?php if($program == "photography"){echo("selected");}?>>Photography</option>

				<option value="videoProduction" <?php if($program == "videoProduction"){echo("selected");}?>>Video Production</option>

				<option value="webDevelopment" <?php if($program == "webDevelopment"){echo("selected");}?>>Web Development</option>

			</select><br><span class="error" id="programError"></span><td>

			<span class="error"><?php echo("$programErrMsg");?></span>

		</tr>

		<tr>

		<td >Secondary Program:<br> <select id="program2" name="program2">

				<option value="none"<?php if($program2 == "none"){echo("selected");}?> >---No Secondary Program---</option>

				<option value="animation" <?php if($program2 == "animation"){echo("selected");}?> >Animation</option>

				<option value="graphicDesign" <?php if($program2 == "graphicDesign"){echo("selected");}?> >Graphic Design</option>

				<option value="photography" <?php if($program2 == "photography"){echo("selected");}?> >Photography</option>

				<option value="videoProduction" <?php if($program2 == "videoProduction"){echo("selected");}?>>Video Production</option>

				<option value="webDevelopment" <?php if($program2 == "webDevelopment"){echo("selected");}?> >Web Development</option>

			</select><br><span class="error" id="program2Error"></span><td>

			<span class="error"><?php echo("$program2ErrMsg");?></span>

		</tr>

		<tr>

		<td>Website Address:<br> <input type="text" id="websiteAddress" name="websiteAddress" value="<?php echo("$websiteAddress"); ?>" /><br><span class="error" id="websiteAddressError"><?php echo("$websiteAddressErrMsg");?></span></td>

		</tr>

		<tr>

		<td>Personal Email:<br><input type="text" id="email" name="email" value="<?php echo("$email"); ?>"/><br><span class="error" id="emailError"><?php echo("$emailErrMsg");?></span></td>

		</tr>

		<tr>

		<td>LinkedIn Profile:<br><input type="text" id="linkedIn" name="linkedIn" value="<?php echo("$linkedIn"); ?>" /><br><span class="error" id="linkedInError"><?php echo("$linkedInErrMsg");?></span></td>

		<tr>

		<td><span class="secondWeb">Secondary Website Address (git repository, etc.):<br> <input type="text" id="websiteAddress2" name="websiteAddress2" value=""/><br><span class="error" id="websiteAddress2Error"></span></span></td>

		</tr>

		<tr>

		<td>Hometown:<br> <input type="text" id="hometown" name="hometown" value="<?php echo("$hometown"); ?>" /><br><span class="error" id="hometownError"><?php echo("$hometownErrMsg");?></span></td>

		</tr>

		<tr>

		<td>Career Goals:<br> <textarea id="careerGoals" name="careerGoals"><?php echo("$careerGoals"); ?></textarea><br><span class="error" id="careerGoalsError"><?php echo("$careerGoalsErrMsg");?></span></td>

		</tr>

		<tr>

		<td>3 Words that Describe You:<br> <input type="text" id="threeWords" name="threeWords" value="<?php echo("$threeWords"); ?>" /><br><span class="error" id="threeWordsError"><?php echo("$threeWordsErrMsg");?></span></td>

		<p class="robotic" id="pot">

			<label>Leave Blank</label>

			<input type="hidden" name="inRobotest" id="inRobotest" class="inRobotest" />

		</p>

		<input type="hidden" id="submitConfirm" name="submitConfirm" value="submitConfirm"/>

		</tr>

		<tr>

		<td><input type="submit" id="submitBio" name="submitBio" value="Submit Bio" /></td>

		</tr>

		<tr>

		<td><input type="reset" id="resetBio" name="resetBio" value="Reset Bio"/></td>

		</tr>

		</table>

	</form>



	</div>





</section>

</section>

</section>



</div>



</body>

</section>



</html>

© 2020 GitHub, Inc.