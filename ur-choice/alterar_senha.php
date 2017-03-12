<?php	
	session_start();
	$id_usuario = $_SESSION['usuarioID'];
	
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	$nova_senha = htmlentities(mysqli_real_escape_string($conn, $_POST['senha']));
	$senha_crpt = sha1(md5($nova_senha));
	
	$query = mysqli_query($conn,"Select * from usuarios where id_usuario = $id_usuario");
	$row = mysqli_fetch_array($query);
	
	if($senha_crpt != $row['senha_usuario']){
		echo 1;
		mysqli_query($conn, "UPDATE usuarios SET senha_usuario = '$senha_crpt' WHERE id_usuario = $id_usuario");
	}
	else{
		echo 0;
	}
?>