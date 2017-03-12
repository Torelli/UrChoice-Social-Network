<?php
	session_start(); 	//A seção deve ser iniciada em todas as páginas
	if (!isset($_SESSION['usuarioID'])) {		//Verifica se há seções
			session_destroy();						//Destroi a seção por segurança
			header("Location: index.php"); exit;	//Redireciona o visitante para login
	}
	
	$nome_profile = $_GET['user'];
	
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	$id_usuario = $_SESSION['usuarioID'];	
	
	$query_profile = mysqli_query($conn,"Select * from usuarios where nick_usuario = '$nome_profile'");
	$row_profile = mysqli_fetch_array($query_profile);
	$id_profile = $row_profile['id_usuario'];
	$query_user = mysqli_query($conn,"Select * from usuarios where id_usuario = $id_usuario");
	$row_user = mysqli_fetch_array($query_user);
	$result_enquetes = mysqli_query($conn,"SELECT * FROM enquete WHERE usuario_id = $id_profile ORDER BY id_enquete DESC");
	$numero_linhas = mysqli_num_rows($result_enquetes);
	$row_enquetes = mysqli_fetch_array($result_enquetes);
	$dia = substr($row_enquetes['data_enquete'],8,3);
	$mes = substr($row_enquetes['data_enquete'],5,2);
	$ano = substr($row_enquetes['data_enquete'],0,4);
?>
<html>	
	<!-- jQuery (plugins em JavaScript) -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script> 
	<script type="text/javascript" src="js/criar_enquete.js"></script>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Carregando o CSS do Bootstrap -->
			<link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
			<link rel="stylesheet"  type="text/css" href="css/custom.css" />
	</head>
	<body>
	
	<!-- navbar -->
	
		<div class="container">
			<div class="alert alert-danger erro" role="alert" id="logErr"></div>
			<nav class="navbar">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-principal" aria-expanded="false">
						<span class="sr-only">Alternar Navegação</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="area_user.php" class="navbar-brand"><img src="imgs/logo.png"></img></a>
				</div>
				<div class="collapse navbar-collapse" id="navbar-principal">
					<ul class="nav nav-tabs navbar-right">
						<a id="saudacao" class="navbar-brand perfil" href="my_profile.php"><img src="imgs/<?php echo $row_user['foto_usuario']; ?>"></a>
						<li role="presentation" class="dropdown">
							<a id="saudacao_txt" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  Olá, <?php echo $row_user['nome_usuario']; ?>
							  <span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
							  <li><a id="perfil" href="my_profile.php">Perfil</a></li>
							  <li><a id="config" href="account_config.php">Configurações de Conta</a></li>
							  <li><a id="sair" href="#">Sair</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav nav-tabs">
					  <li role="presentation"><a href="area_user.php">Home</a></li>
					</ul>
				</div>
			</nav>
		</div>
			<!-- conteúdo do site -->
<?php if($row_user['tipo_usuario'] == "admin"){ ?>
			<script>
				$(document).ready(function(){
					$("#TornarAdmin").click(function(){
						var data = "id_usuario=<?php echo $row_profile['id_usuario']; ?>"
						$.ajax({
							method:"post",
							url: "tornar_admin.php?",
							data:data,
							success:function(){
								location.reload();
							}
						});
					});
					$("#RemoverAdmin").click(function(){
						var data = "id_usuario=<?php echo $row_profile['id_usuario']; ?>"
						$.ajax({
							method:"post",
							url: "remover_admin.php?",
							data:data,
							success:function(){
								location.reload();
							}
						});
					});
					$("#DeletarUsuario").click(function(){
						var data = "id_usuario=<?php echo $row_profile['id_usuario']; ?>"
						$.ajax({
							method:"post",
							url: "deletar_usuario.php?",
							data:data,
							success:function(){
								window.location.href = "area_user.php";
							}
						});
					});
				});
			</script>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<form id="foto_formconfig" class="form-horizontal" method="POST" action="upload.php" enctype="multipart/form-data">
									<div class="form-group">
										<div class="media">
											<a class="navbar-brand profile_config" href="#">	
												<img src="imgs/<?php echo $row_profile['foto_usuario']; ?>"></img>
											</a>
											<?php if ($row_profile['tipo_usuario'] == "comum"){ ?>
											<div class="profile">
												<h2>
													<?php echo $row_profile['nome_usuario'] ?> 
													<button id="TornarAdmin" style="outline:none;box-shadow:none;" type="button" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="top" title="Tornar Admin">
														<span class="glyphicon glyphicon glyphicon-star" aria-hidden="true"></span>
													</button>
													<button id="DeletarUsuario" style="outline:none;box-shadow:none;" type="button" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="right" title="Deletar Usuário">
														<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
													</button>
												</h2>
											</div>
											<?php }
												else {
													if($row_profile['id_usuario'] != $id_usuario){?>
														<div class="profile">
															<h2>
																<?php echo $row_profile['nome_usuario']?> 
																<button id="RemoverAdmin" style="outline:none;box-shadow:none;" type="button" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="top" title="Remover Admin">
																	<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
																</button>
																<button id="DeletarUsuario" style="outline:none;box-shadow:none;" type="button" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="right" title="Deletar Usuário">
																	<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
																</button>
															</h2>
														</div>
										<?php 		}
													else{
														header("Location:my_profile.php");
													}
												}	 ?>
										</div>
										<div id="loading"><img id="loading_img" src="imgs/loading.gif"></img></div>
										<input id="foto_config" style="display:none;" name="foto_config" type="file" class="form-control">
									</div>
						</form>	
					</div>
				</div>
				<div class="row">
				<!-- Visualização Enquete -->
				<div class="modal fade bs-example-modal-lg" id="VerEnquete" tabindex="-1" role="dialog" aria-labelledby="VerEnquete">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" id="VerEnqueteOutput">
						
						</div>
					</div>
				</div>
					<div class="page-header">
						<h1>Enquetes</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div id="output" class="well">
							<?php 
								if($numero_linhas < 1){
									echo "Este usuário ainda não criou nenhuma enquete.";
								}
								else{
										do{
							?>
											<div class="panel panel-success">
												<div class="panel-heading">
													<a id="id_enquete=<?php echo $row_enquetes['id_enquete']; ?>" class="Ver_enquete_btn" data-toggle="modal" data-target="#VerEnquete" href="#"><?php echo $row_enquetes['titulo_enquete']; ?></a>
													<button id="<?php echo $row_enquetes['id_enquete']; ?>" style="outline:none;box-shadow:none;" type="button" class="btn btn-default btn-lg apagar_enquete" data-toggle="tooltip" data-placement="right" title="Apagar">
														<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
													</button>
												</div>
												<div class="panel-body">
													Criada por <strong><?php echo $row_profile['nome_usuario']; ?></strong>
													<div class="data_texto"><?php echo $dia . "/" . $mes . "/" . $ano; ?></div>
												</div>
											</div>
							<?php
										}while($row_enquetes=mysqli_fetch_array($result_enquetes));
									}
							?>
						</div>
					</div>
				</div>
			</div>
	<?php   }
		else{?>
		<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<form id="foto_formconfig" class="form-horizontal" method="POST" action="upload.php" enctype="multipart/form-data">
									<div class="form-group">
										<div class="media">
											<a class="navbar-brand profile_config" href="#">	
												<img src="imgs/<?php echo $row_profile['foto_usuario']; ?>"></img>
											</a>
											<?php if($row_profile['id_usuario'] != $id_usuario){?>
													<div class="profile">
														<h2>
															<?php echo $row_profile['nome_usuario']?> 
														</h2>
													</div>
										<?php 		}
													else{
														header("Location:my_profile.php");
													}?>
										</div>
										<div id="loading"><img id="loading_img" src="imgs/loading.gif"></img></div>
										<input id="foto_config" style="display:none;" name="foto_config" type="file" class="form-control">
									</div>
						</form>	
					</div>
				</div>
				<div class="row">
				<!-- Visualização Enquete -->
				<div class="modal fade bs-example-modal-lg" id="VerEnquete" tabindex="-1" role="dialog" aria-labelledby="VerEnquete">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" id="VerEnqueteOutput">
						
						</div>
					</div>
				</div>
					<div class="page-header">
						<h1>Enquetes</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div id="output" class="well">
							<?php 
								if($numero_linhas < 1){
									echo "Este usuário ainda não criou nenhuma enquete.";
								}
								else{
										do{
							?>
											<div class="panel panel-success">
												<div class="panel-heading">
													<a id="id_enquete=<?php echo $row_enquetes['id_enquete']; ?>" class="Ver_enquete_btn" data-toggle="modal" data-target="#VerEnquete" href="#"><?php echo $row_enquetes['titulo_enquete']; ?></a>													
												</div>
												<div class="panel-body">
													Criada por <strong><?php echo $row_profile['nome_usuario']; ?></strong>
													<div class="data_texto"><?php echo $dia . "/" . $mes . "/" . $ano; ?></div>
												</div>
											</div>
							<?php
										}while($row_enquetes=mysqli_fetch_array($result_enquetes));
									}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</body>
</html>	