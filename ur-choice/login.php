<?php
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	$user =  htmlentities(mysqli_real_escape_string($conn, $_POST['user']));
	$pass = htmlentities(mysqli_real_escape_string($conn, $_POST['pass']));
	
	$pass_crpt = sha1(md5($pass));
	
	$query = mysqli_query($conn,"Select * from usuarios where nick_usuario = '$user' and senha_usuario = '$pass_crpt'");
	$row = mysqli_fetch_array($query);
	
	if(mysqli_num_rows($query) == 1){
		echo 1;
		if(!isset($_SESSION)){
			session_start();
		}
		$_SESSION['usuarioID']=$row['id_usuario']; 		
		exit;	
	}
	else{
		echo 0;
	}
?>