<?php	
	session_start();
	$id_usuario = $_SESSION['usuarioID'];
	
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	$novo_nome = htmlentities(mysqli_real_escape_string($conn, $_POST['nome']));
	
	$query = mysqli_query($conn,"Select * from usuarios where id_usuario = $id_usuario");
	$row = mysqli_fetch_array($query);
	
	if($novo_nome != $row['nome_usuario']){
		echo $novo_nome;
		mysqli_query($conn, "UPDATE usuarios SET nome_usuario = '$novo_nome' WHERE id_usuario = $id_usuario");
	}
	else{
		echo 1;
	}
?>