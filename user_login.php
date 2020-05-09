<?php
	ob_start();
	session_start();
	$profile = $_SESSION['username'];
	if($profile == true)
		header("Location: http://localhost/insta/post.php");
?>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<style>
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

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<center>
<h2 style = 'margin-top:50px;'>User Login</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

</center>
<div id="id01" class="modal" style = 'display: none;'>
  
  <form class="modal-content animate" action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    
    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
     <input type="submit" name = 'login' class="btn btn-primary" style = "margin-top:20px" value = "Login">
      
    </div>
  </form>
  </div>
  
  
  
  <div style = 'display: block;'>
  
  <form class="modal-content animate" enctype = 'multipart/form-data' action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    
    <div class="container">
      <label for="uname"><b>Full Name</b></label>
      <input type="text" placeholder="Enter Full Name" name="s_name" required>
	
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Choose Username" name="s_uname" required>
	  
	  <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="s_email" required>
	  
	  <label for="uname"><b>Phone Number</b></label>
      <input type="text" placeholder="Enter Phone Number" name="s_phone" required>
	  
	  <label for="uname"><b>Gender</b></label><br>
      <input type="radio" id="male" name="gender" value="MALE">
	  <label for="male">Male</label><br>
	  <input type="radio" id="female" name="gender" value="FEMALE">
	  <label for="female">Female</label><br>
	  
	  <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="s_psw" required>
      <label for="psw"><b>Re-Enter Password</b></label>
      <input type="password" placeholder="Enter Password" name="s_psw1" required>
	  <input type="file" name = 'uploadfile'"><br>
      <input type="submit" name = 'signup' class="btn btn-primary" style = "margin-top:20px" value = "Login">
      </div>
  </form>
  </div>  
  <?php 
	include 'connect.php';
	if(isset($_POST['signup'])){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){	
			$name = $_POST['s_name'];
			$uname = $_POST['s_uname'];
			$email = $_POST['s_email'];
			$gender = $_POST['gender'];
			$psw = $_POST['s_psw'];
			$psw1 = $_POST['s_psw1'];
			$phone = $_POST['s_phone'];
			echo $gender;
			
			
			if($psw == $psw1){
				 $check = "select count(*) from signup where user_name = '".$uname."'";
				 $check = mysqli_query($conn,$check);
				 $row = mysqli_fetch_array($check);
				 if($row['count(*)'] == 0){
					$filename = $_FILES['uploadfile']['name'];
					$tempname = $_FILES['uploadfile']['tmp_name'];
					$folder = 'profile/'.$filename;
					$query1 = "insert into signup (phone, full_name, user_name, password, photo, email, gender) values(".$phone.",'".$name."','".$uname."','".$psw."','".$folder."','".$email."','".$gender."')";
					$query1 = mysqli_query($conn,$query1);
					if(!$query1){
						echo mysqli_error($conn);
				 } 
					else{
						move_uploaded_file($tempname,$folder);
						$_SESSION['username'] = $uname;
						header("Location: http://localhost/insta/post.php");
						ob_end_flush();
					}
					 
				 }
				 else
					 echo "Username already Taken";
				 
			}
			else{
				echo "Password Not Matching!";
			}
		}
	}
  if(isset($_POST['login'])){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$username = $_POST['uname'];
	$password = $_POST['psw'];
	$query = "select count(*) from signup where user_name = '".$username."' and password = '".$password."'";
	$check = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($check);
	echo "<div style = 'display:block'>";
	if($row['count(*)'] == '1'){
		$_SESSION['username'] = $username;
		header("Location: http://localhost/insta/post.php");
		ob_end_flush();}
	else
		echo "Access Denied";
	echo '</div>';
  }}
 ?>
<script>
// Get the modal
var modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
