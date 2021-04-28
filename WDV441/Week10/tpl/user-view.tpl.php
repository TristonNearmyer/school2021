<html>
    <body>
        username: <?php echo (isset($userDataArray['username']) ? $userDataArray['username'] : ''); ?><br>
        user level: <?php echo (isset($userDataArray['user_level']) ? $userDataArray['user_level'] : ''); ?><br>
		<?php if (is_file(dirname(__FILE__) . "/../public/images/" . $userDataArray['username'] . "_photo.jpg")) { ?>
            <img alt="<?php echo $userDataArray['username'] ?>" src="images/<?php echo $userDataArray['username'] . "_photo.jpg"; ?>"/>
        <?php } ?>
        <a href="user-list.php">Back to List</a>        
    </body>
</html>