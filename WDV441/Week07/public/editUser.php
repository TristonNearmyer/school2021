<?php
// usage: http://localhost/Week05/public/article-edit.php?articleID=1
// usage new: http://localhost/Week05/public/article-edit.php
require_once("../inc/logInClass.php");
// create an instance of our class so we can use it
$newUser = new logIn();

// initialize some variables to be used by our view
$newUserDataArray = array();
$newUserErrorsArray = array();

// load the article if we have it
if (isset($_REQUEST['userID']) && $_REQUEST['userID'] > 0) {
    $newUser->loadUser($_REQUEST['userID']);
    // set our article array to our local variable
    $newUserDataArray = $newUser->logInData;
}

if (isset($_POST['Cancel'])) {
	header("location: article-list.php");
	exit;
}

// apply the data if we have new data
if (isset($_POST['Save'])) {
    // sanitize and set the post array to our local variable
    $newUserDataArray = $newUser->sanitize($_POST);
    // pass the array into our instance
    $newUser->set($newUserDataArray);
    
    // validate
    if ($newUser->validate()) {
        // save
        if ($newUser->addNewUser()) {
            header("location: article-save-success.php");
            exit;
        } else {
            $newUserErrorsArray[] = "Save failed";
        }
    } else {
        $newUserErrorsArray = $newUser->logInErrors;
        $newUserDataArray = $newUser->logInData;
    }
}

require_once('../tpl/editUser.tpl.php');
?>