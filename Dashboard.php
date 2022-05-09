<DOCTYPE HTML>
<html>
<head>
<title> Dashboardl</title>
</head>
<link href='css1.css' rel='stylesheet'>
<main>
	<?php 
	session_start();
	
	?>
	
	<div class="auth-name">
            <?php echo "Logado como ".$_SESSION['email']; ?>
    </div>
    <br>
    <br>
    <br>
    <button type="submit"><a class="dash-botao" href="Dashboard_Cadastrar.php">Cadastrar Pessoa</a></button>
    <br>
    <br>
    <br>
    <button type="submit"><a class="dash-botao" href="Dashboard_Pesquisar.php">Pesquisar Pessoa</a></button>
    <br>
    <br>
    <br>
    <button type="submit"><a class="dash-botao" href="Dashboard_Alterar.php">Alterar Pessoa</a></button>
    <br>
    <br>
    <br>
    <button type="submit"><a class="dash-botao" href="Dashboard_Deletar.php">Remover Pessoa</a></button>
    <br>
    <br>
    <br>
    <button type="submit"><a class="dash-botao" href="Dashboard_Logout.php">Logout</a></button>
    

</main>      