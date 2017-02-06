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

$search = "";
$Errsearch= "";

if(empty($_POST['search'])){
    $Errsearch = "Headline required";
} else {
   $search = test_input($_POST['search']);
}

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/w3.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
  .bk{background-color:#202020;}
    a {text-decoration: none;}
    .bh { border-right-style: ridge; border-color: #303030}
  </style>
</head>

<body>
   <?php include_once("Nav.htm"); ?>
   <br />/<br /><br />
   <div class="container">
   <br />
   <table class="table table-striped">
       <thead>
          <tr>
          <th>#ID</th>
          <th>Headline</th>
          <th>Date</th>
       </tr>
       </thead> 
          <tbody>
          <tr>
          <?php if(isset($search)){ ?>
          <?php while($row = mysqli_fetch_array($news->search($search,$_SESSION['user']))){ ?>
          <td><?php echo $row['nid'] ?></td>
          <td><?php echo $row['headline'] ?></td>
          <td><?php echo $row['posted_on'] ?></td>
          <td><a href="EditNews.php?id=<?php echo $row['nid'] ;?>">Edit</a></td>
       </tr>
       <?php exit(); } 
       }?>
       </tbody>
   </table>
   </div>
</body>
</html>