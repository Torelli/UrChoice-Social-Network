<?php	
	session_start();
	$id_usuario = $_SESSION['usuarioID'];
	
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	$novo_email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
	
	$query = mysqli_query($conn,"Select * from usuarios where id_usuario = $id_usuario");
	$row = mysqli_fetch_array($query);
	
	if($novo_email != $row['email_usuario']){
		echo $novo_email;
		mysqli_query($conn, "UPDATE usuarios SET email_usuario = '$novo_email' WHERE id_usuario = $id_usuario");
	}
	else{
		echo 1;
	}
?>