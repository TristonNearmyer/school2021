<?php

class logIn {
	
	var $logInData = array();
	
	var $logInErrors = array();
	
	var $newUserData = array();
	
	var $newUserError = array();
	
	var $db = null;
	
	function __construct(){
		
		$this->db = new PDO('mysql:host=localhost;dbname=wdv441;charset=utf8', 
            'wdv441_user', 'tN42238665!');
		
	}
	
	function set($logInArray){
		
		$this->logInData = $logInArray;
		$this->newUserData = $logInArray;
		
	}
	
	function sanitize($logInArray) {
        // sanitize data based on rules
		
		$this->logInData = $logInArray;
		
		filter_var($this->logInData['username'],FILTER_SANITIZE_SPECIAL_CHARS);
		
		filter_var($this->logInData['password'],FILTER_SANITIZE_SPECIAL_CHARS);
		
		$logInArray = $this->logInData;
        
        return $logInArray;
    }
	
	function validate() {
        // flag as true initially
        $isValid = true;
        
        // if an error, store to errors using column name as key
        
        // validate the data elements in articleData property
        if (empty($this->logInData['username']))
        {
            // if not valid, set an error and flag as not valid
            $this->logInErrors['username'] = "Please enter your username";
            $isValid = false;
        }        
		
		if (empty($this->logInData['password'])){
			
			$this->logInErrors['password'] = "please enter your password";
			$isValid = false;
			
		}
		
        // return valid t/f
        return $isValid;
    }
	
	 // hash the passed in password and return the hash
    function hashPassword($passwordToHash) {
        //$passwordHash = password_hash($passwordToHash, PASSWORD_BCRYPT);        
        $passwordHash = hash("sha256", $passwordToHash);        
        return $passwordHash;
    }
	
	function checkLogIn($logInInfo){
		
		$validInfo = true;
		
		$password = $this->hashPassword($logInInfo['password']);
		
		$stmt = $this->db->prepare("SELECT user_id, username, password FROM users WHERE username = :username AND password = :password") ;	//prepare the query
			
			$stmt->execute(
				array('username' => $logInInfo["username"],
					 'password' => $password
					 )
			);
			
			$count = $stmt->rowCount();
			
			if($count > 0){
				$_SESSION["loggedIn"] = $stmt->fetchColumn();
				
			}
			
			else{
				$this->logInErrors = "incorrect username and/or password";
				$validInfo = false;
			}
		
		return $validInfo;
			
			
		}
	
	 function loadUser($userID) {
        // flag to track if the article was loaded
        $isLoaded = false;

        // load from database
        // create a prepared statement (secure programming)
        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_id = ?");
        
        // execute the prepared statement passing in the id of the article we 
        // want to load
        $stmt->execute(array($userID));

        // check to see if we loaded the article
        if ($stmt->rowCount() == 1) {
            // if we did load the article, fetch the data as a keyed array
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($dataArray);
            
            // set the data to our internal property            
            $this->set($dataArray);
                        
            // set the success flag to true
            $isLoaded = true;
        }
        
        //var_dump($stmt->rowCount());
        
        // return success or failure
        return $isLoaded;
    }
	
	function addNewUser() {
        // create a flag to track if the save was successful
        $isSaved = false;
		
		$password = $this->hashPassword($this->newUserData['password']);
        
        // determine if insert or update based on articleID
        // save data from articleData property to database
        if (empty($this->newUserData['userID'])) {
			
			
            // create a prepared statement to insert data into the table
            $stmt = $this->db->prepare(
                "INSERT INTO users 
                    (username, password, user_level) 
                 VALUES (?, ?, ?)");

            // execute the insert statement, passing in the data to insert
            $isSaved = $stmt->execute(array(
                    $this->newUserData['username'],
                    $this->newUserData['password'],
                    $this->newUserData['user_level']
                )
            );
            
            // if the execute returned true, then store the new id back into our 
            // data property
            if ($isSaved) {
                $this->newUserData['userID'] = $this->db->lastInsertId();
            }
        } else { 
			// if this is an update of an existing record, create a prepared update 
			// statement
            $stmt = $this->db->prepare(
                "UPDATE users SET 
                    username = ?,
                    password = ?,
                    user_level = ?
                WHERE user_id = ?"
            );
                    
            // execute the update statement, passing in the data to update
            $isSaved = $stmt->execute(array(
                    $this->newUserData['username'],
                    $password,
                    $this->newUserData['user_level'],
                    $this->newUserData['userID']
                )
            );            
        }
                        
        // return the success flage
        return $isSaved;
    }
	
	 function getList() {
        $userList = array();

        // TODO: get the news articles and store into $articleList
        $sql = "SELECT * FROM users ";
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $userList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
               
        // return the list of articles
        return $userList;        
    }
		
}


?>