<?php
	session_start();
	$id_usuario = $_SESSION['usuarioID'];
	
	$nome_tmp = $_FILES['foto_config']['tmp_name'];
	$nome_real = $_FILES['foto_config']['name'];
	$arquivo = pathinfo($nome_real);
	$extensao = $arquivo['extension'];
	$tamanho = mt_rand(10,61);
	$all_str="qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789";
	$nome_final="";
	for($i=0;$i<=$tamanho;$i++){
		$nome_final.= $all_str[mt_rand(0,61)];
	}
	$nome_final = $nome_final . "." . $extensao;
	
	copy($nome_tmp, "imgs/$nome_final");
		
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	$query = mysqli_query($conn,"Select * from usuarios where id_usuario = $id_usuario");
	
	$row = mysqli_fetch_array($query);
	
	if($row['foto_usuario'] != "default_avatar.jpg"){
		unlink("imgs/".$row['foto_usuario']);
	}
		
	$result = mysqli_query($conn,"UPDATE usuarios SET foto_usuario = '$nome_final' WHERE id_usuario = $id_usuario");
	echo '<img src="imgs/'. $nome_final . '"></img>';
?>