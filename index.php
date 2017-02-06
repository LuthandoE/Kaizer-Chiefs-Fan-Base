<?php
require_once("config.php");
require_once("News.php");
require_once("indObj.php"); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Kaizer Chiefs Fan Base</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="css/w3.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link href="assets/font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet" />
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
     (function(){
        
         (function(){
            $("body").load('index.php',  function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            setTimeout(function(){
                location.reload();
            })
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText))()         
     })
  </script>
  <style>
  
  #section1 {padding-top:50px;height:500px ;}
  #section2 {padding-top:10px; background-color: #ffffff;}
  #section3 {padding-top:10px;  background-color: #ffffff;}
  #section41 {padding-top:10px;background-color: #ffffff;}
  #section5 {padding-top:10px;padding-bottom:10px;background-color: #ffffff;}
  #section6 {padding-top:10px; background-color: #ffffff;}
  
  .l-container{height: 360px;}
  .bk{background-color:#202020;}
  
  .bh { border-right-style: ridge; border-color: #303030}
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img { width: 100% ; height: 40% ; background-color: black;}
  a {text-decoration: none !important;}
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50" class="w3-light-grey">
<div class="container w3-white w3-card-4 w3-border-bottom" id="content " >
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-image: url(image/logo.png);">
  <div class="container-fluid ">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand w3-text-amber" href="#" style="background-image: url(image/logo.png); visibility: hidden;" ><strong>Kaizer Chiefs</strong></a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="bk"><a href="#section1" class="w3-text-white bh"><span class=""><strong>Home</strong></span></a></li>
          <li class="bk"><a href="#section2" class="w3-text-white bh"><strong>Team News</strong></a></li>
          <li class="bk"><a href="#section3" class="w3-text-white bh"><strong>Rumours</strong></a></li>
          <li class="bk"><a href="#section41" class="w3-text-white bh"><strong>SupportersView </strong></a></li>
          <li class="bk"><a href="#section5" class="w3-text-white bh"><strong>Results</strong></a></li>          
  		  <li class="bk"><a  href="#section5" class="w3-text-white bh"><strong>Fixture</strong></a></li></ul>
      </div>
            
    </div>
  </div>
</nav>    

<div id="section1" class="container-fluid">
  <div class="row w3-margin-top">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#" class="w3-xlarge w3-text-orange"><strong>Kaizer Chiefs FB</strong></a></li>
  </ul></div>
 <div class="container-fluid">  
<div class="row">
  <div class="w3-half w3-margin-top">
      <!-- Use a container to wrap the slider, the purpose is to enable slider to always fit width of the wrapper while window resize -->
    <div class="container-fluid">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
    <li data-target="#myCarousel" data-slide-to="3" class=""></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
    <div class="l-container w3-black">
      <?php 
         while($row = mysqli_fetch_array( $carouselTeamNews)){ ?>
             <img  src="image/<?php echo $row['image'];  ?>" width="100%" />
      <div class="carousel-caption">
        <h3><?php echo $row['headline']; ?></h3>
        <p><?php echo $row['specify_cat']; ?></p>
      </div>
      <?php  } ?> </div>
    </div>

    <div class="item">
    <div class="l-container w3-black">
      <?php 
         while($row = mysqli_fetch_array($carSupporterN)){ ?>
             <img  src="image/<?php echo $row['image'];  ?>" width="100%" />
      <div class="carousel-caption">
        <h3><?php echo $row['headline']; ?></h3>
        <p><?php echo $row['specify_cat']; ?></p>
      </div>
      <?php  } ?> </div>
    </div>
    
    <div class="item">
    <div class="l-container w3-black">
      <?php 
         while($row = mysqli_fetch_array( $carRumour)){ ?>
             <img  src="image/<?php echo $row['image'];  ?>" width="100%" />
      <div class="carousel-caption">
        <h3><?php echo $row['headline']; ?></h3>
        <p><?php echo $row['specify_cat']; ?></p>
      </div>
      <?php  } ?> </div>
    </div>

    <div class="item">
    <div class="l-container w3-black">
      <?php 
         while($row = mysqli_fetch_array( $anotherTeamTopN)){ ?>
             <img  src="image/<?php echo $row['image'];  ?>" width="100%" />
      <div class="carousel-caption">
        <h3><?php echo $row['headline']; ?></h3>
        <p><?php echo $row['specify_cat']; ?></p>
      </div>
      <?php  } ?> </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
  
  </div>
  <div class="w3-half w3-margin-0">
     <div class="container-fluid w3-margin-top w3-white" >
        <div class="col-sm-6 w3-margin-0 w3-padding-0"> 
            <table class="table w3-margin-0 w3-padding-0" >
             <tr>
           
           <?php 
            while($row = mysqli_fetch_array($TeamNewsTop)){ ?>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['headline']; ?></strong> </a><br /><br />
                <p><?php echo $row['specify_cat']; ?> 
                <br /><span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?></p>
             
              </td>
              
           </tr> <?php  } ?>  
           <?php 
            while($row = mysqli_fetch_array($supporterTop)){ ?>
           <tr>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['headline']; ?></strong> </a><br /><br />
                <?php echo $row['specify_cat']; ?><br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>
              
           </tr> <?php  } ?>
           <?php 
            while($row = mysqli_fetch_array($supporterTop)){ ?>
           <tr>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['headline']; ?></strong> </a><br /><br />
                <?php echo $row['specify_cat']; ?><br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>
              
           </tr> <?php  } ?>           
        </table>
     </div>
     <div class="col-md-6 w3-margin-0 w3-padding-0"> 
            <table class="table  w3-margin-0 w3-padding-0" >
             <tr>
           
           <?php 
            while($row = mysqli_fetch_array($anotSupTop)){ ?>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['headline']; ?></strong> </a><br /><br />
                <?php echo $row['specify_cat']; ?> <br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>
              
           </tr> <?php  } ?>  
           <?php 
            while($row = mysqli_fetch_array($rmourTop)){ ?>
           <tr>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['headline']; ?></strong> </a><br /><br />
                <?php echo $row['specify_cat']; ?><br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>
              
           </tr> <?php  } ?>
           <?php 
            while($row = mysqli_fetch_array($teamTopN2)){ ?>
           <tr>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['headline']; ?></strong> </a><br /><br />
                <?php echo $row['specify_cat']; ?> <br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>    
           </tr> <?php  } ?>
        </table>
     </div>
     </div>
     
     </div>
  </div></div>
</div>
</div>
<!-- Section 2 -->
<div id="section2" class="container w3-border-bottom">
  <h3 class="w3-orange w3-round-large w3-padding"><strong>Team News :</strong> </h3>
  <div class="row w3-margin-top ">
     <div class="col-md-4"> 
           <?php 
            while($row = mysqli_fetch_array($resTeam)){
            ?><div class="w3-card-2">
            <div class="w3-image"><img src="image/<?php echo $row['image'];  ?>" alt="WTF" /></div>
            <div class="w3-container w3-padding-top">
            <a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black w3-xlarge" style="text-decoration-line: none;"><strong><?php echo $row['headline']; ?> </strong></a><br />
            <?php echo $row['specify_cat']; ?>
                &nbsp; &nbsp; &nbsp; 
              <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>  
            
            
            </div>
            <?php  } ?>
            </div>
            <hr /> 
     </div>
    
     <div class="col-md-4">
        <table class="table w3-card-2" >
             <tr>
           
           <?php 
            while($row = mysqli_fetch_array($setTeamNews)){ ?>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['headline']; ?></strong> </a><br /><br />
                <?php echo $row['specify_cat']; ?> 
                <br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>
              
           </tr> <?php  } ?>  
        </table>
  
     </div>
     <div class="col-md-4">
        <table class="table w3-card-2" >
        <tr> 
           <?php 
            while($row = mysqli_fetch_array($secaTeamNews)){ ?>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['headline']; ?></strong> </a><br /><br />
                <?php echo $row['specify_cat']; ?> 
                <br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>
              
           </tr> <?php  } ?>  
        </table>
     </div>
     
     
  </div>
  
</div>
<!-- Section 3 -->
<div id="section3" class="container w3-border-bottom">
    <h3 class="w3-orange w3-round-large w3-padding"><strong>Rumours :</strong> </h3>
  <div class="row">
     <div class="col-md-4"> 
          <?php 
            while($row = mysqli_fetch_array($res4)){
            ?><div class="w3-card-2">
            <div class="w3-image"><img src="image/<?php echo $row['image'];  ?>" width="100%" alt="WTF" /></div>
            <div class="w3-container w3-padding-top">
            <a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"><strong><?php echo $row['headline']; ?> </strong></a><br />
            <?php echo $row['specify_cat']; ?>
                <br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>  
            
            
            </div>
            <?php  } ?>
            </div>
     </div>
     <div class="col-md-4"> 
          <table class="table w3-card-2" >
           <tr>
              <?php 
            while($row = mysqli_fetch_array($res3)){ ?>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"><strong><?php echo $row['headline']; ?></strong></a> <br /><br />
                <?php echo $row['specify_cat']; ?> 
                <br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>
              
           </tr> <?php  } ?>
        </table>
     </div>
     <div class="col-md-4"> 
         <table class="table w3-card-2" >
           <tr>
              <?php 
            while($row = mysqli_fetch_array($rumours)){ ?>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"><strong><?php echo $row['headline']; ?></strong> </a><br /><br />
                <?php echo $row['specify_cat']; ?> 
                <br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>
              
           </tr> <?php  } ?>
            <tr>
              <?php 
            while($row = mysqli_fetch_array($res6)){ ?>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"><strong><?php echo $row['headline']; ?></strong></a> <br /><br />
                <?php echo $row['specify_cat']; ?> 
                <br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>
              
           </tr> <?php  } ?>
        </table>
     </div>
     
  </div>
</div>
<!-- Section 4 -->
<div id="section41" class="container w3-border-bottom">
  <h3 class="w3-orange w3-round-large w3-padding"><strong>Supporters Views :</strong> </h3>
     <div class="col-md-4"> 
           <?php 
            while($row = mysqli_fetch_array($secSupTop)){
            ?><div class="w3-card-2">
            <div class="w3-image"><img src="image/<?php echo $row['image'];  ?>" width="100%" alt="WTF" /></div>
            <div class="w3-container w3-padding-top">
            <a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"><strong><?php echo $row['headline']; ?> </strong></a><br />
            <?php echo $row['specify_cat']; ?>
               <br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>  
            
            
            </div>
            <?php  } ?>
            </div>
            
     </div>
     <div class="col-md-4"> 
          <table class="table w3-card-2" >
           <tr>
              <?php 
            while($row = mysqli_fetch_array($SptNews)){ ?>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"><strong><?php echo $row['headline']; ?></strong></a> <br /><br />
                <?php echo $row['specify_cat']; ?> 
                <br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>
              
           </tr> <?php  } ?>
        </table>
     </div>
     <div class="col-md-4"> 
          <table class="table w3-card-2" >
           <tr>
              <?php 
            while($row = mysqli_fetch_array($secSupp)){ ?>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"><strong><?php echo $row['headline']; ?></strong></a> <br /><br />
                <?php echo $row['specify_cat']; ?> 
                <br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>
              
           </tr> <?php  } ?>
        </table>
     </div>
</div>

<!-- Section 5 -->
<div id="section5" class="container w3-border-bottom">
  <h3 class="w3-orange w3-round-large w3-padding"><strong>Results &AMP; Fixture:</strong> </h3>
      <div class="col-md-4"> 
         <div class="w3-card w3-round-xlarge">
            <header class="w3-black w3-padding w3-round-xlarge">
              <span class="w3-text-amber w3-large">Team: Log Standing</span>
            </header>
            <div class="w3-image w3-margin">
               <?php 
            while($row = mysqli_fetch_array($log)){ ?>
               <img src="TeamLog/<?php echo $row['image']; ?>" width="462" height="410" />
            <?php } ?>
            </div>
         </div>
     </div>
     <div class="col-md-4"> 
          <div class="w3-card w3-round-xlarge">
            <header class="w3-black w3-padding w3-round-xlarge">
              <span class="w3-text-amber w3-large">Recent results:</span>
            </header>
            <div class="w3-margin">
               <?php  while($row = mysqli_fetch_array($AnoteamRes)){ ?> 
               <ul class="w3-padding-top w3-blue-grey w3-round-xlarge"><li><strong><?php echo $row['res']; ?></strong><br />
                       <span><?php echo date_format(date_create($row['res_date']),"l d F Y"); ?></span></li></ul>
               
            <?php } ?>
             <?php  while($row = mysqli_fetch_array($teamRes)){ ?> 
               <ul class="w3-padding-top w3-light-grey w3-round-xlarge"><li><strong><?php echo $row['res'] ?></strong><br />
                       <span><?php echo date_format(date_create($row['res_date']),"l d F Y"); ?></span></li></ul>
               
            <?php } ?>
            </div>
         </div>  
     </div> 
     <div class="col-md-4"> 
         <div class="w3-card w3-round-xlarge">
            <header class="w3-black w3-padding w3-round-xlarge">
              <span class="w3-text-amber w3-large">Team: Upcoming Games</span>
            </header>
            <div class="w3-margin">
            <?php 
            while($row = mysqli_fetch_array($game)){ ?> 
               <ul class="w3-padding-top w3-blue-grey w3-round-xlarge"><li><strong><?php echo $row['fixture'] ?></strong><br />
                       <span><?php echo date_format(date_create($row['fix_date']),"l d F Y H:i") ?></span></li></ul>
               
            <?php } ?>
            <?php 
            while($row = mysqli_fetch_array($games)){ ?> 
               <ul class="w3-padding-top w3-light-grey w3-round-xlarge"><li><strong><?php echo $row['fixture'] ?></strong><br />
                       <span><?php echo date_format(date_create($row['fix_date']),"l d F Y H:i") ?></span></li></ul>
               
            <?php } ?>
            </div>
         </div>
     </div>
</div>

<hr />
</div>
 <br />   
</body>

</html>
