<?php
 require_once("EditNewsCd.php");
?>
<!DOCTYPE html>
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
<div class="w3-center"><h1>Edit News</h1></div>
<br/>
<div class="w3-container">
<div class="w3-row-padding">
<div class="w3-half">
<div class="">
<div class="w3-container w3-light-grey w3-round-jumbo">
<h2>Headlines</h2>
</div>
<form class="w3-form" method="post" enctype="multipart/form-data">
<div class="w3-group">      
<label class="w3-label w3-text-brown"><b>ID</b></label>
<?php while($row = mysqli_fetch_array($tobeEdit)){ ?>
<input class="w3-input w3-border w3-sand" disabled="" value="<?php echo $row['nid'] ?>" name="title" type="text"/>
</div>
<div class="w3-group">      
<label class="w3-label w3-text-brown"><b>Your headline</b></label>
<input class="w3-input w3-border w3-sand" required="" value="<?php echo $row['headline'] ?>" name="title" type="text"/>
</div>

<div class="w3-group">      
<label class="w3-label w3-text-brown"><b>Category:</b><span class="w3-text-red"> <?php echo $news->editCat($row['pid']) ?></span></label>
<select class="w3-select w3-section" name="sub_cat">
Select an Option
<option value="" disabled=""  selected="">Choose your option</option>
<option><?php echo $c; ?></option>
</select>
</div>

<div class="w3-group">      
<label class="w3-label w3-text-brown"><b>Image</b></label>
<input class="w3-input w3-border w3-sand" required="" name="image" type="file"  value="" />
</div>


</div>
</div> 

<div class="w3-half">
<?php echo $errMessage;  ?>
<div class="w3-container w3-light-grey w3-center">
   <img src="images/<?php echo $row['image'] ?>" width="30%" />
</div>

<div class="w3-group">      

<textarea name="article" required=""  class="form-control" rows="12" id="comment"  >
 <?php echo $row['news']; ?>
</textarea>
</div>
<div class="w3-group">
<?php } ?>
<div class="w3-right"><button class="w3-btn w3-black" type="submit" name="post">Submit</button></div>

</div>
</form>
</div> 
</div>
</div>
</body>
</html>