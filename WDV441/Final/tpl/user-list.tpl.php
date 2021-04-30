<html>
    <body>
        <div>Users - 
            <a href="user-edit.php">Add New Faq</a>
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
                    <div style="float:left; border:1px solid black;"><a href="user-edit.php?userId=<?php echo $faqData['faq_id']; ?>">Edit</a></div>
                    <div style="float:left; border:1px solid black;"><a href="user-view.php?userId=<?php echo $faqData['faq_id']; ?>">View</a></div>
                </div>
            <?php } ?>                
        </div>
    </body>
</html>