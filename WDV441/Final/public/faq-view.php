<?php
// usage: http://localhost:8080/WDV441_2019/week05/public_html/article-view.php?userID=1
require_once('../inc/faq-class.php');

$faqs = new Faqs();

$faqDataArray = array();

// load the article if we have it
if (isset($_REQUEST['faqId']) && $_REQUEST['faqId'] > 0) 
{
    $faqs->load($_REQUEST['faqId']);
    $faqDataArray = $faqs->data;
}

// display the view
require_once('../tpl/faq-view.tpl.php');
?>