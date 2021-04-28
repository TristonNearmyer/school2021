<?php

session_cache_limiter('none');			//This prevents a Chrome error when using the back button to return to this page

session_start();

require_once('../inc/Users.class.php');

// create an instance of the news article class
$users = new Users();

$userList = array();

// download report
if (isset($_GET['download']) && $_GET['download'] == "1") {
	
	// echo the data
	$userList = $users->getList(
		(isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
		(isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
		(isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
		(isset($_GET['filterText']) ? $_GET['filterText'] : null),
		null
	);
//var_dump($articleList);die;	
	
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="' . date("YmdHis") . '_user_report.csv"');
	
	foreach ($userList as $rowData) {
		echo implode('","', $rowData);
		echo "\r\n";
	}
	
	exit;
}

// check to see if button was click
if (isset($_GET['btnViewReport'])) {
    // run report
	$userList = $users->getList(
		(isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
		(isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
		(isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
		(isset($_GET['filterText']) ? $_GET['filterText'] : null),
		(isset($_GET['page']) ? $_GET['page'] : 1)
	);
}

$_GET['page'] = (isset($_GET['page']) ? $_GET['page'] + 1 : 2);
$nextPageLink = http_build_query($_GET);

//var_dump($_SERVER["QUERY_STRING"], $_GET);die;



include('../tpl/user-report.tpl.php');
?>