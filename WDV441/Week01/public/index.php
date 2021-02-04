<!doctype html>

<?php

	$userNameArray = array("Triston","Tyler","Rai","Zach","Kay","Ian","Nathan","Jenna","Louie","Maddison");

	$randomNumber = rand(0,20);

	function displayUserName(){
		global $randomNumber; 
		
		global $userNameArray;
		
		$indexNumber = $randomNumber;
		
		
		if($indexNumber <= 9){
			echo("<p> Hello " . $userNameArray[$indexNumber] . "</p><br><img src='bear.gif' alt='bear waving hello' width='450px' height='490px'>");
		}else{
			echo("<p> Name List: </br></p>");
				foreach($userNameArray as $value){
				echo("<p>" . $value . "</p><br>");
			}
		}
	}

	displayUserName();

?>


<html>
<head>
<meta charset="utf-8">
<title>Week 1 Assignment</title>
	
	<style>
		
		body {
			background-image: linear-gradient(darkblue,lightblue);
			background-repeat: no-repeat;
			background-size: cover;
			display: flex;
			align-items: center;
			flex-direction: column;
		}
	
		p {
			font-size: 70px;
			color: white;
			width: 50%;
			display: flex;
			justify-content: center;
		}
	
	</style>
	
	
</head>

<body>
	
	
	
</body>
</html>