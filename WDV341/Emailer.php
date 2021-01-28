<?php

class Emailer{ //this class will process a php email and send it
	
		//property declaration

		//access identifier property name

		private $message = "";

		private $recipientEmail = "";

		private $senderEmail = "";

		private $subject = "" ;

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

		//processing methods are everything else

		public function sendEmail(){ //this will format and send an email to the smtp server

			$to = $this->getSenderEmail();
			$subject = $this->getSubject();
			$message = $this->getMessage();
			$headers = "From: <contact@tristonnearmyer.com>";

			//it will use the php mail() 

			return mail($to,$subject,$message);
		}
}

?>