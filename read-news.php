<?php
   require_once("config.php");
   require_once("News.php");
   
    $news = new News();
    $getNews = $news->getNewsID($_GET['id']);
    
    $topNews = $news->getTopNews($news->getID($_GET['id']));
?>
<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="css/w3.css" />
  <link rel="stylesheet" href="css/bootstrap.css"/>
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link href="assets/font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet" />
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
     .bk{background-color:#202020;}
     a {text-decoration: none !important;}
     .bh { border-right-style: ridge; border-color: #303030}
  </style>
</head>
<body class="w3-light-grey">
<?php include_once('Navbar.htm') ?>
<div class="container w3-white w3-margin-top">
    <div class="w3-row-padding w3-margin-top">
      <div class="col-md-7">
      <br /><br />
       <table class="table" >
         <tr>
            <td>Share the article: &nbsp;</td>
            <td style="text-align: right;"><a href="https://www.facebook.com/sihle.l.dlamini" class="w3-btn-floating w3-indigo">
            <i class="fa fa-facebook-f w3-center"></i>
        </a> <a href="https://twitter.com/LuthandoDlamini" class="w3-btn-floating w3-blue">
            <i class="fa fa-twitter w3-xlarge "></i>
        </a> <a href="https://plus.google.com/u/0/app/basic/103739394219354837528?tab=XX"
            class="w3-btn-floating w3-red">
            <i class="fa fa-google-plus"></i>
        </a>
        </td>
         </tr>
       </table>
     
      <?php while($row = mysqli_fetch_array($getNews)){ ?>      
          <div class="container-fluid">
             
             <div  class="w3-content">
             <img  src="images/<?php echo $row['image'];  ?>" class="img-responsive w3-center" /></div>
             <br />
          </div>
          
          <div class="container-fluid">
          <h2><?php echo $row['headline']; ?></h2>
            <hr /> 
            <?php echo nl2br($row['news']); ?> 
            <?php } ?>
            <hr />
          </div>
          
    </div>
    <div class="col-md-4 w3-light-grey">
    <hr /><div class="container-fluid ">
     <table class="table w3-card w3-white" >
           <th class="w3-red" colspan="2">Related Articles:
           <span class="w3-right w3-large">»»</span></th>
           <tr>
              <?php 
            while($row = mysqli_fetch_array($topNews)){ ?>
              <td><img src="images/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><div class="container-fluid"><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['headline']; ?></strong></a> <br /><br />
                <?php echo $row['specify_cat']; ?> 
                <br /> <span class="fa fa-clock-o"></span> <?php echo $news->humanTiming(strtotime($row['posted_on'])); ?>
                </div> 
              </td>
              
           </tr> <?php  } ?></table></div>
  </div>
  
  <div class="col-md-7">
    
  </div>
  </div>
</div>

</body>
</html>