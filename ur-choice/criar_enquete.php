<?php
	session_start();
	$id_usuario = $_SESSION['usuarioID'];
	
	date_default_timezone_set('America/Sao_Paulo');
	
	$data_enquete = date("Y-m-d");
	
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	$tamanho = mt_rand(10,61);
	$all_str="qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789";
	$nome_final1="";
	$nome_final2="";
	$nome_final3="";
	$nome_final4="";
	$nome_final5="";
	
	$titulo =  htmlentities(mysqli_real_escape_string($conn, $_POST['titulo']));
	$opcao1 =  htmlentities(mysqli_real_escape_string($conn, $_POST['opcao1']));
	if (!empty($_FILES['fotoOpt1']['name']))
	{
		$opcao1_foto_tmp = $_FILES['fotoOpt1']['tmp_name'];
		$opcao1_foto_real = $_FILES['fotoOpt1']['name'];
		$arquivo_opt1 = pathinfo($opcao1_foto_real);
		$extensao_opt1 = $arquivo_opt1['extension'];
		
		for($i=0;$i<=$tamanho;$i++){
			$nome_final1.= $all_str[mt_rand(0,61)];
		}
		
		$nome_final1 = $nome_final1 . "." . $extensao_opt1;
		copy($opcao1_foto_tmp, "imgs/$nome_final1");
	}
	$opcao2 =  htmlentities(mysqli_real_escape_string($conn, $_POST['opcao2']));
	if (!empty($_FILES['fotoOpt2']['name']))
	{
		$opcao2_foto_tmp = $_FILES['fotoOpt2']['tmp_name'];
		$opcao2_foto_real = $_FILES['fotoOpt2']['name'];
		$arquivo_opt2 = pathinfo($opcao2_foto_real);
		$extensao_opt2 = $arquivo_opt2['extension'];
		
		for($i=0;$i<=$tamanho;$i++){
			$nome_final2.= $all_str[mt_rand(0,61)];
		}
		
		$nome_final2 = $nome_final2 . "." . $extensao_opt2;
		copy($opcao2_foto_tmp, "imgs/$nome_final2");
	}
	$opcao3 =  htmlentities(mysqli_real_escape_string($conn, $_POST['opcao3']));
	if (!empty($_FILES['fotoOpt3']['name']))
	{
		$opcao3_foto_tmp = $_FILES['fotoOpt3']['tmp_name'];
		$opcao3_foto_real = $_FILES['fotoOpt3']['name'];
		$arquivo_opt3 = pathinfo($opcao3_foto_real);
		$extensao_opt3 = $arquivo_opt3['extension'];
		
		for($i=0;$i<=$tamanho;$i++){
			$nome_final3.= $all_str[mt_rand(0,61)];
		}
		
		$nome_final3 = $nome_final3 . "." . $extensao_opt3;
		copy($opcao3_foto_tmp, "imgs/$nome_final3");
	}
	$opcao4 =  htmlentities(mysqli_real_escape_string($conn, $_POST['opcao4']));
	if (!empty($_FILES['fotoOpt4']['name']))
	{
		$opcao4_foto_tmp = $_FILES['fotoOpt4']['tmp_name'];
		$opcao4_foto_real = $_FILES['fotoOpt4']['name'];
		$arquivo_opt4 = pathinfo($opcao4_foto_real);
		$extensao_opt4 = $arquivo_opt4['extension'];
		
		for($i=0;$i<=$tamanho;$i++){
			$nome_final4.= $all_str[mt_rand(0,61)];
		}
		
		$nome_final4 = $nome_final4 . "." . $extensao_opt4;
		copy($opcao4_foto_tmp, "imgs/$nome_final4");
	}
	$opcao5 =  htmlentities(mysqli_real_escape_string($conn, $_POST['opcao5']));
	if (!empty($_FILES['fotoOpt5']['name']))
	{
		$opcao5_foto_tmp = $_FILES['fotoOpt5']['tmp_name'];
		$opcao5_foto_real = $_FILES['fotoOpt5']['name'];
		$arquivo_opt5 = pathinfo($opcao5_foto_real);
		$extensao_opt5 = $arquivo_opt5['extension'];
		
		for($i=0;$i<=$tamanho;$i++){
			$nome_final5.= $all_str[mt_rand(0,61)];
		}
		
		$nome_final5 = $nome_final5 . "." . $extensao_opt5;
		copy($opcao5_foto_tmp, "imgs/$nome_final5");
	}
	$result = mysqli_query($conn,"SELECT * FROM usuarios WHERE id_usuario = $id_usuario");
	$row = mysqli_fetch_array($result);
	
	if($row['tipo_usuario'] == "admin"){
		mysqli_query($conn,"INSERT INTO enquete(usuario_id,data_enquete,titulo_enquete,alternativa_a,alternativa_a_foto,alternativa_b,alternativa_b_foto,alternativa_c,alternativa_c_foto,alternativa_d,alternativa_d_foto,alternativa_e,alternativa_e_foto,tipo_enquete) VALUES($id_usuario,'$data_enquete','$titulo','$opcao1','$nome_final1','$opcao2','$nome_final2','$opcao3','$nome_final3','$opcao4','$nome_final4','$opcao5','$nome_final5','admin')");
	}
	else{
		mysqli_query($conn,"INSERT INTO enquete(usuario_id,data_enquete,titulo_enquete,alternativa_a,alternativa_a_foto,alternativa_b,alternativa_b_foto,alternativa_c,alternativa_c_foto,alternativa_d,alternativa_d_foto,alternativa_e,alternativa_e_foto,tipo_enquete) VALUES($id_usuario,'$data_enquete','$titulo','$opcao1','$nome_final1','$opcao2','$nome_final2','$opcao3','$nome_final3','$opcao4','$nome_final4','$opcao5','$nome_final5','comum')");
	}
?>
