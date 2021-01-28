<?php

class Emailer{ //this class will process a php email and send it
	
		//property declaration

		//access identifier property name

		private $message = "";

		private $recipientEmail = "";

		private $senderEmail = "";

		private $subject = "" ;
	
		private $customerInfo = "";
	

		//constructor method
		//1: does NOT make new object
		//2: initialzes default values

		public function __construct(){
		
		}

		//methods
		//three main types of methods
		//setter methods are used to set property values into the object (one method per property)

		public function setMessage($inVal){
			$this->message = $inVal;
		}

		public function setRecipientEmail($inVal){
			$this->recipientEmail = $inVal;
		}

		public function setSenderEmail($inVal){
			$this->senderEmail = $inVal;

		}

		public function setSubject($inVal){
			$this->subject = $inVal ;
		}
	
		public function setCustomerInfo($inEmail, $inFirstName, $inLastName){
			$this->customerInfo = $inEmail . " " . $inFirstName . " " . $inLastName;
		}

		//getter methods return the property values from the object(one method per property)

		public function getMessage(){
			return($this->message);
		}

		public function getRecipientEmail(){
			return($this->recipientEmail);
		}

		public function getSenderEmail(){
			return($this->senderEmail);
		}

		public function getSubject(){
			return($this->subject);
		}
		
		public function getCustomerInfo(){
			return($this->customerInfo);
		}

		//processing methods are everything else
	

		public function sendEmail(){ //this will format and send an email to the smtp server
    $to = $this->getSenderEmail();
    $subject = $this->getSubject();
    $message = $this->getMessage();
    $from = $this->getCustomerInfo();
    $headers = 'From: contact@tristonnearmyer.com ' . "\r\n" .
        'Reply-To:' .  $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();


   return mail($to,$subject,$message,$headers);


    if($sendMail){
        // Call the function send confirmation
        $this->sendConfEmail();
    }else{
        echo 'failed sent the email';
    }
			
		}
	public function sendConfEmail(){
    $userEmail = $this->getRecipientEmail();
    $confSubject = "confirmation";
    $confMessage = "thank you";
    $from = $this->getCustomerInfo();
    $headers = 'From: contact@tristonnearmyer ' . "\r\n" .
        'Reply-To: contact@tristonnearmyer' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    return mail($userEmail, $confSubject, $confMessage,$headers);
}
	
	
}
?>