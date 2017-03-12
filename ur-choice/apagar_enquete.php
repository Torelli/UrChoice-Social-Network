<?php
	session_start();
	$id_usuario = $_SESSION['usuarioID'];
	
	$id_enquete = $_POST['id_enquete'];
	
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	$result = mysqli_query($conn, "SELECT * FROM enquete WHERE id_enquete = $id_enquete");
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
	
	mysqli_query($conn,"DELETE FROM enquete WHERE id_enquete = $id_enquete");
	
?>