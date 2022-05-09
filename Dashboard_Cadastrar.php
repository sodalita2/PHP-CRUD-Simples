<DOCTYPE HTML>
<html>
<head>
<title> Dashboard Cadastrar </title>
</head>
<link href='css1.css' rel='stylesheet'>
<body>
	<?php 
	session_start();
	
	if(isset($_POST['cadastrar-pessoa-post'])){
	    
	    if (!preg_match("/^[a-zA-Z -]+$/",$_POST['nome'])){
	        $nome = False;
	    }else{
	        $nome = True;
	    }
	    
	    if (!filter_var($_POST['idade'], FILTER_VALIDATE_INT)){
	        $idade = False;
	    }else{
	        $idade = True;
	    }
	    
	    if ($nome == True && $idade == True){
	        
	        $nome = $_POST['nome'];
	        $idade = $_POST['idade'];
	        $idUsuario = $_SESSION['idUsuario'];
	        
	        $conn = mysqli_connect("localhost","root","password");
	        
	        $query_inserir_pessoa = "INSERT INTO teste_db.tb_pessoa(idUsuario,Nome,Idade) VALUES ('$idUsuario','$nome','$idade');";

            mysqli_query($conn,$query_inserir_pessoa);
            
	        session_start();
	        
	        
	        header("location:Dashboard.php");
	        
	    }else{
	 ?>
			<main>
    	<div class="auth-name">
                <?php echo "Logado como ".$_SESSION['email']; ?>
        </div>
    	<form action="Dashboard_Cadastrar.php" method="post">
    		<h4> Cadastrar Pessoa </h4>	
    		<br>
    		<h3>Nome ou Idade invalidos!</h3>
            <input type="text" name="nome" placeholder="nome"/>
            <input type="number" name="idade" placeholder="idade"/>
            <button type="submit" name="cadastrar-pessoa-post">Cadastrar Pessoa</button>
            <br>
            <br>
            <br>
        </form>	
        <button><a class="dash-botao" href="Dashboard.php">Voltar ao Dashboard</a></button>
    	</main>
	
	
	<?php
	   }
	}else{
	  
	?>
	
    	<main>
    	<div class="auth-name">
                <?php echo "Logado como ".$_SESSION['email']; ?>
        </div>
    	<form action="Dashboard_Cadastrar.php" method="post">
    		<h4> Cadastrar Pessoa </h4>	
    		<br>
            <input type="text" name="nome" placeholder="nome"/>
            <input type="number" name="idade" placeholder="idade"/>
            <button type="submit" name="cadastrar-pessoa-post">Cadastrar Pessoa</button>
            <br>
            <br>
            <br>
        </form>	
        <button><a class="dash-botao" href="Dashboard.php">Voltar ao Dashboard</a></button>
    	</main>
	<?php 
	}
	?>
	
</body>