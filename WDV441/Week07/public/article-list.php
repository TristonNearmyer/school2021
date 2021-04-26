<?php

session_cache_limiter('none');			//This prevents a Chrome error when using the back button to return to this page

session_start();

require_once('../inc/NewsArticles.class.php');

require_once('../inc/logInClass.php');

$newsArticle = new NewsArticles();

$articleList = $newsArticle->getList();

$users = new logIn();

$usersList = $users->getList();

//var_dump($articleList); die;

require_once('../tpl/article-list.tpl.php');

?>