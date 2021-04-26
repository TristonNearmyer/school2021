<html>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
            <?php if (isset($newUserErrorsArray['username'])) { ?>
                <div><?php echo $newUserErrorsArray['username']; ?>
            <?php } ?>
            username: <input type="text" name="username" value="<?php echo (isset($newUserDataArray['username']) ? $newUserDataArray['username'] : ''); ?>"/><br>
            password: <input type="text" name="password" value="<?php echo (isset($newUserDataArray['password']) ? $newUserDataArray['password'] : ''); ?>"/><br>
            user level: <select name="user_level">
                <option value="1">Guest</option>
                <option value="2">User</option>
                <option value="3">Admin</option>
                </select>
            <input type="hidden" name="userID" value="<?php echo (isset($newUserDataArray['user_id']) ? $newUserDataArray['user_id'] : ''); ?>"/>
					
            <input type="submit" name="Save" value="Sign Up!"/>
            <input type="submit" name="Cancel" value="Cancel"/>            
        </form>        
    </body>
</html>