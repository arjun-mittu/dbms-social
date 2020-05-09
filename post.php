<?php
	ob_start();
	session_start();
	$profile = $_SESSION['username'];
	if($profile == false)
		header('Location:http://localhost/insta/user_login.php');
?>
<html>
<title>POST</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: down;
  width: 500px;
  min-height: 550px;
  
}
div.gallery:hover {
  border: 1px solid #777;
}


div.desc {
  min-height: 50px;
  width: 500px;
  padding: 5px;
  text-align: left;
  
}

</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>POST</b></h3>
	<?php
	include 'connect.php';
	$query = "select photo from signup where user_name = '".$_SESSION['username']."'";
	$query = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($query);
	echo "<img src = '".$row['photo']."' width = 100 height = 100>"
	?>
	<h6> Hello, <b><?php echo $_SESSION['username']; ?></b></h6>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="http://localhost/insta/home.php" class="w3-bar-item w3-button">Home</a>
	<a href="http://localhost/insta/post.php" class="w3-bar-item w3-button">Posts</a>
	<a href="http://localhost/insta/my_post.php" class="w3-bar-item w3-button">My Posts</a>
	<a href="http://localhost/insta/user_friend.php" class="w3-bar-item w3-button">Friends</a>
    <a href="http://localhost/insta/people.php" class="w3-bar-item w3-button">People</a>
    <a href="http://localhost/insta/allsub.php" class="w3-bar-item w3-button">All channels</a>
    <a href="http://localhost/insta/mysub.php" class="w3-bar-item w3-button">My channels</a>

	<a href="http://localhost/insta/user_logout.php" class="w3-bar-item w3-button">Logout</a>
	
  </div>
	
  </div>
  </nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">POST</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
	<h1><p class="w3-left" style = "margin: 10px">POSTS</p></h1>
   
  </header>

   <!-- Product grid -->
  <h2><a style = 'margin-left: 30px;' href = 'http://localhost/insta/post_add.php'>Add a Post </a></h2>
  <?php 
	$query1 = "select * from post, signup where user_id = signup.id and user_name = '".$_SESSION['username']."'";
	
	
	
	$query1 = mysqli_query($conn,$query1);
	
	while($row = mysqli_fetch_array($query1)){
		echo "<div style = 'margin-left: 30px;' class='gallery'>";
		echo "<div class='desc'><img src = '".$row['photo']."' height=40 width=40><font size = 3><b>".$row['user_name']."</b> posted on <b>".$row['created']."</b></font></div>";
		echo "<img src='".$row['banner']."'  align = center width = 500 height = 400>";
		$query3 = "select count(*) from likes group by post_id having post_id = ".$row['p_id'];
		$query3 = mysqli_query($conn,$query3);
		echo "<div class='desc'>";  
		echo "Likes: ";
		while($row2 = mysqli_fetch_array($query3)){
			echo $row2['count(*)'];
		}
		echo "<b><br>".$row['caption']."</b></div>";
		$query2 = "select photo,user_name, comments, comments.created from signup,comments, post where comments.id = p_id and comments.user_id = signup.id and p_id = ".$row['p_id']." and post.user_id = ".$row['id'];
		$query2 = mysqli_query($conn,$query2);
		if(!$query1)
			echo mysqli_error($conn);
		
		while($row1 = mysqli_fetch_array($query2)){
			echo "<img src = '".$row1['photo']."' height = 50 width = 50>";
			echo '<b>'.$row1['user_name'].'</b> commented <b>'.$row1['comments'].'</b> on '.$row1['created'].'<br>';
			echo "<hr width = '50%' color = 'gray'>";
		}
		?>
		
		<form class='modal-content animate' action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method='post'>
		<input type='text' placeholder='Add your comment here ....' name = 'comment' required>
		<input type='hidden' name = 'p_id' value = "<?php echo $row['p_id']; ?>">
		<input type="submit" name = 'post' class="btn btn-primary" style = "margin-top:20px" value = "Post">
      	</form>
		<form style = "margin-top:-30px;" action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method='post'>
		<input type='hidden' name = 'p_id' value = "<?php echo $row['p_id']; ?>">
		<input type="submit" name = 'like' class="btn btn-primary" style = "margin-top:20px" value = "Like">
      	</form>
		
		<?php 
		echo "</div>";
		}
		
			if(isset($_POST['like'])){
				$query = "select id from signup where user_name = '".$_SESSION['username']."'";
				$row1 = mysqli_fetch_array(mysqli_query($conn,$query));
	 			$p_id = $_POST['p_id'];
				$query1 = "insert into likes values ('".$row1['id']."',now(),".$p_id.")";
				$query1 = mysqli_query($conn,$query1);
				if(!$query1)
					echo "You have already liked this post";
				else{
					header("Refresh:0");
					ob_end_flush();
			}}
			
			
			if(isset($_POST['post'])){
			$comment = $_POST['comment'];
			$p_id = $_POST['p_id'];
			
			$query = "select id from signup where user_name = '".$_SESSION['username']."'";
			$row1 = mysqli_fetch_array(mysqli_query($conn,$query));
	 		$query1 = "insert into comments values (".$row1['id'].",sysdate(),'".$comment."',".$p_id.")";
			$query1 = mysqli_query($conn,$query1);
			
			header("Refresh:0");
			ob_end_flush();
			if(!$query1)
				echo mysqli_error($conn);
			
			}
			
	?>






<?php 
	$query0 = "select b.user_name from signup as a, signup b, friend where a.id = user_id and b.id = friend and a.user_name = '".$_SESSION['username']."'";
	$query0 = mysqli_query($conn,$query0);
	while($row0 = mysqli_fetch_array($query0)){
	$query1 = "select * from post, signup where user_id = signup.id and user_name = '".$row0['user_name']."'";
	
	
	
	$query1 = mysqli_query($conn,$query1);
	
	while($row = mysqli_fetch_array($query1)){
		echo "<div style = 'margin-left: 30px;' class='gallery'>";
		echo "<div class='desc'><img src = '".$row['photo']."' height=40 width=40><font size = 3><b>".$row['user_name']."</b> posted on <b>".$row['created']."</b></font></div>";
		echo "<img src='".$row['banner']."'  align = center width = 500 height = 400>";
		$query3 = "select count(*) from likes group by post_id having post_id = ".$row['p_id'];
		$query3 = mysqli_query($conn,$query3);
		echo "<div class='desc'>";  
		echo "Likes: ";
		while($row2 = mysqli_fetch_array($query3)){
			echo $row2['count(*)'];
		}
		echo "<b><br>".$row['caption']."</b></div>";
		$query2 = "select photo,user_name, comments, comments.created from signup,comments, post where comments.id = p_id and comments.user_id = signup.id and p_id = ".$row['p_id']." and post.user_id = ".$row['id'];
		$query2 = mysqli_query($conn,$query2);
		if(!$query1)
			echo mysqli_error($conn);
		
		while($row1 = mysqli_fetch_array($query2)){
			echo "<img src = '".$row1['photo']."' height = 50 width = 50>";
			echo '<b>'.$row1['user_name'].'</b> commented <b>'.$row1['comments'].'</b> on '.$row1['created'].'<br>';
			echo "<hr width = '50%' color = 'gray'>";
		}
		?>
		
		<form class='modal-content animate' action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method='post'>
		<input type='text' placeholder='Add your comment here ....' name = 'comment' required>
		<input type='hidden' name = 'p_id' value = "<?php echo $row['p_id']; ?>">
		<input type="submit" name = 'post' class="btn btn-primary" style = "margin-top:20px" value = "Post">
      	</form>
		<form style = "margin-top:-30px;" action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method='post'>
		<input type='hidden' name = 'p_id' value = "<?php echo $row['p_id']; ?>">
		<input type="submit" name = 'like' class="btn btn-primary" style = "margin-top:20px" value = "Like">
      	</form>
		
		<?php 
		echo "</div>";
	}}
		
						
	?>





</div>



<script>
// Accordion 



function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
