<?php	
	session_start();
	$id_usuario = $_SESSION['usuarioID'];
	
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	$novo_user = htmlentities(mysqli_real_escape_string($conn, $_POST['user']));
	
	$query = mysqli_query($conn,"Select * from usuarios where id_usuario = $id_usuario");
	$row = mysqli_fetch_array($query);
	
	if($novo_user != $row['nick_usuario']){
		echo $novo_user;
		mysqli_query($conn, "UPDATE usuarios SET nick_usuario = '$novo_user' WHERE id_usuario = $id_usuario");
	}
	else{
		echo 1;
	}
?>