<?php 
$conn = new mysqli('localhost','root','','insta1');
session_start();?>
<html>
<head>
<title>All subscription</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css"  href="grid.css">
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
.sub-photo img{
    
    
    transform: scale(1);
    transition:transform 0.5s,opacity 0.5s;
}
.sub-photo img:hover{
    opacity: 1;
    transform:scale(1.03);
}

</style>
</head><body>
<?php
$query0 = "select id from signup where user_name = '".$_SESSION['username']."'";
$query0 = mysqli_query($conn,$query0);
$row0 = mysqli_fetch_array($query0);
$_SESSION['user_id'] = $row0['id'];


?><div class="container">
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>PROFILE</b></h3>
	<?php
	
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
  <div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
	<h1><p class="w3-left" style = "margin: 10px">CHANNELS</p></h1>
   
  </header>
  <div style = 'margin-left: 30px;'><br><p>
    Select the channels you want to subscribe, by subscribing the channel you get the latest updates by those channels.
</p></div><div class="container">
<div class=" row">
<div class='col span-1-of-3'>
<div class="card sub-photo" style="width: 18rem; height: 400px;">
  <img src="img\entertainment.jfif" class="card-img-top" alt="..." height=180>
  <div class="card-body">
    <h5 class="card-title">Entertainment</h5>
    <p class="card-text" style="height:60px;">Get latest new of the of the entertainment industry of the world.</p>
    <?php 
    $sub_check="select * from allsub where user_id='".$_SESSION['user_id']."' and subsription_id=1";
    $sub_check1=mysqli_query($conn,$sub_check);
  $sub_check2=mysqli_fetch_assoc($sub_check1);
  $count1="select count(*) as nofl from allsub where subsription_id=1";
  $count2=mysqli_query($conn,$count1);
  $count3=mysqli_fetch_assoc($count2);
	echo $count3['nofl']." person has subscribed it before<br><br>";
    if($sub_check2)
					{ ?>
					<a href="entertainmentunsave.php ?>">Unsubscribe</a>
					<?php }else{ ?>
					<a href="entertainmentsave.php ?>">Subscribe</a>
					<?php } ?>
    
  </div>
</div></div>
  
  <div class='col span-1-of-3'>
<div class="card sub-photo" style="width: 18rem; height:400px;">
  <img src="img\sports.jfif" class="card-img-top" alt="..." height=180>
  <div class="card-body">
    <h5 class="card-title">Sports</h5>
    <p class="card-text" style="height:60px;">Get daily updates of the sports around the world.</p>
    <?php 
    $sub_check="select * from allsub where user_id='".$_SESSION['user_id']."' and subsription_id=2";
    $sub_check1=mysqli_query($conn,$sub_check);
  $sub_check2=mysqli_fetch_assoc($sub_check1);
  $count1="select count(*) as nofl from allsub where subsription_id=2";
  $count2=mysqli_query($conn,$count1);
  $count3=mysqli_fetch_assoc($count2);
	echo $count3['nofl']." person has subscribed it before<br><br>";
    if($sub_check2)
					{ ?>
					<a href="sportunsave.php ?>">Unsubscribe</a>
					<?php }else{ ?>
					<a href="sportsave.php ?>">Subscribe</a>
					<?php } ?>
    
  </div>
</div></div>
  
  
  <div class='col span-1-of-3'>
<div class="card sub-photo" style="width: 18rem; height:400px; ">
  <img src="img\sports.jfif" class="card-img-top" alt="..." height=180>
  <div class="card-body">
    <h5 class="card-title">News</h5>
    <p class="card-text" style="height:60px;">Get daily updates of the news around the world.</p>
    <?php 
    $sub_check="select * from allsub where user_id='".$_SESSION['user_id']."' and subsription_id=3";
    $sub_check1=mysqli_query($conn,$sub_check);
  $sub_check2=mysqli_fetch_assoc($sub_check1);
  $count1="select count(*) as nofl from allsub where subsription_id=3";
  $count2=mysqli_query($conn,$count1);
  $count3=mysqli_fetch_assoc($count2);
	echo $count3['nofl']." person has subscribed it before<br><br>";
    if($sub_check2)
					{ ?>
					<a href="newsunsave.php ?>">Unsubscribe</a>
					<?php }else{ ?>
					<a href="newssave.php ?>">Subscribe</a>
					<?php } ?>
    
  </div>
</div></div>
  


</div></div>




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