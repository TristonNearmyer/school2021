<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	
	include("dbConnect.php");
	 echo "<table class='table' style='border: solid 1px black;'>";
 echo "<tr><th>Event Id</th><th>Event Name</th><th>Event Description</th><th>Event Presenter</th><th>Event Date </th><th>Event Time</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

	try{
    $stmt = $conn->prepare("SELECT * FROM wdv341_event WHERE event_id = 11"); 
	
	
    $stmt->execute();
		}
	
	catch(PDOException $e)
    {
    echo "there was an error with your SELECT " . $e->getMessage();
    }

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	
	if($result == 0){
		echo("this table is empty");
	}
	
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
		
		
        echo $v;
	
    }
		
	   
$conn = null;
	
	?>
</body>
</html>