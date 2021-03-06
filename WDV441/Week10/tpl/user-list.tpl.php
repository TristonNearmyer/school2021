<html>
	<style>
		
		.welcome , .adminPrivs {
			display: none;
		}
	
		<?php 

		if (isset($_SESSION["loggedIn"])) {

			if ($_SESSION["loggedIn"] = "Admin") { ?>

					.adminPrivs{
						display: inline;
					}



		<?php } ?>
		
		.logInLink {
			display: none;
		}
		
		.welcome {
			display: block;
		}

	<?php	} ?>
		
	</style>
	
    <body>
        <div>Users - 
			<h1 class="welcome">Welcome user!</h1>
			<a class="logInLink" href="../public/user-logIn.php">Log In</a>
			<a class="adminPrivs" href="../public/user-report.php">Create Report</a>
			<a href="../public/new-user.php">Add New User</a>
        </div>        
        <div>
            <!-- header info -->
            <div style="clear:both;">
                <div style="float:left; border:1px solid black;">Username</div>
                <div style="float:left; border:1px solid black;">User Level</div>
                <div style="float:left; border:1px solid black;">&nbsp;</div>
                <div style="float:left; border:1px solid black;">&nbsp;</div>
            </div>
            <?php foreach ($userList as $userData) { ?>
                <div style="clear:both;">
                    <div style="float:left; border:1px solid black;"><?php echo $userData['username']; ?></div>
                    <div style="float:left; border:1px solid black;"><?php echo $userData['user_level']; ?></div>
                    <div style="float:left; border:1px solid black;"><a class="adminPrivs" href="user-edit.php?userId=<?php echo $userData['user_id']; ?>">Edit</a></div>
                    <div style="float:left; border:1px solid black;"><a href="user-view.php?userId=<?php echo $userData['user_id']; ?>">View</a></div>
                </div>
            <?php } ?>                
        </div>
    </body>
</html>