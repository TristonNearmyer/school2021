<html>
    <body>
		
		<?php
		
			if (isset($_SESSION["loggedIn"])){ ?>
				
				<div><?php echo("You're already logged in") ?></div>
				<button><a href="../public/faq-list.php">Back</a></button>
				
			<?php }
		
			else{
		
			?>
		
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">

            Username: <input type="text" name="username" value="<?php echo (isset($logInDataArray['username']) ? $logInDataArray['username'] : ''); ?>"/><br>
					
            Password: <input type="text" name="password" value="<?php echo (isset($logInDataArray['password']) ? $logInDataArray['password'] : ''); ?>"/><br>
					
            <input type="submit" name="logIn" value="logIn"/>
            <input type="submit" name="Cancel" value="Cancel"/>    
					
        </form>  
		
		<?php } ?>
		
    </body>
</html>