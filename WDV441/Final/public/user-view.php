<?php
// usage: http://localhost:8080/WDV441_2019/week05/public_html/article-view.php?userID=1
require_once('../inc/faq-class.php');

$faqs = new Faqs();

$faqDataArray = array();

// load the article if we have it
if (isset($_REQUEST['userId']) && $_REQUEST['userId'] > 0) 
{
    $user->load($_REQUEST['userId']);
    $faqDataArray = $faqs->faqData;
}

// display the view
require_once('../tpl/user-view.tpl.php');
?>