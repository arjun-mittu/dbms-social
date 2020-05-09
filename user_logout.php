<?php
	session_start();
	session_unset();
	header('Location:http://localhost/insta/user_login.php');
?>