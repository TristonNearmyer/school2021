<?php

$serverName = "localhost";
$username = "root";
$password = "";
$databaseName = "userrecipes";


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

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add User Recipe</title>
</head>

<body>

</body>
</html>