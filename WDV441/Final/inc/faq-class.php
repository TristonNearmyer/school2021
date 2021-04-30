<?php

require_once("Base.class.php");

class Faqs extends Base {
    // table name this class works with
    var $tableName = "faq";
    // keyfield of the table
    var $keyField = "faq_id";
    // column names minus the keyword in the table
    var $columnNames = array(
        "faq_question",
        "faq_answer"
    );
    
    function validate() {
        
        $isValid = parent::validate();
        
        if ($isValid) {
            // validate the data elements in userData property
            if (empty($this->data['faq_question']))
            {
                // if not valid, set an error and flag as not valid
                $this->errors['faq_question'] = "Please enter a question";
                $isValid = false;
            }    
			
			if (empty($this->data['faq_answer'])){
				
				$this->errors['faq_answer'] = "Question needs an answer";
				$isValid = false;
					
			}
			
			
			
            
            // if new record, make sure we have a password            
            if (!isset($this->data[$this->keyField]) || $this->data[$this->keyField] == 0) {
                if (empty($this->data['faq_answer'])) {
                    $this->errors['faq_answer'] = "Please enter a answer";
                    $isValid = false;
                }
            }
        }
                
        return $isValid;
    }    
    
    function set($dataArray) {
        
        //var_dump($dataArray);
        
      
        
        parent::set($dataArray);
        
       // var_dump($this->data);
        //die;        
    }   
    
    // hash the passed in password and return the hash
    function hashPassword($passwordToHash) {
        //$passwordHash = password_hash($passwordToHash, PASSWORD_BCRYPT);        
        $passwordHash = hash("sha256", $passwordToHash);        
        return $passwordHash;
    }
    
    function userLogin($username, $password) {
        $userID = null;
        
       // $password = $this->hashPassword($password);
        
        // build the SQL to check for the user
        $userCheckSQL = "SELECT user_id, user_level FROM users WHERE username = ? AND password = ?";
        
        $stmt = $this->db->prepare($userCheckSQL);
        
        // execute the prepared statement passing in the id of the article we 
        // want to load
        $stmt->execute(array($username, $password));
        
        if ($stmt->rowCount() == 1) 
        {
            // if we did load the article, fetch the data as a keyed array
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            $userID = $dataArray['user_id'];
			$userLevel = $dataArray['user_level'];
			
			if ($userLevel === "3"){
				
				$_SESSION["loggedIn"] = "Admin";
	
			} 
			
			if ($userLevel === "2"){
				
				$_SESSION["loggedIn"] = "User";
				
			}
			
			if ($userLevel === "1"){
				
				$_SESSION["loggedIn"] = "Guest";
				
			}
			
        }
        
        return $userID;
    }
}
?>