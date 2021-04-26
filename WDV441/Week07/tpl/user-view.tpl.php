<html>
    <body>
        username: <?php echo (isset($userDataArray['username']) ? $userDataArray['username'] : ''); ?><br>
        user level: <?php echo (isset($userDataArray['user_level']) ? $userDataArray['user_level'] : ''); ?><br>
		<a href="../public/article-list.php">Back</a>
    </body>
</html>