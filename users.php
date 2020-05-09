<?php
	session_start();
	$profile = $_SESSION['user_name'];
	if($profile == false){
		header('Location:http://localhost/insta/admin_login.php');
	}
?>
<html>
<title>Admin</title>
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


#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}

</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>ADMIN</b></h3>
	<h6> Hello, <b><?php echo $_SESSION['user_name']; ?></b></h6>
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
	<h1><p class="w3-left" style = "margin: 10px">LIST OF USERS</p></h1>
   
  </header>

 

  
  
  

  <!-- Product grid -->
<form action = "<?php echo htmlspecialchars ($_SERVER['PHP_SELF']) ?>" method = 'post'>
	<input type="text" class="form-control" id="id" name = 'name' onkeyup="myFunction()" placeholder="Search for users.." title="Type in a name">

	<?php
		include 'connect.php';
		$query = "select user_name from signup where admin = 'NO'";
		$query1 = mysqli_query($conn,$query);
		echo "<ul id='myUL'>";
		while($row = mysqli_fetch_array($query1)){
			echo "<li><a href = '#'>".$row['user_name']."</a></li>";
		}
		echo '</ul>';
	?>
<input style = 'margin-left:25px; margin-top:20px;' name = 'delete' type="submit" class="btn btn-danger" style = "margin-top:20px" value = "Delete User">
<input style = 'margin-left:25px; margin-top:20px;' name = 'admin' type="submit" class="btn btn-primary" style = "margin-top:20px" value = "Make Admin">
</form>
<?php
	if(isset($_POST['delete']))
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		$query = "delete from signup where user_name  = '".$name."'";
		$query2 = mysqli_query($conn,$query);
		if(!$query2)
			die("Can't delete the user");
		else
			echo 'Delete Succefull!!';
	}
	if(isset($_POST['admin'])){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		$query = "update signup set admin = 'YES' where user_name  = '".$name."'";
		$query2 = mysqli_query($conn,$query);
		if(!$query2)
			die("Fatal Error!");
		else
			echo 'Admin Priveledges Changed!';
	}
	}
	?>
	<h1><p class="w3-left" style = "margin: 10px">LIST OF SUPERUSERS</p></h1>
	<table class='table table-dark'>
	<?php
		$query = "select user_name from signup where admin = 'YES'";
		$query = mysqli_query($conn,$query);
		while($row = mysqli_fetch_array($query)){
			echo "<tr><td>".$row['user_name']."</td></tr>";			
		}
	?>
	</table>



</div>



<script>
// Accordion 
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("id");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}




var table = document.getElementById('table1'),rIndex;
for(var i = 0; i<table.rows.length; i++){
	table.rows[i].onclick = function(){
		rIndex = this.rowIndex;
		console.log(rIndex);
		document.getElementById("id").value = this.cells[0].innerHTML;
		
	};
}


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
