<DOCTYPE HTML>
<html>
<head>
<title> Cadastrar Usuario </title>
</head>
<link href='css1.css' rel='stylesheet'>
<main>
	<?php 
	   session_start();
	   if (isset($_POST['cadastrar-post'])){
	       
	       if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	           $email = False;
	       }else{
	           $email = True;
	       }
	       
	       if ($email == True){
	           
	           $email = $_POST['email'];
	           $password = $_POST['password'];
	           
	           $conn = mysqli_connect("localhost","root","password");
	           
	           $query_cadastrar_usuario = "INSERT INTO teste_db.tb_usuario(Email,Senha) VALUES ('$email','$password');";	   
	           
	           mysqli_query($conn,$query_cadastrar_usuario);
	           
	           $query_idUsuario = "SELECT idUsuario FROM teste_db.tb_usuario WHERE email='$email';";
	           
	           $conn_query_idUsuario = mysqli_query($conn,$query_idUsuario);
	           
	           $result_idUsuario = mysqli_fetch_assoc($conn_query_idUsuario);
	           
	           session_start();
	           
	           $_SESSION['email'] = $email;
	           $_SESSION['idUsuario'] = $result_idUsuario['idUsuario'];
	           
	           header("location:Dashboard.php");
	       }else{
	
	?>

    	<div class="auth-name">
            <?php echo "Usuario nao identificado"; ?>
        </div> 
    	<form action="cadastroUsuario.php" method="post">
    		<?php 
    		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    		?>
    		<h4>Email Invalido!</h4>
    		<?php    
    		}
    		?>

            <input type="text" name="email" placeholder="email"/>
            <input type="password" name="password" placeholder="senha"/>
            <button type="submit" name="cadastrar-post">Cadastrar Usuario</button>
            <br>
            <br>
            <br>
            <button><a class="dash-botao" href="login.php">Fazer login</a></button>
            <br>
            <br>
            <br>
        </form>

	<?php 
	       }}else{
	?>
	
		<div class="auth-name">
            <?php echo "Usuario nao identificado"; ?>
        </div> 
    	<form action="cadastroUsuario.php" method="post">
            <input type="text" name="email" placeholder="email"/>
            <input type="password" name="password" placeholder="senha"/>
            <button type="submit" name="cadastrar-post">Cadastrar Usuario</button>
            <br>
            <br>
            <br>
            <button><a class="dash-botao" href="login.php">Fazer login</a></button>
            <br>
            <br>
            <br>
        </form>
	<?php 
	}
	?>


</main>      