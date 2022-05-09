<DOCTYPE HTML>
<html>
<head>
<title> Dashboard Deletar </title>
</head>
<link href='css1.css' rel='stylesheet'>
<body>
	<?php 
	session_start();
	
	$conn = mysqli_connect("localhost","root","password");
	
	$idPessoa = $_GET["idPessoa"];
	
	$query_deletar = "DELETE FROM teste_db.tb_pessoa WHERE idPessoa = '$idPessoa';";
	
	$conn_query_deletar = mysqli_query($conn,$query_deletar);
	
	mysqli_query($conn,$conn_query_deletar);
	
	header("location:Dashboard.php");
	?>
	
	
	
	
</body>