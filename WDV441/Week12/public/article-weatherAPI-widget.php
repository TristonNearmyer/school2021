<?php
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();


	// create curl resource
	$ch = curl_init();

	// set url
	curl_setopt($ch, CURLOPT_URL, "http://api.weatherunlocked.com/api/current/51.50,-0.12?app_id=7fd520b8&app_key=17d7acce963b3a759f88ec7df0e4362c");

	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));

	// if redirected, follow it
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36";

	curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

	// $output contains the output string
	$weatherWidget = curl_exec($ch);

	// close curl resource to free up system resources
	curl_close($ch);     

/*
// testing the search
$articleList = $newsArticle->getList(
    "articleID",
    "DESC",
    "articleTitle",
    "Article"
);

var_dump($articleList);die;
*/

$articleList = $newsArticle->getList(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

//$weatherWidget = explode("}" , $weatherWidget);

$currentWeather = json_decode($weatherWidget);


//var_dump($articleList);

require_once("../tpl/article-weatherAPI-widget.tpl.php");

?>