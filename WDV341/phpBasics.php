<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
	<?php
	
	$yourName = "Triston";
	
	$number1 = 24;
	
	$number2 = 1;
	
	$total = 25;
	
	echo("<h1>Unit 2: PHP basics");
	
	?>
	
</head>
<body>
	
	<h2><?php echo($yourName); ?></h2>
	
	<?php
	
		echo("$number1 + $number2 = $total");
	
		$languages = ["php","html","javascript"];
		
		echo("<p>$languages[0], $languages[1], $languages[2]</p>");
	
	?>
	
</body>
</html>