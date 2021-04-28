<?php 

	if (!isset($_SESSION["loggedIn"])){
		
		header("location: ../public/user-login.php");
		exit;
		
	}

	if (!$_SESSION["loggedIn"] === "Admin"){
		
		header("location: ../public/user-list.php");
		
	}

?>

<html>
    <body>
        <div>News Article Report</div>        
        <div>
            <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
                Filter: 
                <select name="filterColumn">
                    <option value="username">Username</option>
                    <option value="userLevel">Article Author</option>                   
                </select>
                &nbsp;<input type="text" name="filterText"/>
                &nbsp;<input type="submit" name="btnViewReport" value="View Report"/>
            </form>
        </div>
		<?php if (count($userList) > 0) { ?>
		<div>
			<a href="<?= $_SERVER['SCRIPT_NAME']; ?>?download=1&<?= $_SERVER["QUERY_STRING"]; ?>">Download Report</a><br><br>
            <table border="1">
                <tr>
                    <th>Username&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=username&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=username&sortDirection=DESC">D</a></th>
                    <th>User Level&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=user_level&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=user_level&sortDirection=DESC">D</a></th>
                </tr>
                <?php foreach ($userList as $userData) { ?>
                    <tr>
                        <td><?php echo $userData['username']; ?></td>                
                        <td><?php echo $userData['user_level']; ?></td>                
                    </tr>
                <?php } ?>                
            </table>
			<a href="<?= $_SERVER['SCRIPT_NAME']; ?>?<?= $nextPageLink; ?>">Next Page</a>
        </div>
		<?php } ?>
    </body>
</html>