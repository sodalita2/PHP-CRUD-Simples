<DOCTYPE HTML>
<html>
<head>
<title> Dashboard Deletar </title>
</head>
<link href='css1.css' rel='stylesheet'>
<body>
	<?php 
	session_start();
	
	if (isset($_POST['idPessoa-alterar'])){
	    
	}elseif (isset($_POST['Deletar-pessoa-post'])){
	   
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
	    
	    if ($nome == True || $idade == True){
	        
	        
	        $nome = $_POST['nome'];
	        $idade = $_POST['idade'];
	        
	        
	        $conn = mysqli_connect("localhost","root","password");
	        
	        if ($nome == True && $idade == False){
	            $query_pesquisar_pessoa = "SELECT idPessoa,Nome,Idade FROM teste_db.tb_pessoa WHERE Nome = '$nome';";
	        }elseif ($nome == False && $idade == True){
	            $query_pesquisar_pessoa = "SELECT idPessoa,Nome,Idade FROM teste_db.tb_pessoa WHERE Idade = '$idade';";
	        }else{
	            $query_pesquisar_pessoa = "SELECT idPessoa,Nome,Idade FROM teste_db.tb_pessoa WHERE Nome = '$nome' AND Idade = '$idade';";
	        }
	        
	        $conn_query_pesquisar_pessoa = mysqli_query($conn,$query_pesquisar_pessoa);
	        
	        $i = 0;
	        $busca_int = 0;
	        
	        if (mysqli_num_rows($conn_query_pesquisar_pessoa) == 0){  
	        }else{
	    ?>
	    	<div class="auth-name">
                <?php echo "Logado como ".$_SESSION['email']; ?>
        	</div>
	    <?php
	            while($Pessoa_array = mysqli_fetch_assoc($conn_query_pesquisar_pessoa)){
	                
	                $i += 1;
	    ?>    
	    
	        <div>
    	 		<h3>Pessoa <?php echo $i;?></h3>
    	 		<h3>idPessoa: <?php echo $Pessoa_array["idPessoa"];?></h3>
    	 		<h3>Nome: <?php echo $Pessoa_array["Nome"];?></h3>
    	 		<h3>Idade: <?php echo $Pessoa_array["Idade"];?> </h3>
    	 		<button><a class="dash-botao" href="Dashboard_Deletar_Unico.php<?php echo "?idPessoa=".$Pessoa_array["idPessoa"]?>">Deletar esta pessoa</a></button>
    	 	</div>
    	 	
	    <?php
	            }
	    }
	    ?> 
	    <br>
	    <br>  
	    <h2>A busca retornou <?php echo $i." pessoas";?></h2>
	    <br> 
	    <button><a class="dash-botao" href="Dashboard.php">Voltar ao Dashboard</a></button>    
	        
	<?php        
	    }else{
	?>          
	    <main>
    	<div class="auth-name">
        	<?php echo "Logado como ".$_SESSION['email']; ?>
        </div>
    	<form action="Dashboard_Deletar.php" method="post">
    		<h4> Deletar Pessoa </h4>	
    		<br>
    		<h3> Pesquisar por nome ou idade </h3>
    		<h4> Aceita um campo nulo </h4>
    		<h3>Nome ou Idade invalidos!</h3>
            <input type="text" name="nome" placeholder="nome"/>
            <input type="number" name="idade" placeholder="idade"/>
            <button type="submit" name="Deletar-pessoa-post">Pesquisar Pessoa</button>
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
    	<form action="Dashboard_Deletar.php" method="post">
    		<h4> Deletar Pessoa </h4>	
    		<br>
    		<h3> Pesquisar por nome ou idade </h3>
    		<h4> Aceita um campo nulo </h4>
            <input type="text" name="nome" placeholder="nome"/>
            <input type="number" name="idade" placeholder="idade"/>
            <button type="submit" name="Deletar-pessoa-post">Pesquisar Pessoa</button>
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