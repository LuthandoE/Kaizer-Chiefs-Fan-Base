<?php
require_once('config.php');
require_once('error_handler.php');
class News{
	
   private $mysqli;
   public function __construct(){
		
		$this->mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
		}
   public function __destruct(){
		
		$this->mysqli->close();
		}

	public function editCat($id){
	   
	    $id = $this ->mysqli->real_escape_string($id);
		$query = "SELECT specify_cat FROM spec WHERE pid='$id'";
        $res = $this->mysqli->query($query);
        
        while($row = mysqli_fetch_array($res)){
            $cat = $row['specify_cat'];
        }
		return $cat;
	} 
    public function deleteNews($id){
       
       $id = $this ->mysqli->real_escape_string($id);
        $query = "Delete FROM news
                WHERE nid IN ($id)";
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function search($headline,$id){
        
        $headline = $this ->mysqli->real_escape_string($headline);
        $id = $this ->mysqli->real_escape_string($id);
        $query = "SELECT nid, headline,posted_on FROM news WHERE headline Like '%$headline%' AND userid = '$id'";
        $result = $this->mysqli->query($query);
        return $result;
    }

    public function getUserID($id){
        
        $id = $this ->mysqli->real_escape_string($id);
        $query = "SELECT * FROM login WHERE userid=$id";
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getUsername($username){
        
        $username = $this ->mysqli->real_escape_string($username);
        $query = "SELECT userid, username, pass FROM login WHERE username = '$username'";
        $result = $this->mysqli->query($query);
        return $result;
        
    }
 
	//Populating dropdown sub category
	public function GetCategory(){
		$query = "SELECT specify_cat FROM spec 
                  ORDER BY specify_cat ASC";
		$result = $this->mysqli->query($query);
        return $result;
		
		}
 	//Get games
	public function GetGames(){
		$query = "SELECT fixture,fix_date FROM team_fixture 
                  ORDER BY fix_date ASC LIMIT 4 OFFSET 1";
		$result = $this->mysqli->query($query);
        return $result;
		
	}
	public function GetGame(){
		$query = "SELECT fixture,fix_date FROM team_fixture 
                  ORDER BY fix_date ASC LIMIT 1";
		$result = $this->mysqli->query($query);
        return $result;
		
	}
    	//Get results
	public function GetResults(){
		$query = "SELECT res,res_date FROM result 
                  ORDER BY res_date DESC LIMIT 4 OFFSET 1";
		$result = $this->mysqli->query($query);
        return $result;
		
		}
      	//Get result
	public function GetResult(){
		$query = "SELECT res,res_date FROM result 
                  ORDER BY res_date DESC LIMIT 1";
		$result = $this->mysqli->query($query);
        return $result;
		
		}
 	//Get result
	public function GetLog(){
		$query = "SELECT image FROM logstanding 
                  ORDER BY posted_on DESC LIMIT 1";
		$result = $this->mysqli->query($query);
        return $result;
		
		}
	//Getting a sub category id 
	public function getSubID($pid){  
		
        $pid = $this ->mysqli->real_escape_string($pid);
		$q = "SELECT pid FROM spec WHERE specify_cat ='$pid'";
        $result = $this->mysqli->query($q);

        while($row = mysqli_fetch_array($result)){
            $pid = $row['pid'];
        }
		return $pid;
	}
    
    //Getting a sub category id 
	public function getID($nid){  
		$nid = $this ->mysqli->real_escape_string($nid);
		$q = "SELECT pid FROM news WHERE nid ='$nid'";
        $result = $this->mysqli->query($q);

        while($row = mysqli_fetch_array($result)){
            $pid = $row['pid'];
        }
		return $pid;
	}
    public function getTopNews($id){
        
        $id = $this ->mysqli->real_escape_string($id);
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = $id ORDER BY news.posted_on
                  DESC LIMIT 4";
                  
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function tobEidted($id){
        
        $id = $this ->mysqli->real_escape_string($id);
        $query = "SELECT nid, headline,news, image,posted_on,pid
                  FROM news  
                  WHERE nid = $id";
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function updateNews($newsid, $sub_category,$article,$image,$headline,$userid,$btn){
        
        $newsid = $this ->mysqli->real_escape_string($newsid);
       // $category = $this ->mysqli->real_escape_string($category);
        $sub_category = $this ->mysqli->real_escape_string($sub_category);
        $article = $this ->mysqli->real_escape_string($article);
        $headline = $this ->mysqli->real_escape_string($headline);
        $userid = $this ->mysqli->real_escape_string($userid);
        
        $tmp_dir = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
        
        $upload_dir = 'images/'; // upload directory
	
	    $imgExt = strtolower(pathinfo($image,PATHINFO_EXTENSION)); // get image extension
		
		// valid image extensions
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
		// rename uploading image
		$image = rand(1000,1000000).".".$imgExt;
 	    // allow valid image file formats
		if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if(($imgSize < 5000000) && (!empty($image)))				{
					move_uploaded_file($tmp_dir,$upload_dir.$image);
				}
				else{
					echo  "<script>alert('Sorry, your file is too large.')</script>";
				}
			}
			else{
				echo  "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";		
			}
         
        $query = "UPDATE news SET news = '".$article."',image= '".$image."', posted_on = NOW(),
                         headline = '".$headline."',
                         pid = '".$sub_category."', userid = '".$userid."' WHERE nid = '".$newsid."'";
        try{
        if ($this->mysqli->query($query) === TRUE) {
            echo  "<script>
                        alert('Article has been successfully updated');
                    </script>";
                    header("Location:edit.php");
          
        } else {
            echo   "<script>  alert('". "Error: " . $query . "<br>" .$this->mysqli->error ."') </script>";
        }
        }catch(exception $e){
            echo   "<script>  alert('". "Error: " .$e->getMessage() ."') </script>";
        }
    }
	public function post($sub_category,$article,$image,$headline,$userid,$btn){
	    
        $sub_category = $this ->mysqli->real_escape_string($sub_category);
        $article = $this ->mysqli->real_escape_string($article);
        $headline = $this ->mysqli->real_escape_string($headline);
        
        $image = $this ->mysqli->real_escape_string($image);
        $tmp_dir = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
        
        $upload_dir = 'images/'; // upload directory

	
	    $imgExt = strtolower(pathinfo($image,PATHINFO_EXTENSION)); // get image extension
		
		// valid image extensions
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
		// rename uploading image
		$image = rand(1000,1000000).".".$imgExt;
 	    // allow valid image file formats
		if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$image);
				}
				else{
					echo  "<script>alert('Sorry, your file is too large.')</script>";
				}
			}
			else{
				echo  "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";		
			}
            
     // $this->mysqli->query("INSERT INTO cat (catid, pid) VALUES('".$category."','".$sub_category."')");
	//	$catid  =$this->mysqli->insert_id;
		
	    $sql = "INSERT INTO news (news, image,posted_on,headline,pid,userid)
               VALUES('".$article."','".$image."',NOW(),'"
               .$headline."','".$sub_category."','".$userid."')";
        try{
        if ($this->mysqli->query($sql) === TRUE) {
            echo  "<script>
                        alert('Article has been successfully added');
                    </script>";
          
        } else {
            echo   "<script>  alert('". "Error: " . $sql . "<br>" .$this->mysqli->error ."') </script>";
        }
		} catch(Exception $e){
		     echo "<script>
                        alert('An error has occured while trying to add article');
                    </script>".$e->getMessage();
		}
        	
	}
    
    public function addLogImage($img){
	    
        
        $img = $this ->mysqli->real_escape_string($img);
        $tmp_dir = $_FILES['img']['tmp_name'];
		$imgSize = $_FILES['img']['size'];
        
        $upload_dir = 'TeamLog/'; // upload directory

	
	    $imgExt = strtolower(pathinfo($img,PATHINFO_EXTENSION)); // get image extension
		
		// valid image extensions
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
		// rename uploading image
		$img = rand(1000,1000000).".".$imgExt;
 	    // allow valid image file formats
		if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$img);
				}
				else{
					echo  "<script>alert('Sorry, your file is too large.')</script>";
				}
			}
			else{
				echo  "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";		
			}
            
     // $this->mysqli->query("INSERT INTO cat (catid, pid) VALUES('".$category."','".$sub_category."')");
	//	$catid  =$this->mysqli->insert_id;
		
	    $sql = "INSERT INTO logstanding (image,posted_on)
               VALUES('".$img."',NOW())";
        try{
        if ($this->mysqli->query($sql) === TRUE) {
            echo  "<script>
                        alert('Team logstanding has been successfully added');
                    </script>";
          
        } else {
            echo   "<script>  alert('". "Error: " . $sql . "<br>" .$this->mysqli->error ."') </script>";
        }
		} catch(Exception $e){
		     echo "<script>
                        alert('An error has occured while trying to add log standing');
                    </script>".$e->getMessage();
		}
        	
	}
    public function addResults($result,$resD){
	    
        $result = $this ->mysqli->real_escape_string($result);
        $resD = $this ->mysqli->real_escape_string($resD);
	    $sql = "INSERT INTO result (res,res_date)
               VALUES('".$result."','".$resD."')";
        try{
        if ($this->mysqli->query($sql) === TRUE) {
            echo  "<script>
                        alert('Team results have been successfully added');
                    </script>";
          
        } else {
            echo   "<script>  alert('". "Error: " . $sql . "<br>" .$this->mysqli->error ."') </script>";
        }
		} catch(Exception $e){
		     echo "<script>
                        alert('An error has occured while trying to add results');
                    </script>".$e->getMessage();
		}
        	
	}
    public function getTNews(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 1 ORDER BY news.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function editNews($id){
        
        $id = $this ->mysqli->real_escape_string($id);
        $query = "SELECT nid, headline,posted_on
                  FROM news  
                  WHERE userid = $id ORDER BY posted_on
                  DESC LIMIT 30";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getTeamNews(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 1 ORDER BY news.posted_on
                  DESC LIMIT 4 OFFSET 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function AnoTeamNews(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 1 ORDER BY news.posted_on
                  DESC LIMIT 4 OFFSET 5";
        
        $result = $this->mysqli->query($query);
        return $result;
    }    
    public function getNewsID($newsID){
        
        $newsID = $this ->mysqli->real_escape_string($newsID);
        $query = "SELECT headline, news, image, posted_on FROM news
                    WHERE nid =".$newsID;
                    
       $result = $this->mysqli->query($query);
       return $result;  
    }

    public function SupporterTopNews(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 3 ORDER BY news.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
  
    public function getDiski(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 2 ORDER BY news.posted_on
                  DESC LIMIT 4 OFFSET 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getRumours(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 2 ORDER BY news.posted_on
                  DESC LIMIT 4 OFFSET 5";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
     public function getDiski01(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 2 ORDER BY news.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getSupportersView(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 3 ORDER BY news.posted_on
                  DESC LIMIT 3";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getMoreRumr(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 4 ORDER BY news.posted_on
                  DESC LIMIT 3";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function secSupport(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 3 ORDER BY news.posted_on
                  DESC LIMIT 4 OFFSET 4";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
     public function anoSupporterTop(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 3 ORDER BY news.posted_on
                  DESC LIMIT 1 OFFSET 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getSupporterMN(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 3 ORDER BY news.posted_on
                  DESC LIMIT 4 OFFSET 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getFasioMan(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 8 ORDER BY news.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function AnoTeamTopN(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 1 ORDER BY news.posted_on
                  DESC LIMIT 1 OFFSET 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getFasioKids(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 10 ORDER BY news.posted_on
                  DESC LIMIT 6";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getKid(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE news.catid = 1 AND spec.pid = 10 ORDER BY news.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
       public function getKids(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 10 ORDER BY news.posted_on
                  DESC LIMIT 3 OFFSET 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getMen(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 8 ORDER BY news.posted_on
                  DESC LIMIT 3 OFFSET 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getFasioWmen(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 9 ORDER BY news.posted_on
                  DESC LIMIT 3 OFFSET 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function carouselRumour(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 2 ORDER BY news.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getMotoring(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 12 ORDER BY news.posted_on
                  DESC LIMIT 6 OFFSET 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getMotorLaunches(){
        $query = "SELECT news.nid, news.headline, news.image,news.posted_on,spec.specify_cat
                  FROM news INNER JOIN spec ON news.pid = spec.pid 
                  WHERE  spec.pid = 14 ORDER BY news.posted_on
                  DESC LIMIT 6";
        
        $result = $this->mysqli->query($query);
        return $result;
    }

function humanTiming ($time){

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

  }
    
}
?>
