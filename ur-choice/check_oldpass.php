<?php
	session_start();	
	$conn = mysqli_connect("localhost","root","", "urchoice");
		
	$senha_antiga = htmlentities(mysqli_real_escape_string($conn, $_POST['senha']));
	
	$senha_antiga_crpt = sha1(md5($senha_antiga));

	$id_usuario = $_SESSION['usuarioID'];

	$query = mysqli_query($conn,"Select * from usuarios where id_usuario = $id_usuario");
	$row = mysqli_fetch_array($query);
	
	if($senha_antiga_crpt != $row['senha_usuario']){
		echo 1;
	}
	else{
		echo 0;
	}
?>