<?php

session_cache_limiter('none');			//This prevents a Chrome error when using the back button to return to this page

session_start();

require_once('../inc/Users.class.php');

$user = new Users();

$userList = $user->getList();

//var_dump($articleList); die;

// display the view
require_once('../tpl/user-list.tpl.php');
?>