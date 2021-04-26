<html>
    <body>
		
		<?php
		
			if (isset($_SESSION["loggedIn"])){ ?>
				
				<div><?php echo("Welcome!") ?></div>
				
			<?php }
		
			else{ ?>
		
				<button><a href="../public/logInPage.php">Log In</a></button>
		
			<?php } ?>
		
        <div>News Articles - 
            <a href="../public/article-edit.php">Add New Article</a>
			<a href="../public/editUser.php">Add New User</a>
        </div>        
        <div>
            <!-- header info -->
            <div style="clear:both;">
                <div style="float:left; border:1px solid black;">Article Title</div>
                <div style="float:left; border:1px solid black;">Article Author</div>
                <div style="float:left; border:1px solid black;">Article Date</div>
                <div style="float:left; border:1px solid black;">&nbsp;</div>
                <div style="float:left; border:1px solid black;">&nbsp;</div>
            </div>
            <?php foreach ($articleList as $articleData) { ?>
                <div style="clear:both;">
                    <div style="float:left; border:1px solid black;"><?php echo $articleData['articleTitle']; ?></div>
					<div style="float:left; border:1px solid black;"><?php echo $articleData['articleContent']; ?></div>
                    <div style="float:left; border:1px solid black;"><?php echo $articleData['articleAuthor']; ?></div>
                    <div style="float:left; border:1px solid black;"><?php echo $articleData['articleDate']; ?></div>
                    <div style="float:left; border:1px solid black;"><a href="../public/article-edit.php?articleID=<?php echo $articleData['articleID']; ?>">Edit</a></div>
                    <div style="float:left; border:1px solid black;"><a href="../public/article-view.php?articleID=<?php echo $articleData['articleID']; ?>">View</a></div>
                </div>
            <?php } ?>                
        </div>
		</br>
		</br>
		 <div>
            <!-- header info -->
            <div style="clear:both;">
                <div style="float:left; border:1px solid black;">UserID</div>
                <div style="float:left; border:1px solid black;">Username</div>
                <div style="float:left; border:1px solid black;">User Level</div>
                <div style="float:left; border:1px solid black;">&nbsp;</div>
                <div style="float:left; border:1px solid black;">&nbsp;</div>
            </div>
            <?php foreach ($usersList as $logInData) { ?>
                <div style="clear:both;">
                    <div style="float:left; border:1px solid black;"><?php echo $logInData['user_id']; ?></div>
					<div style="float:left; border:1px solid black;"><?php echo $logInData['username']; ?></div>
                    <div style="float:left; border:1px solid black;"><?php echo $logInData['user_level']; ?></div>
                    <div style="float:left; border:1px solid black;"><a href="../public/editUser.php?userID=<?php echo $logInData['user_id']; ?>">Edit</a></div>
                    <div style="float:left; border:1px solid black;"><a href="../public/user-view.php?userID=<?php echo $logInData['user_id']; ?>">View</a></div>
                </div>
            <?php } ?>                
        </div>
    </body>
</html>