<?php
	session_start();
	session_unset();
	header('Location:http://localhost/insta/admin_login.php');
?>