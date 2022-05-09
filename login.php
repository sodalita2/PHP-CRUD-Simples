<DOCTYPE HTML>
<html>
<head>
<title> Login </title>
</head>
<link href='css1.css' rel='stylesheet'>
<body>

	<?php 
	if (isset($_POST['login-post'])){
	    
	    $email = $_POST['email'];
	    $password = $_POST['password'];
	    
	    $conn = mysqli_connect("localhost","root","password");
	    
	    $query_pegar_senha = "SELECT idUsuario,Email,Senha FROM teste_db.tb_usuario WHERE email='$email';";
	    
	    $conn_query_pegar_senha = mysqli_query($conn,$query_pegar_senha);
	    
	    $result = mysqli_fetch_assoc($conn_query_pegar_senha);
	    
	    $isPasswordNull = False;
	    if (mysqli_num_rows($conn_query_pegar_senha) == 0){
	        $isPasswordNull = True;
	    }
	    
	    
	    if ($isPasswordNull == False && $result['Senha'] == $password && mysqli_num_rows($conn_query_pegar_senha) !== 0){
	       session_start();
	       $_SESSION['email'] = $result['Email'];
	       $_SESSION['idUsuario'] = $result['idUsuario'];
	       header("location:Dashboard.php");
	    }else{
	    
	?>
	
        <main>
        	<div class="auth-name">
        		<?php echo "Usuario nao identificado"; ?>
        	</div>
        	<form action="login.php" method="post">
        		<h3>Senha ou email incorretos!</h3>
                <input type="text" name="email" placeholder="email"/>
                <input type="password" name="password" placeholder="senha"/>
                <button type="submit" name="login-post">Login</button>
                <br>
                <br>
                <br>
                <button><a class="dash-botao" href="cadastroUsuario.php">Criar uma conta</a></button>
                <br>
                <br>
                <br>
            </form>
        
        </main>      
        
	<?php
	    }
	}else{
	    
	    session_start();
	    
	?>
	
        <main>
        	<div class="auth-name">
        		<?php echo "Usuario nao identificado"; ?>
        	</div>
        	<form action="login.php" class="login-form" method="post">
                <input type="text" name="email" placeholder="email"/>
                <input type="password" name="password" placeholder="senha"/>
                <button type="submit" name="login-post">LOGIN</button>
                <br>
                <br>
                <br>
                <button><a class="dash-botao" href="cadastroUsuario.php">Criar uma conta</a></button>
                <br>
                <br>
                <br>
            </form>
        
        </main>      
        
	<?php 
	}
	?>     
	
</body>