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
  height: 550px;
  
}
div.gallery:hover {
  border: 1px solid #777;
}


div.desc {
  width: 500px;
  padding: 5px;
  text-align: left;
  
}


body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}


/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
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
  <h2 style = 'margin-left:30px;'>Add your Post here</h2>
  <form class="modal-content animate" style = 'margin-left: 30px; margin-top:50px;' action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method = 'post' enctype = 'multipart/form-data'>
   <div class = 'container'>
   <label><b>Choose an Image to be posted</b></label><br>
   <input type="file" name = 'post'><br><br>
   <label><b>Add a Caption</b></label>
   <input type="text" placeholder = 'Add your Caption here ....' name = 'caption'><br>
   <input type="submit" name = 'post' class="btn btn-primary" style = "margin-top:20px" value = "Post">
   </div>	
  </form>
  <?php 
  if(isset($_POST['post'])){
	$filename = $_FILES['post']['name'];
	$tempname = $_FILES['post']['tmp_name'];
	$folder = 'post/'.$filename;
	move_uploaded_file($tempname,$folder);
	$cap = $_POST['caption'];
	$query = "select id from signup where user_name = '".$_SESSION['username']."'";
	$row = mysqli_fetch_array(mysqli_query($conn,$query));
	$query = "insert into post (user_id,banner,caption,created) values (".$row['id'].",'".$folder."','".$cap."',now());";
	$query = mysqli_query($conn,$query);
	if(!$query)
		echo mysqli_error($conn);
	else{
		move_uploaded_file($tempname,$folder);
		header('Location:http://localhost/insta/post.php');
		ob_end_flush();
	}
		}
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
