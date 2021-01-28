<?php

	require("dbConnect.php");

$inUserId = "";
$inUsername = "";
$inPassword = "";

	if(isset($_POST["submitForm"])){
		$newUsername = $_POST["Username"];
		$newUserPassword = $_POST["Password"];
		
		$validForm = true ;
		 
		if($validForm){
	//PDO prepared statements

	//1: prepare the sql statement

	$sql = "INSERT INTO ptg_users (ptg_user_name, ptg_user_password)
			VALUES (:newUsername, :newUserPassword )";

	//2: create the prepared statement object

	$stmt = $conn->prepare($sql);

	//3:bind paramaters to the prepared statement object

	$stmt->bindParam(':newUsername', $newUsername);
	$stmt->bindParam(':newUserPassword', $newUserPassword);

	//4:Execute the prepared statement

	$stmt->execute();
	
	echo("<script type='text/javascript'> alert('Welcome to the team!'); </script>");
}
	}
		
$conn = null;

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sign Up</title>
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
	background-color:#9bd;
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
<form id="signUp_form" method ="post">
	<legend>Sign Up!</legend>
		<p style="font-style:italic;">Sign up! we'd love to have you.</p>
	
	<fieldset1>
		<div>
			<label for="firstName">Username</label>
			<input id="Username" name="Username" type="text" value="">
		</div>
		
		<div>
			<label for="Password">Password</label>
			<input id="Password" name="Password" type="text" value="">
		</div>
		
	</fieldset1>
	
	<fieldset2>
		
		<div>
			<input type="submit" id="submitForm" name="submitForm" value="Submit">
			<input type="submit" id="button2" name="button" value="Reset">
		</div>
	</fieldset2>
	</form>
</div><!--close formcontainer-->
</body>
</html>
