<html>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
            <?php if (isset($faqErrorsArray['question']))                 
            { ?>
                <div><?php echo $faqErrorsArray['question']; ?>
            <?php } ?>
            question: <input type="text" name="faq_question" value="<?php echo (isset($dataArray['faq_question']) ? $dataArray['faq_question'] : ''); ?>"/><br>
            Answer: <input type="text" name="faq_answer" value="<?php echo (isset($dataArray['faq_answer']) ? $dataArray['faq_answer'] : ''); ?>"/><br>

            <input type="hidden" name="faq_id" value="<?php echo (isset($dataArray['faq_id']) ? $dataArray['faq_id'] : ''); ?>"/>
            <input type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>            
        </form>        
    </body>
</html>