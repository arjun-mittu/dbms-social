<?php
	session_start();
	$profile = $_SESSION['user_name'];
	if($profile == false){
		header('Location:http://localhost/insta/admin_login.php');
	}
?>
<html>
<title>Admin Delete</title>
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
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>ADMIN</b></h3>
	<h6> Hello, <b><?php echo $_SESSION['user_name']; ?></b></h6>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="http://localhost/insta/admin.php" class="w3-bar-item w3-button">Main Page</a>
    <a href="http://localhost/insta/admin_update.php" class="w3-bar-item w3-button">Update</a>
    <a href="http://localhost/insta/admin_insert.php" class="w3-bar-item w3-button">Insert</a>
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
<h1>DELETE SECTION</H1>

  
  
  

  <!-- Product grid -->
   
	<table style = 'margin-top: 50px' class='table table-dark' id = 'table' style = 'border-radius: 10px'>
	
    <tr>
	<td><b>Channel Id</b></td>
	<td><b>Channel Name</b></td>
	<td><b>Date of Arrival</b></td>
	<td><b>Date of End</b></td>
	</tr>
	
	
 <?php	
		include 'connect.php';
		$query1 = 'select * from subscription';
		$query = mysqli_query($conn,$query1);
		while($row = mysqli_fetch_array($query)){
			echo "<tr><td>".$row['channel_id']."</td>";
			echo "<td>".$row['channel']."</td>";
			echo "<td>".$row['doa']."</td>";
			echo "<td>".$row['doe']."</td></tr>";
		}
		echo "</table>";
?>
  <h2 style = 'margin-top: 30px;' >Are you sure to delete this data?</h2>
  <form action = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>' method = 'post'>
  <br><input type = 'text' placeholder = 'Channel ID'  readonly name = 'id' id = 'id'>
  <br><input type = 'text' placeholder = 'Channel Name' readonly style = 'margin-top: 20px;' name = 'name' id = 'name'>
  <br><input type = 'text' placeholder = 'Date of Arrival' readonly style = 'margin-top: 20px;' name = 'doa' id = 'doa'>
  <br><input type = 'text' placeholder = 'Date of End' readonly style = 'margin-top: 20px;' name = 'doe' id = 'doe'> 
  <br><input type="submit" class="btn btn-danger" style = "margin-top:20px" value = "Delete"></form>	
</div>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$id = $_POST['id'];
		include 'connect.php';
		$query = "delete from subscription where channel_id =".$id; 
		$query1 = mysqli_query($conn,$query);
		if(!$query1)
			echo 'Not Deleted Successfully';
		else
			echo 'Deleted Successfully';
	}
?>

</div>


</div>


</div>



<script>
var table = document.getElementById('table'),rIndex;
for(var i = 0; i<table.rows.length; i++){
	table.rows[i].onclick = function(){
		rIndex = this.rowIndex;
		console.log(rIndex);
		document.getElementById("id").value = this.cells[0].innerHTML;
		document.getElementById("name").value = this.cells[1].innerHTML;
		document.getElementById("doa").value = this.cells[2].innerHTML;
		document.getElementById("doe").value = this.cells[3].innerHTML;
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
