<?php


$serverName = "localhost";
$username = "tnearmyer1_wdv341";
$password = "Tn42238665!";
$databaseName = "tnearmyer1_wdv341";


try {
    $conn = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
	$msg = "there has been an error on dbConnect";
				mail("contact@tristonnearmyer", "error" , $msg);
    }



?>