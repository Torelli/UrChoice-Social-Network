<?php
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	$nome =  htmlentities(mysqli_real_escape_string($conn, $_POST['nome']));
	$email =  htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
	$user =  htmlentities(mysqli_real_escape_string($conn, $_POST['user']));
	$pass = htmlentities(mysqli_real_escape_string($conn, $_POST['pass']));
	$confpass = htmlentities(mysqli_real_escape_string($conn, $_POST['confpass']));
	$tipo = 'comum';
	$avatar = 'default_avatar.jpg';
	
	$verifica_usuario = mysqli_query($conn,"Select id_usuario from usuarios where nick_usuario = '$user'");
	$num_vf = mysqli_num_rows($verifica_usuario);
	$verifica_email = mysqli_query($conn,"Select id_usuario from usuarios where email_usuario = '$email'");
	$num_em = mysqli_num_rows($verifica_email);
	
		//verifica se email já exite
		if($num_em > 0){
			echo 1;
		}
		//verifica se nome de usuário já existe
		else if($num_vf > 0){
			echo 2;
		}
		//caso não existam o usuário é cadastrado no BD
		else{
			$senha_crpt = sha1(md5($pass));
			mysqli_query($conn, "insert into usuarios(nome_usuario, email_usuario, nick_usuario, senha_usuario, tipo_usuario, foto_usuario) values('$nome', '$email', '$user', '$senha_crpt', '$tipo', '$avatar')");
			$query = mysqli_query($conn,"Select * from usuarios where nick_usuario = '$user' and senha_usuario = '$senha_crpt'");
			$row = mysqli_fetch_array($query);
			if(!isset($_SESSION)){
				session_start();
			}
			$_SESSION['usuarioID']=$row['id_usuario']; 		
			exit;	
		}
		
?>