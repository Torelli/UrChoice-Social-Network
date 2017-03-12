<?php
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	$user =  htmlentities(mysqli_real_escape_string($conn, $_POST['user']));
	$pass = htmlentities(mysqli_real_escape_string($conn, $_POST['pass']));
	
	session_start(); 	//A seção deve ser iniciada em todas as páginas
	if (($_SESSION['usuarioID'])) {		//Verifica se há seções
        session_destroy();	
	}
?>