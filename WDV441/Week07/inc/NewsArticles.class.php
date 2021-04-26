<?php

// class to handle interaction with the newsarticles table
class NewsArticles {
	
    // property to hold our data from our article
    var $articleData = array();
    // property to hold errors
    var $errors = array();
    // property for holding a reference to a database connection so we can reuse it
    var $db = null;

    function __construct() {
        // create a connection to our database
        $this->db = new PDO('mysql:host=localhost;dbname=wdv441;charset=utf8', 
            'wdv441_user', 'tN42238665!');           
    }
    
    // takes a keyed array and sets our internal data representation to the array
    function set($dataArray) {
        $this->articleData = $dataArray;
        
        //var_dump($this->articleData, "test");
    }

    // santize the data in the passed array, return the array
    function sanitize($dataArray) {
        // sanitize data based on rules
		
		$this->articleData = $dataArray;
		
		filter_var($this->articleData['articleTitle'],FILTER_SANITIZE_SPECIAL_CHARS);
		
		filter_var($this->articleData['articleContent'],FILTER_SANITIZE_SPECIAL_CHARS);
		
		filter_var($this->articleData['articleAuthor'],FILTER_SANITIZE_SPECIAL_CHARS);
		
		filter_var($this->articleData['articleDate'],FILTER_SANITIZE_SPECIAL_CHARS);
		
		$dataArray = $this->articleData;
        
        return $dataArray;
    }
    
    // load a news article based on an id
    function load($articleID) {
        // flag to track if the article was loaded
        $isLoaded = false;

        // load from database
        // create a prepared statement (secure programming)
        $stmt = $this->db->prepare("SELECT * FROM newsarticles WHERE articleID = ?");
        
        // execute the prepared statement passing in the id of the article we 
        // want to load
        $stmt->execute(array($articleID));

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
    
    // save a news article (inserts and updates)
    function save() {
        // create a flag to track if the save was successful
        $isSaved = false;
        
        // determine if insert or update based on articleID
        // save data from articleData property to database
        if (empty($this->articleData['articleID'])) {
            // create a prepared statement to insert data into the table
            $stmt = $this->db->prepare(
                "INSERT INTO newsarticles 
                    (articleTitle, articleContent, articleAuthor, articleDate) 
                 VALUES (?, ?, ?, ?)");

            // execute the insert statement, passing in the data to insert
            $isSaved = $stmt->execute(array(
                    $this->articleData['articleTitle'],
                    $this->articleData['articleContent'],
                    $this->articleData['articleAuthor'],
                    $this->articleData['articleDate']
                )
            );
            
            // if the execute returned true, then store the new id back into our 
            // data property
            if ($isSaved) {
                $this->articleData['articleID'] = $this->db->lastInsertId();
            }
        } else { 
			// if this is an update of an existing record, create a prepared update 
			// statement
            $stmt = $this->db->prepare(
                "UPDATE newsarticles SET 
                    articleTitle = ?,
                    articleContent = ?,
                    articleAuthor = ?,
                    articleDate = ?
                WHERE articleID = ?"
            );
                    
            // execute the update statement, passing in the data to update
            $isSaved = $stmt->execute(array(
                    $this->articleData['articleTitle'],
                    $this->articleData['articleContent'],
                    $this->articleData['articleAuthor'],
                    $this->articleData['articleDate'],
                    $this->articleData['articleID']
                )
            );            
        }
                        
        // return the success flage
        return $isSaved;
    }
    
    // validate the data we have stored in the data property
    function validate() {
        // flag as true initially
        $isValid = true;
        
        // if an error, store to errors using column name as key
        
        // validate the data elements in articleData property
        if (empty($this->articleData['articleTitle']))
        {
            // if not valid, set an error and flag as not valid
            $this->errors['articleTitle'] = "Please enter a title";
            $isValid = false;
        }        
		
		if (empty($this->articleData['articleContent'])){
			
			$this->errors['articleContent'] = "Content cannot be empty";
			$isValid = false;
			
		}
		
		if (empty($this->articleData['articleAuthor'])){
			
			$this->errors['articleAuthor'] = "Article must have an Author";
			$isValid = false;
			
		}
		
		if (empty($this->articleData['articleDate'])){
			
			$this->errors['articleDate'] = "Date cannot be empty";
			$isValid = false;
			
		}
		
		list($year, $month, $day) = explode('-', $this->articleData['articleDate']); 
				
		if (false === checkdate($month, $day, $year)){
			
			$this->errors['articleDate'] = "Please enter a valid date";
			$isValid = false;
			
		}
                        
        // return valid t/f
        return $isValid;
    }
    
    // get a list of news articles as an array    
    function getList() {
        $articleList = array();

        // TODO: get the news articles and store into $articleList
        $sql = "SELECT * FROM newsarticles ";
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $articleList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
               
        // return the list of articles
        return $articleList;        
    }
    
    function getListFiltered($sortColumn = null, $sortDirection = null, $filterColumn = null, $filterText = null) {
        $articleList = array();
        
        $sql = "SELECT * FROM newsarticles ";

        if (!is_null($filterColumn) && !is_null($filterText)) {
            //$sql .= " WHERE " . $filterColumn . " LIKE '%?%'";
			$sql .= " WHERE " . $filterColumn . " LIKE ?";
        }
        
        if (!is_null($sortColumn)) {
            $sql .= " ORDER BY " . $sortColumn;
            
            if (!is_null($sortDirection)) {
                $sql .= " " . $sortDirection;
            }
        }
        
        $stmt = $this->db->prepare($sql);
        
        if ($stmt) {
            $stmt->execute(array('%' . $filterText . '%'));
            
            $articleList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
                
        return $articleList;        
    }        
}
?>