<?php

require_once("Base.class.php");

class Users extends Base {
    // table name this class works with
    var $tableName = "users";
    // keyfield of the table
    var $keyField = "user_id";
    // column names minus the keyword in the table
    var $columnNames = array(
        "username",
        "password",
        "user_level"
    );
    
    function validate() {
        
        $isValid = parent::validate();
        
        if ($isValid) {
            // validate the data elements in userData property
            if (empty($this->data['username']))
            {
                // if not valid, set an error and flag as not valid
                $this->errors['username'] = "Please enter a username";
                $isValid = false;
            }    
			
			if (empty($this->data['password'])){
				
				$this->errors['password'] = "please enter a password";
				$isValid = false;
					
			}
			
			
			
            
            // if new record, make sure we have a password            
            if (!isset($this->data[$this->keyField]) || $this->data[$this->keyField] == 0) {
                if (empty($this->data['password'])) {
                    $this->errors['password'] = "Please enter a password";
                    $isValid = false;
                }
            }
        }
                
        return $isValid;
    }    
    
    function set($dataArray) {
        
        //var_dump($dataArray);
        
        if (isset($dataArray['password']) && !empty($dataArray['password']) && strlen($dataArray['password']) < 64) {
            $dataArray['password'] = $this->hashPassword($dataArray['password']);
        } 
        
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
        $userCheckSQL = "SELECT user_id, user_level FROM " . $this->tableName . 
            " WHERE username = ? AND password = ?";
        
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