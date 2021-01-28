<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	<h1>testing emailer</h1>
	
	<?php
	
	require 'Emailer.php'; 
	
	$emailTest = new Emailer(); 
	
	$emailTest->setSenderEmail("contact@tristonnearmyer.com");
	
	echo($emailTest->getSenderEmail());
	
	echo("<br>");
	
	$emailTest->setRecipientEmail("tcnearmyer@dmacc.edu");
	
	echo($emailTest->getRecipientEmail());
	
	echo("<br>");
	
	$emailTest->setSubject("test");
	
	echo($emailTest->getSubject());
	
	echo("<br>");
	
	$emailTest->setMessage("hello");
	
	echo($emailTest->getMessage());
	
	echo("<br>");
		
	echo $emailTest->sendEmail(); //send email to SMTP server
	
	?>
	
</body>
</html>