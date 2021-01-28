<?php
session_cache_limiter('none');			//This prevents a Chrome error when using the back button to return to this page

session_start();

$inUsername ="";
$inPassword = "";

$passwordErrMessage = "";
$usernameErrMessage = "";

if(isset($_SESSION["Administrator"])){
	
	
	$message = "Welcome Back! ";
	
}

else
	{
		if (isset($_POST['submitLogin']) )			//Was this page called from a submitted form?
		{
			$inUsername = $_POST['loginUsername'];	//pull the username from the form
			$inPassword = $_POST['loginPassword'];	//pull the password from the form
			
			$validForm = true ; 
			
			include 'dbConnect.php';				//Connect to the database
			
			function validateUsername($inVal){
				global $validForm , $usernameErrMessage ;
				
				$usernameErrMessage = "";
				
				$inVal = trim($inVal);
				
				if($inVal == ""){
					$validForm = false ;
					
					$usernameErrMessage = "please enter your username";
				}
			}
			
			function validatePassword($inVal){
				global $validForm, $passwordErrMessage;
				
				$passwordErrMessage = "";
				
				$inVal = trim($inVal);
				
				if($inVal == ""){
					$validForm = false;
					
					$passwordErrMessage = "please enter your password";
				}
			}
			
			if($validForm){
			

			$query = "SELECT ptg_user_name,ptg_user_password FROM ptg_users WHERE ptg_user_name = :Username AND ptg_user_password = :Password";				
			
			$stmt = $conn->prepare($query) ;	//prepare the query
			
			$stmt->execute(
				array('Username' => $_POST["loginUsername"],
					 'Password' => $_POST["loginPassword"]
					 )
			);
			
			$count = $stmt->rowCount();
			
			if($count > 0){
				$_SESSION["Administrator"] = "valid user";
				header("location:index.php");
			}
			
			else{
				$errMessage = "incorrect username and password";
			}
			
			
			}
			
			else{
				echo("<script>alert('unable to login');</script>");
				header("location: index.php");
				$msg = "there has been an error on petsLogin";
				mail("contact@tristonnearmyer", "error" , $msg);
			}
		}
			
		}//end if submitted

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log in page</title>
	
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
	background-color:gray;
	}
	
#formcontainer{
	background-color:lightgray;
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
	
label{
	order:1;
	width:10em;
	text-align:right;
	padding-right:0.5em;
	}

	
input[type=submit], input[type=reset]{
	color:white;
	background-color:black;
	border-radius:50px;
	padding:6px;
	width:100px;
	margin:25px;
	}

</style>

	
</head>

<body>
	<div id="formcontainer">
	<h1>Login to Pets-To-Go</h1>

<?php if(isset($errMessage)){
			echo("<h1> $errMessage </h1>");
		} ?>

<?php
	if (isset($_SESSION['Administrator']))	//This is a valid user.  Show them the Administrator Page
	{
		
//turn off PHP and turn on HTML
?>
		<h3>Presenters Administrator Options</h3>
        <p><a href="presentersInsertForm.php">Input New Presenter</a></p>
        <p><a href="presentersSelectView.php">List of Presenters</a></p>
        <p><a href="petsLogout.php">Logout of PTG Admin System</a></p>	
        					
<?php
	}
	else									//The user needs to log in.  Display the Login Form
	{
?>
			<h2>Please login to the Administrator System</h2>
                <form method="post" name="loginForm" action="petsLogin.php" >
                  <p>Username: <input name="loginUsername" type="text" /></p>
                  <p>Password: <input name="loginPassword" type="password" /></p>
                  <p><input name="submitLogin" value="Login" type="submit" /> <input name="" type="reset" />&nbsp;</p>
                </form>
                
<?php //turn off HTML and turn on PHP
	}//end of checking for a valid user
			
//turn off PHP and begin HTML			
?>
	

</div><!--close formcontainer-->

</body>
</html>