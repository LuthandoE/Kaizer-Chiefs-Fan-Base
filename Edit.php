<?php
   require_once("firstEd.php");
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
   <div class="w3-right">
   <form method="post" class="form-inline" role="form"  action="SearchResult.php">
    <div class="form-group">
      <input id="search" class="form-control" placeholder="search with headline" name="search" type="text" />
      <input class="w3-btn w3-round-xxlarge"  type="submit" name="send"/>
    </div></form>
   </div>
   <table class="table table-striped">
       <thead>
          <tr>
          <th>#ID</th>
          <th>Headline</th>
          <th>Date</th>
       </tr>
       </thead>
       <tbody id="body1">
          <tr>
          <?php while($row = mysqli_fetch_array($display)){ ?>
          <td><?php echo $row['nid'] ?></td>
          <td><?php echo $row['headline'] ?></td>
          <td><?php echo $row['posted_on'] ?></td>
          <td><a href="EditNews.php?id=<?php echo $row['nid'] ;?>">Edit</a></td>
       </tr>
       <?php } ?>
       </tbody>
   </table>
   </div>
</body>
</html>