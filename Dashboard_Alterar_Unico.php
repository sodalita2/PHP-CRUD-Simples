<DOCTYPE HTML>
<html>
<head>
<title> Dashboard Alterar </title>
</head>
<link href='css1.css' rel='stylesheet'>
<main>
	<?php 
	session_start();
	
	
	$conn = mysqli_connect("localhost","root","password");
	
	if (isset($_POST['Alterar-unico-post'])){
	    $idPessoa_Alterar = $_GET['idPessoa'];
	    $nome_alterar = $_POST["nome"];
	    $idade_alterar = $_POST["idade"];

	    
	    if (strlen($_POST['nome']) > 0 && $_POST['idade'] == Null){
	        $query_atualizar = "UPDATE teste_db.tb_pessoa SET Nome = '$nome_alterar' WHERE idPessoa = '$idPessoa_Alterar';";
	        mysqli_query($conn,$query_atualizar);
	        header("location:Dashboard.php");
	    }elseif (strlen($_POST['nome']) == 0 && $_POST['idade'] > 0){
	        $query_atualizar = "UPDATE teste_db.tb_pessoa SET Idade = '$idade_alterar' WHERE idPessoa = '$idPessoa_Alterar';";
	        mysqli_query($conn,$query_atualizar);
	        header("location:Dashboard.php");
	    }elseif (strlen($_POST['nome']) > 0 && $_POST['idade'] > 0){
	        $query_atualizar = "UPDATE teste_db.tb_pessoa SET Nome = '$nome_alterar',Idade = '$idade_alterar' WHERE idPessoa = '$idPessoa_Alterar';";
	        mysqli_query($conn,$query_atualizar);
	        header("location:Dashboard.php");   
	    }else{
	        header("location:Dashboard.php");
	    }
	    
	}else{
	?>
	
	
	 <main>
    	<div class="auth-name">
                <?php echo "Logado como ".$_SESSION['email']; ?>
        </div>
        	<h3> Se deixar algum campo em branco, o que ja estiver no banco de dados permanecerá</h3>
    	<form action="Dashboard_Alterar_Unico.php<?php echo "?idPessoa=".$_GET['idPessoa']?>" method="post">
            <input type="text" name="nome" placeholder="novo nome"/>
            <input type="number" name="idade" placeholder="nova idade"/>
            <button type="submit" name="Alterar-unico-post">Atualizar</button>
            <br>
            <h4>Voce esta modificando:</h4>
            <?php 
                echo "idPessoa: ".$_GET["idPessoa"];
                echo "<br>";
                echo "<br>";
                echo "Nome: ".$_GET["nome"];
                echo "<br>";
                echo "<br>";
                echo "Idade: ".$_GET["idade"];
            ?>
            <br>
            <br>
        </form>    
    </main>      
 	<br>
 	<br>
 	<br>
	<button><a class="dash-botao" href="Dashboard.php">Voltar ao Dashboard</a></button>    
    
    <?php 
	}
    ?>

</main>      