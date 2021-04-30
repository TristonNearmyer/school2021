<html>
    <body>
        username: <?php echo (isset($faqDataArray['faq_question']) ? $faqDataArray['faq_question'] : ''); ?><br>
        user level: <?php echo (isset($faqDataArray['faq_answer']) ? $faqDataArray['faq_answer'] : ''); ?><br>
        <a href="user-list.php">Back to List</a>        
    </body>
</html>