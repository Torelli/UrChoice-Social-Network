<?php	
	$id_usuario = $_POST['id_usuario'];
	
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	mysqli_query($conn, "UPDATE usuarios SET tipo_usuario = 'admin' WHERE id_usuario = $id_usuario");
	mysqli_query($conn, "UPDATE enquete SET tipo_enquete = 'admin' WHERE usuario_id = $id_usuario");

?>