<?php
	session_start();
	
	$id_usuario = $_SESSION['usuarioID'];

	$id_enquete = $_POST['id_enquete'];	
	
	$opcao = $_POST['opcao'];
	
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	if($opcao == "opcao1"){
		mysqli_query($conn, "INSERT INTO votos VALUES($id_enquete,$id_usuario,1,0,0,0,0)");
	}
	else if($opcao == "opcao2"){
		mysqli_query($conn, "INSERT INTO votos VALUES($id_enquete,$id_usuario,0,1,0,0,0)");
	}
	else if($opcao == "opcao3"){
		mysqli_query($conn, "INSERT INTO votos VALUES($id_enquete,$id_usuario,0,0,1,0,0)");
	}
	else if($opcao == "opcao4"){
		mysqli_query($conn, "INSERT INTO votos VALUES($id_enquete,$id_usuario,0,0,0,4,0)");
	}
	else{
		mysqli_query($conn, "INSERT INTO votos VALUES($id_enquete,$id_usuario,0,0,0,0,5)");
	}
	header("Location:ver_enquete.php?id_enquete=$id_enquete");
?>