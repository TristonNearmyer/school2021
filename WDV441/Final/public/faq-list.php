<?php

session_cache_limiter('none');			//This prevents a Chrome error when using the back button to return to this page

session_start();

require_once('../inc/faq-class.php');

$faqs = new Faqs();

$faqList = $faqs->getList();

$faqCount = 0;

$faqLimit = (isset($_GET["limit"]) ? intval($_GET["limit"]) : 2);


//var_dump($faqList);die();

// display the view
require_once('../tpl/faq-list.tpl.php');
?>