<?php
// usage: http://localhost/Week05/public/article-view.php?articleID=1
require_once('../inc/logInClass.php');

$user = new logIn();

$userDataArray = array();

// load the article if we have it
if (isset($_REQUEST['userID']) && $_REQUEST['userID'] > 0) {
    $user->loadUser($_REQUEST['userID']);
    $userDataArray = $user->logInData;
}

require_once('../tpl/user-view.tpl.php');
?>