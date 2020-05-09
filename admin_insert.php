<?php
	session_start();
	$profile = $_SESSION['user_name'];
	if($profile == false){
		header('Location:http://localhost/insta/admin_login.php');
	}
?>
<html>
<title>Admin Insert</title>
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


</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>ADMIN</b></h3>
	<h6> Hello, <b><?php echo $_SESSION['user_name']; ?></b></h6>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold;">
    <a href="http://localhost/insta/admin.php" class="w3-bar-item w3-button">Main Page</a>
    <a href="http://localhost/insta/admin_update.php" class="w3-bar-item w3-button">Update</a>
    <a href="#" class="w3-bar-item w3-button">Insert</a>
    <a href="http://localhost/insta/admin_delete.php" class="w3-bar-item w3-button">Delete</a>
	<a href="http://localhost/insta/users.php" class="w3-bar-item w3-button">Users</a>
	<a href="http://localhost/insta/admin_pri.php" class="w3-bar-item w3-button">Admin Priveledges</a>
    <a href="http://localhost/insta/logout.php" class="w3-bar-item w3-button">Logout</a>
  </div>
  </nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">ADMIN</div>
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
	
  </header>
 <br>
<h1>INSERT SECTION</H1>
 

  
  
  

  <!-- Product grid -->
  <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = 'POST'>

<div class="input-group input-group-lg" style = "margin-top:50px">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-lg">Channel Id</span>
  </div>
  <input type="text" class="form-control" name = "Channel_Id">
</div>

<div class="input-group input-group-lg" style = "margin-top:20px">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-lg">Channel Name</span>
  </div>
  <input type="text" class="form-control" name = "Channel_name">
</div>


<div class="input-group input-group-lg" style = "margin-top:20px">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-lg">Date of Start</span>
  </div>
  <input type="text" placeholder = "yyyy-mm-dd" class="form-control" name = "doa">
</div>


<div class="input-group input-group-lg" style = "margin-top:20px">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-lg">Date of end</span>
  </div>
  <input type="text" placeholder = "yyyy-mm-dd" class="form-control" name = "doe">
</div>

<input type="submit" class="btn btn-primary" style = "margin-top:20px" value = "Insert">



</form>

<?php	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$Channel_Id = $_POST['Channel_Id'];
		$Channel_name = $_POST['Channel_name'];
		$doa = $_POST['doa'];
		$doe = $_POST['doe'];
		include 'connect.php';
		$query = "insert into subscription values (".$Channel_Id.",'".$Channel_name."','".$doa."','".$doe."')";
		$query1 = mysqli_query($conn,$query);
		if(!$query1){
			echo 'Update not successfull';
		}
		else
			echo "Successfully Inserted";
	}
?>



</div>


</div>


</div>


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
