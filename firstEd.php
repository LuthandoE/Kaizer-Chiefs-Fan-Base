<?php

ob_start();
session_start();

require_once('config.php');
require_once('error_handler.php');
require_once('News.php');



 if( !isset($_SESSION['user']) ) {
	header("Location: index.php");
	exit;
}

$news = new News();

$resSess = $news->getUserID($_SESSION['user']);
$use_row = mysqli_fetch_array($resSess);

$display = $news->editNews($_SESSION['user']);
$search = "";
$Errsearch= "";
if(isset($_POST['submit'])){
    if(empty($_POST['search'])){
        $Errsearch = "Headline required";
        header("Location: edit.php");
        
    } else {
       $search = test_input($_POST['search']);
    }
}
?>