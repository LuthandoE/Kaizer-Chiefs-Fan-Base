<?php
  require_once("adNewsCd.php");    
?>
<html>
<head>
  <link rel="stylesheet" href="css/w3.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
     .error { color:  red; }
     .bk{background-color:#202020;}
     a {text-decoration: none;}
     .bh { border-right-style: ridge; border-color: #303030}
  </style>
</head>

<body>
   <?php include_once("Nav.htm"); ?>
<br />
<div class="container">
<br /><br />
<div class="w3-center w3-padding-top"><h1>Add Kaizer Chiefs News</h1></div>
<br/>
<div class="w3-container">
<div class="w3-row-padding">
<div class="w3-half">
<div class="">
<form class="w3-form" method="post" enctype="multipart/form-data">
<div class="w3-group">      
<label class="w3-label w3-text-brown"><b>Your headline</b></label>
<input class="w3-input w3-border w3-sand" required="" name="title" type="text"/>
<span class="error">* <?php //echo $Errheadline; ?></span>
</div>


<div class="w3-group">      
<label class="w3-label w3-text-brown"><b>Category:</b></label>
<select class="w3-select w3-section" name="sub_cat">
Select an Option
<option value="" disabled="" selected="">Choose your option</option>
<?php echo $c; ?>

</select>
<span class="error">* <?php //echo $Errsub_category; ?></span>
</div>

<div class="w3-group">      
<label class="w3-label w3-text-brown"><b>Image</b></label>
<input class="w3-input w3-border w3-sand" name="image" required="" type="file"/>
<span class="error">* <?php // echo $Errimage; ?></span>
</div>
<table class="table">
        <tr>
        <td>Results:</td>
        <td><input type="text" class="w3-input" name="res" /></td>
        </tr>
        
        <tr>
        <td>Date:</td>
        <td><input type="datetime-local" name="resD" class="w3-input" /></td>
        </tr>
        </table>

</div>
</div> 

<div class="w3-half">
<br />
<div class="w3-group">      
    <label class="w3-label w3-text-brown"><b>Log standing Image</b></label>
    <input class="w3-input w3-border w3-sand" name="img"  type="file"/>
    <span class="error">* <?php // echo $Errimage; ?></span>
</div>
<div class="w3-group">     
    <label class="w3-label w3-text-brown"><b>Write here:</b></label>
    <textarea name="article" required="" class="form-control" rows="12" wrap="hard" id="comment"></textarea>
    <span class="error">* <?php // echo $Errarticle; ?></span>
<div class="w3-right w3-padding"><button class="w3-btn w3-black" type="submit" name="post">Submit</button></div>
</div>

</form>
</div> 
</div>
</div>
</div>
 
</body>
</html> 