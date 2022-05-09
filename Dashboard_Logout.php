<DOCTYPE HTML>
<html>
<head>
<title> Dashboard Logout </title>
</head>
<link href='css1.css' rel='stylesheet'>
<body>
	<?php 
	session_start();
	session_destroy();
	header("location:index.php"); 
	?>
</body>