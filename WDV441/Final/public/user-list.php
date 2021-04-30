<?php
require_once('../inc/faq-class.php');

$faqs = new Faqs();

$faqList = $faqs->getList();

var_dump($faqList);die();

// display the view
require_once('../tpl/user-list.tpl.php');
?>