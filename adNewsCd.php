<?php

ob_start();
session_start();

require_once('config.php');
require_once('error_handler.php');
require_once('News.php');



 if( !isset($_SESSION['user']) ) {
	header("Location: admin.php");
	exit;
}

$news = new News();

$resSess = $news->getUserID($_SESSION['user']);
$use_row = mysqli_fetch_array($resSess);
//Populating a dropdown
$c = '';
$result = $news->GetCategory();
while ($row = mysqli_fetch_array($result)){
	
		$c .='<option>'.$row['specify_cat'].'</option>';
	}
//Getting a category id
$message = '';
$headline = $article = $image = $sub_category = $userid = $category = "";
$Errheadline = $Errarticle = $Errimage = $Errsub_category = $Erruserid = $Errcategory = "";

if(isset($_POST['post'])){
	
	   $headline = test_input($_POST['title']);
       $article = test_input($_POST['article']);
       $image =   test_input( $_FILES['image']['name']);
   	   $sub_category = test_input($_POST['sub_cat']);
       $sub_category = $news->getSubID($sub_category);
       $userid = test_input($_SESSION['user']);
	
       //Log standing image
       $img = test_input($_FILES['img']['name']);
       
    if(empty($img)){
        
    } else {
        $news->addLogImage($img);
    }
    
    //Results
    $res = test_input($_POST['res']);
    $resD = test_input($_POST['resD']);
    if(empty($res) && empty($resD)){
        
    } else {
        $news->addResults($res,$resD);
    }
    $btn = "submit";
	$news->post($sub_category,$article,$image,$headline,$userid,$btn);
	
    
}

?>