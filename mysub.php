<?php
    session_start();
    $conn = new mysqli('localhost','root','','insta1');
    $user_id=$_SESSION['user_id'];  
?>
<html>
<title>My subscriptions</title>
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

</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>PROFILE</b></h3>
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
  <div class="w3-bar-item w3-padding-24 w3-wide">PROFILE</div>
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
	<h1><p class="w3-left" style = "margin: 10px">My subscriptions</p></h1>
   
  </header>
  <div class="container">
  <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Entertainement
  </a>
  <div class="collapse" id="collapseExample">
  <div class="card card-body">
    <?php
    $check="select * from allsub where user_id='$user_id' and subscription_id=1";
    $check2= mysqli_query($conn,$check);
    if(!$check2){

    
    $get_sub="select banner,title from entertainment,allsub where allsub.user_id='$user_id' and allsub.subsription_id=entertainment.subscript_id order by created desc";
    $result = mysqli_query($conn,$get_sub);
    while($rec = mysqli_fetch_assoc($result)):
?>

  <div class="card mb-3">
  <img src="img\<?php echo $rec['banner'];?>" height=500 class="card-img-top" alt="<?php echo $rec['type'];?>">
  <div class="card-body">
    
    <p class="card-text"><?php echo $rec['title']; ?></p>
  </div>
</div>

<?php
    endwhile ;
    }
    else {
      echo "<hr width =100%>";

    }
    ?>
    </div></div>
  </p>
   <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Sports
  </a>
  <div class="collapse" id="collapseExample">
  <div class="card card-body">
    <?php
    $check="select * from allsub where user_id='$user_id' and subscription_id=1";
    $check2= mysqli_query($conn,$check);
    if(!$check2){

    
    $get_sub="select banner,title from sports,allsub where allsub.user_id='$user_id' and allsub.subsription_id=sports.subscript_id order by created desc";
    $result = mysqli_query($conn,$get_sub);
    while($rec = mysqli_fetch_assoc($result)):
?>

  <div class="card mb-3">
  <img src="img\<?php echo $rec['banner'];?>" height=500 class="card-img-top" alt="<?php echo $rec['type'];?>">
  <div class="card-body">
    
    <p class="card-text"><?php echo $rec['title']; ?></p>
  </div>
</div>

<?php
    endwhile ;
    }
    else {
      ?>
       <div class="card-body">
    
    <p class="card-text">Subscribe the channel first</p>
  </div>
</div>
    <?php
    }
    ?>


    </div></div></p>
    <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    News
  </a>
  <div class="collapse" id="collapseExample">
  <div class="card card-body">
    <?php
    $check="select * from allsub where user_id='$user_id' and subscription_id=1";
    $check2= mysqli_query($conn,$check);
    if(!$check2){

    
    $get_sub="select banner,title from news,allsub where allsub.user_id='$user_id' and allsub.subsription_id=news.subscript_id order by created desc";
    $result = mysqli_query($conn,$get_sub);
    while($rec = mysqli_fetch_assoc($result)):
?>

  <div class="card mb-3">
  <img src="img\<?php echo $rec['banner'];?>" height=500 class="card-img-top" alt="<?php echo $rec['type'];?>">
  <div class="card-body">
    
    <p class="card-text"><?php echo $rec['title']; ?></p>
  </div>
</div>

<?php
    endwhile ;
    }
    else {
      echo "<hr width =100%>";

    }
    ?>


    </div></div></p>



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

    