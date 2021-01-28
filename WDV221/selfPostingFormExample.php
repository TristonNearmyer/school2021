<?php

	if(isset($_POST["prod_submit"])){
		
		echo("<h1>thank you for submitting the form</h1>");
		
		$inProdName = $_POST["prod_name"];
		
		$inProdPrice = $_POST["prod_price"];
		
		$inRadio = $_POST["radio"];
		
	}

	else {
		echo("<h1>please enter your information</h1>");
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<h1>WDV341 Intro PHP </h1>
<h2>Unit-8 Self Posting Form</h2>
<h3>Example Form</h3>
<p>Converting a form to a self posting form.</p>
<form name="form1" action="" method="post">
  <p>
    <label for="prod_name">Product Name: </label>
    <input name="prod_name" id="prod_name" type="text">
  </p>
  <p>
    <label for="prod_price">Product Price: </label>
    <input name="prod_price" id="prod_price" type="text">
  </p>
  <p>Product Color:</p>
  <p>
    <input name="radio" id="prod_red" type="radio" value="prod_red">
    <label for="prod_red">Red Wagon<br>
    </label>
    <input name="radio" id="prod_green" type="radio" value="prod_green">
    <label for="prod_green">Green Wagon</label>
  </p>
  <p>
    <input name="prod_submit" id="prod_submit" type="submit" value="Submit">
    <input name="Reset" id="button" type="reset" value="Reset">
  </p>
</form>
<p>&nbsp;</p>

</body></html>