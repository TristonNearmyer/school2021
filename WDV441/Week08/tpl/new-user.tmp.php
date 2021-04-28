<html>
    <body>		
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">
            <?php if (isset($userErrorsArray['username']))                 
            { ?>
                <div><?php echo $userErrorsArray['username']; ?>
            <?php } ?>
            username: <input type="text" name="username" value="<?php echo (isset($dataArray['username']) ? $dataArray['username'] : ''); ?>"/><br>
			<?php if (isset($userErrorsArray['password']))                 
            { ?>
                <div><?php echo $userErrorsArray['password']; ?>
            <?php } ?>
            password: <input type="password" name="password" value=""/><br>
            user level: <select name="user_level">
                <option value="1">Guest</option>
                <option value="2">User</option>
                <option value="3">Admin</option>
                </select>
			
			<?php if (isset($userErrorsArray['photo']))                 
            { ?>
                <div><?php echo $userErrorsArray['photo']; ?>
            <?php } ?>		
			user photo: <input type="file" name="userPhoto" id="userPhoto" accept="*/image">

            <input type="hidden" name="user_id" value="<?php echo (isset($dataArray['user_id']) ? $dataArray['user_id'] : ''); ?>"/>
            <input type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>            
        </form>        
    </body>
</html>