<?php
 require_once("loginCd.php");  
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login </title>
  
  <link rel="stylesheet" href="css/w3.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    .bk{background-color:#202020;}
    a {text-decoration: none;}
    .bh { border-right-style: ridge; border-color: #303030}
  </style>
 <script>
   $(function(){
    $("a").mouseover(function(){
        $(this).addClass("w3-black");
    }).mouseout(function(){
        $(this).removeClass("w3-black");
    });
   });
   </script>
</head>
<body class="w3-light-grey">
<?php include_once("NavAd.php") ?>
<div class="container w3-margin-lef">
    <br /><br />
	<div  class="w3-light-grey w3-content"><br />
    <form method="post" autocomplete="off"><br />
       <div class="col-md-3"></div>
    	<div class="col-md-6 w3-card-2 w3-margin-top w3-white w3-round-large">
	        <div class="form-group">
            	<h2 class="">Admin:</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="text" name="username" class="form-control" placeholder="Your Email" required />
                </div>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Your Password" required />
                </div>
             
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Login</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
        </div>
        
    </form>
    </div>	

</div>

</body>
</html>