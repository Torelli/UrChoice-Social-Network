<script type="text/javascript" src="js/custom.js"></script>
<script>
	$(document).ready(function(){
		var mostrar_por_pagina = 5; 
		var numero_de_itens = $('#output').children('.panel-success').size();
		if(numero_de_itens > mostrar_por_pagina){
			var numero_de_paginas = Math.ceil(numero_de_itens / mostrar_por_pagina);
			var link_atual = 0;
			$('#output').children(".panel-success").css('display', 'none');
			$('#output').children(".panel-success").slice(0, mostrar_por_pagina).css('display', 'block');
		}
	});
</script>
<?php
	session_start(); 	//A seção deve ser iniciada em todas as páginas
	
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	$id_usuario = $_SESSION['usuarioID'];	
	
	$query = mysqli_query($conn,"Select * from usuarios where id_usuario = $id_usuario");
	$row = mysqli_fetch_array($query);
	
	$result_enquetes = mysqli_query($conn,"SELECT * FROM enquete ORDER BY id_enquete DESC");
	$row_enquetes = mysqli_fetch_array($result_enquetes);
	
	if($row['tipo_usuario'] == "admin"){
		do{
			$dia = substr($row_enquetes['data_enquete'],8,3);
			$mes = substr($row_enquetes['data_enquete'],5,2);
			$ano = substr($row_enquetes['data_enquete'],0,4);
			$id_criador = $row_enquetes['usuario_id'];
			$result_criador = mysqli_query($conn,"SELECT * FROM usuarios WHERE id_usuario = $id_criador");
			$row_criador = mysqli_fetch_array($result_criador);
							?>
			<div class="panel panel-success">
				<div class="panel-heading">
					<a id="id_enquete=<?php echo $row_enquetes['id_enquete']; ?>" class="Ver_enquete_btn" data-toggle="modal" data-target="#VerEnquete" href="#"><?php echo $row_enquetes['titulo_enquete']; ?></a>
						<button id="<?php echo $row_enquetes['id_enquete']; ?>" style="outline:none;box-shadow:none;" type="button" class="btn btn-default btn-lg apagar_enquete" data-toggle="tooltip" data-placement="right" title="Apagar">
							<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
						</button>
				</div>
				<div class="panel-body">
					Criada por <strong><a href="profile.php?user=<?php echo $row_criador['nick_usuario'];?>"><?php echo $row_criador['nome_usuario']; ?></a></strong>
					<div class="data_texto"><?php echo $dia . "/" . $mes . "/" . $ano; ?></div>
				</div>
			</div>
		<?php
		}while($row_enquetes=mysqli_fetch_array($result_enquetes));
							
	} 
	else{
		do{
			$dia = substr($row_enquetes['data_enquete'],8,3);
			$mes = substr($row_enquetes['data_enquete'],5,2);
			$ano = substr($row_enquetes['data_enquete'],0,4);
			$id_criador = $row_enquetes['usuario_id'];
			$result_criador = mysqli_query($conn,"SELECT * FROM usuarios WHERE id_usuario = $id_criador");
			$row_criador = mysqli_fetch_array($result_criador);
							?>
			<div class="panel panel-success">
				<div class="panel-heading">
					<a id="id_enquete=<?php echo $row_enquetes['id_enquete']; ?>" class="Ver_enquete_btn" data-toggle="modal" data-target="#VerEnquete" href="#"><?php echo $row_enquetes['titulo_enquete']; ?></a>
				</div>
				<div class="panel-body">
					Criada por <strong><a href="profile.php?user=<?php echo $row_criador['nick_usuario'];?>"><?php echo $row_criador['nome_usuario']; ?></a></strong>
					<div class="data_texto"><?php echo $dia . "/" . $mes . "/" . $ano; ?></div>
				</div>
			</div>
		<?php
		}while($row_enquetes=mysqli_fetch_array($result_enquetes));
	}	
?>