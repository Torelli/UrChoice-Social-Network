<?php
	
	$id_usuario = $_POST['id_usuario'];
	
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	mysqli_query($conn,"DELETE FROM usuarios WHERE id_usuario = $id_usuario");
	mysqli_query($conn,"DELETE FROM votos WHERE id_usuario = $id_usuario");
	
	$result = mysqli_query($conn, "SELECT * FROM enquete WHERE usuario_id = $id_usuario");
	$row = mysqli_fetch_array($result);
	
	if($row['alternativa_a_foto'] != ""){
		unlink("imgs/".$row['alternativa_a_foto']);
	}
	if($row['alternativa_b_foto'] != ""){
		unlink("imgs/".$row['alternativa_b_foto']);
	}
	if($row['alternativa_c_foto'] != ""){
		unlink("imgs/".$row['alternativa_c_foto']);
	}
	if($row['alternativa_d_foto'] != ""){
		unlink("imgs/".$row['alternativa_d_foto']);
	}
	if($row['alternativa_e_foto'] != ""){
		unlink("imgs/".$row['alternativa_e_foto']);
	}
	
	mysqli_query($conn,"DELETE FROM enquete WHERE usuario_id = $id_usuario");
	
	
?>