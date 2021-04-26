<?php

session_cache_limiter('none');			//This prevents a Chrome error when using the back button to return to this page

session_start();

require_once("../inc/logInClass.php");

$logIn = new logIn();

$logInDataArray = array();
$logInErrorsArray = array();
$logInInfo = array();

if (isset($_POST['Cancel'])) {
	header("location: article-list.php");
	exit;
}

if (isset($_POST['logIn'])){
	
	$logInDataArray = $logIn->sanitize($_POST);
	
	$logIn->set($logInDataArray);
	
	if ($logIn->validate()){
		
		$logInInfo = $logIn->logInData;
		
		if ($logIn->checkLogIn($logInInfo)) {
			header("location: article-list.php");
		}
		
		else{
			
			$logInErrorsArray = $logIn->logInErrors;
			$logInDataArray = $logIn->logInData;
			
		}
		
	}
	
	else{
			
			$logInErrorsArray = $logIn->logInErrors;
			$logInDataArray = $logIn->logInData;
			
		}
	
	
	
}

require_once("../tpl/logInPage.tpl.php");

?>