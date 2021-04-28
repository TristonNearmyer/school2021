<?php

session_cache_limiter('none');			//This prevents a Chrome error when using the back button to return to this page

session_start();

require_once("../inc/users.class.php");

$logIn = new Users();

$logInDataArray = array();
$logInErrorsArray = array();
$logInInfo = array();

if (isset($_POST['Cancel'])) {
	header("location: user-list.php");
	exit;
}

if (isset($_POST['logIn'])){
	
	$logInDataArray = $logIn->sanitize($_POST);
	
	$logIn->set($logInDataArray);
	
	if ($logIn->validate()){
		
		$logInInfo = $logIn->data;
		
		
		
		if ($logIn->userLogin($logInInfo['username'],$logInInfo['password'])) {
			
			header("location: user-list.php");
		}
		
		else{
			
			$logInErrorsArray = $logIn->errors;
			$logInDataArray = $logIn->data;
			
		}
		
	}
	
	else{
			
			$logInErrorsArray = $logIn->errors;
			$logInDataArray = $logIn->data;
			
		}
	
	
	
}

require_once("../tpl/user-logIn.tpl.php");

?>