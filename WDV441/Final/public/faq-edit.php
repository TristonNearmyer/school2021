<?php
// usage: http://localhost:8080/WDV441_2019/week05/public_html/user-edit.php?userID=1
// usage new: http://localhost:8080/WDV441_2019/week05/public_html/user-edit.php
require_once('../inc/faq-class.php');

// if cancel is pushed, go back to list
if (isset($_POST['Cancel'])) {
    header("location: faq-list.php");
    exit;
}

// create an instance of our class so we can use it
$faq = new Faqs();

// initialize some variables to be used by our view
$dataArray = array();
$faqErrorsArray = array();

// load the article if we have it
if (isset($_REQUEST['faqId']) && $_REQUEST['faqId'] > 0) 
{
    $faq->load($_REQUEST['faqId']);
    // set our article array to our local variable
    $dataArray = $faq->data;
}

// apply the data if we have new data
if (isset($_POST['Save']))
{
    // set the post array to our local variable
    $dataArray = $_POST;
	
    // sanitize
    $dataArray = $faq->sanitize($dataArray);
	
	
    // pass the array into our instance
    $faq->set($dataArray);
    
    // validate
    if ($faq->validate())
    {
        // save
        if ($faq->save())
        {
            header("location: faq-save-success.php");
            exit;
        }
        else
        {
            $faqErrorsArray[] = "Save failed";
        }
    }
    else
    {
        $faqErrorsArray = $faq->errors;
        $dataArray = $faq->data;
    }
}

// display the view
require_once('../tpl/user-edit.tpl.php');
?>