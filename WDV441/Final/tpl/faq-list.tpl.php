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
        <div>FAQs - 
			<h1 class="welcome">Welcome user!</h1>
			<div class="logInLink"><a href="faq-logIn.php">Log in</a></div>
            <a href="faq-edit.php">Add New Faq</a>
        </div>        
        <div>
            <!-- header info -->
            <div style="clear:both;">
                <div style="float:left; border:1px solid black;">Question</div>
                <div style="float:left; border:1px solid black;">Answer</div>
                <div style="float:left; border:1px solid black;">&nbsp;</div>
                <div style="float:left; border:1px solid black;">&nbsp;</div>
            </div>
            <?php foreach ($faqList as $faqData) { ?>
                <div style="clear:both;">
                    <div style="float:left; border:1px solid black;"><?php echo $faqData['faq_question']; ?></div>
                    <div style="float:left; border:1px solid black;"><?php echo $faqData['faq_answer']; ?></div>
                    <div style="float:left; border:1px solid black;"><a class="adminPrivs" href="faq-edit.php?faqId=<?php echo $faqData['faq_id']; ?>">Edit</a></div>
                    <div style="float:left; border:1px solid black;"><a href="faq-view.php?faqId=<?php echo $faqData['faq_id']; ?>">View</a></div>
			</div>
            <?php } ?>                
        </div>
		</br>
		<div class="faqs-widget-div">
				<ul class="faqs-widget-ul">
					<?php foreach ($faqList as $faqData) { ?>
						<?php if ($faqCount++ >= $faqLimit) break; ?>
						<li class="faq-widget-ul"><?= $faqData["faq_question"]; ?></li>
					<?php } ?>
				</ul>
			</div>
	
	<a href="faq-rest-list.php">view rest</a>
    </body>
</html>