<?php
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();
//var_dump($newsArticle->load(1));
//var_dump($newsArticle->articleData);
//die;


/*$article = array(
    "articleID" => "",
    "articleTitle" => "Test Article 1",
    "articleContent" => "Content 1",
    "articleAuthor" => "GG",
    "articleDate" => "2021-02-18"
);

$newsArticle->sanitize($article);

$newsArticle->set($article);




//$newsArticle->articleData["articleDate"] = "";

//var_dump($newsArticle->articleData);

if ($newsArticle->validate()) {
    var_dump($newsArticle->save());
} else {
    // do something with the errors
    var_dump($newsArticle->errors);
}
*/
$newsArticle->getList();

//var_dump($newsArticle->articleData);

/*
$newsArticle->load(1);
$newsArticle->articleData['articleTitle'] = "Test Article 1a";
*/

//var_dump($newsArticle->save());

//var_dump($newsArticle);
?>

<html>

	</br>
	<a href="article-edit.php"><button>Add New Article</button></a>

</html>