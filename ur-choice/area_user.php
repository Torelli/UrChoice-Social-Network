<?php
session_start(); 	//A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {		//Verifica se há seções
        session_destroy();						//Destroi a seção por segurança
       	header("Location: index.php"); exit;	//Redireciona o visitante para login
}
$conn = mysqli_connect("localhost","root","", "urchoice");

$id_usuario = $_SESSION['usuarioID'];

$query = mysqli_query($conn,"Select * from usuarios where id_usuario = $id_usuario");
$row = mysqli_fetch_array($query);
$tipo_user = $row['tipo_usuario'];
?>
<html>	
		<!-- jQuery (plugins em JavaScript) -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script type="text/javascript" src="js/paginacao.js"></script>
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
					<a href="" class="navbar-brand"><img src="imgs/logo.png"></img></a>
				</div>
				<div class="collapse navbar-collapse" id="navbar-principal">
					<ul class="nav nav-tabs navbar-right">
						<a class="navbar-brand perfil" href="my_profile.php"><img src="imgs/<?php echo $row['foto_usuario']; ?>"></a>
						<li role="presentation" class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  Olá, <?php echo $row['nome_usuario']; ?>
							  <span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
							  <li><a id="perfil" href="my_profile.php">Perfil</a></li>
							  <li><a id="config" href="account_config.php">Configurações de Conta</a></li>
							  <li><a id="sair" href="#">Sair</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</div>
			<!-- conteúdo do site -->
			<?php if ($tipo_user == "admin"){?>
			<div class="container">
				<div class="row">
					<!-- Visualização Enquete -->
					<div class="modal fade bs-example-modal-lg" id="VerEnquete" tabindex="-1" role="dialog" aria-labelledby="VerEnquete">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content" id="VerEnqueteOutput">
							
							</div>
						</div>
					</div>
					<!-- Formulário de Criação de Enquete -->
					<div class="modal fade" id="CriarEnquete" tabindex="-1" role="dialog" aria-labelledby="CriarEnquete">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="NovaEnquete">Nova Enquete</h4>
						  </div>
						  <div class="modal-body">
							<form id="NovaEnquete_form" method="POST" action="criar_enquete.php" enctype="multipart/form-data">
							<div style="padding:15px;" class="row">
								<div class="form-group">
									<label for="titulo" class="control-label">Título</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="titulo" id="titulo"  placeholder="Digite o título de sua enquete" style="outline:none;box-shadow:none;"/>
									</div>
								</div>
							</div>
							
							<!-- Validação Título-->
							<div class="alert alert-success erro" role="alert" id="TituloSuccess"></div>
							<div class="alert alert-danger erro" role="alert" id="TituloErr"></div>
							
							<div style="padding:15px;" class="row">
								<div class="form-group">
									<label for="opcao1" class="control-label">Opção 1</label> <a href="#" id="addPhoto1"><label style="cursor:pointer;" for="fotoOpt1">Adicionar foto</label></a>
									<input id="fotoOpt1" style="display:none;" name="fotoOpt1" type="file" class="form-control">
									<div id="miniatura1" style="display:none;" id="foto_opcao1" class="media col-xs-3">
									  <div class="media-left">
										<a class="miniatura" href="#">
										  <img id="foto1" class="media-object" src="#"></img>
										</a>
									  </div>
									</div>
									<div class="input-group col-xs-6">
										<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="opcao1" id="opcao1"  placeholder="Digite a primeria opção" style="outline:none;box-shadow:none;"/>
									</div>
								</div>
							</div>
							
								<!-- Validação Opção 1-->
								<div class="alert alert-success erro" role="alert" id="Opt1Success"></div>
								<div class="alert alert-danger erro" role="alert" id="Opt1Err"></div>
								
							<div style="padding:15px;" class="row">
								<div class="form-group">
									<label for="opcao2" class="control-label">Opção 2</label> <a href="#" id="addPhoto2"><label style="cursor:pointer;" for="fotoOpt2">Adicionar foto</label></a>
									<input id="fotoOpt2" style="display:none;" name="fotoOpt2" type="file" class="form-control">
									<div id="miniatura2" style="display:none;" id="foto_opcao2" class="media col-xs-3">
									  <div class="media-left">
										<a class="miniatura" href="#">
										  <img id="foto2" class="media-object" src="#"></img>
										</a>
									  </div>
									</div>
									<div class="input-group col-xs-6">
										<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="opcao2" id="opcao2"  placeholder="Digite a segunda opção" style="outline:none;box-shadow:none;"/>
									</div>
								</div>
							</div>
								
								<!-- Validação Opção 2-->
								<div class="alert alert-success erro" role="alert" id="Opt2Success"></div>
								<div class="alert alert-danger erro" role="alert" id="Opt2Err"></div>
							<div id="Opt3" style="padding:15px;" class="row">	
								<div class="form-group">
									<label for="opcao2" class="control-label">Opção 3</label> <a href="#" id="addPhoto3"><label style="cursor:pointer;" for="fotoOpt3">Adicionar foto</label></a>
									<input id="fotoOpt3" style="display:none;" name="fotoOpt3" type="file" class="form-control">
									<div id="miniatura3" style="display:none;" id="foto_opcao3" class="media col-xs-3">
									  <div class="media-left">
										<a class="miniatura" href="#">
										  <img id="foto3" class="media-object" src="#"></img>
										</a>
									  </div>
									</div>
									<div class="input-group col-xs-6">
										<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="opcao3" id="opcao3"  placeholder="Digite a terceira opção" style="outline:none;box-shadow:none;"/>
									</div>
								</div>
							</div>
								
								<!-- Validação Opção 3-->
								<div class="alert alert-success erro" role="alert" id="Opt3Success"></div>
								<div class="alert alert-danger erro" role="alert" id="Opt3Err"></div>
							<div id="Opt4" style="padding:15px;" class="row">
								<div class="form-group">
									<label for="opcao2" class="control-label">Opção 4</label> <a href="#" id="addPhoto4"><label style="cursor:pointer;" for="fotoOpt4">Adicionar foto</label></a>
									<input id="fotoOpt4" style="display:none;" name="fotoOpt4" type="file" class="form-control">
									<div id="miniatura4" style="display:none;" id="foto_opcao4" class="media col-xs-3">
									  <div class="media-left">
										<a class="miniatura" href="#">
										  <img id="foto4" class="media-object" src="#"></img>
										</a>
									  </div>
									</div>
									<div class="input-group col-xs-6">
										<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="opcao4" id="opcao4"  placeholder="Digite a quarta opção" style="outline:none;box-shadow:none;"/>
									</div>
								</div>
							</div>
								
								<!-- Validação Opção 4-->
								<div class="alert alert-success erro" role="alert" id="Opt4Success"></div>
								<div class="alert alert-danger erro" role="alert" id="Opt4Err"></div>
								
							<div  id="Opt5" style="padding:15px;" class="row">	
								<div class="form-group">
									<label for="opcao2" class="control-label">Opção 5</label> <a href="#" id="addPhoto5"><label style="cursor:pointer;" for="fotoOpt5">Adicionar foto</label></a>
									<input id="fotoOpt5" style="display:none;" name="fotoOpt5" type="file" class="form-control">
									<div id="miniatura5" style="display:none;" id="foto_opcao5" class="media col-xs-3">
									  <div class="media-left">
										<a class="miniatura" href="#">
										  <img id="foto5" class="media-object" src="#"></img>
										</a>
									  </div>
									</div>
									<div class="input-group col-xs-6">
										<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="opcao5" id="opcao5"  placeholder="Digite a quinta opção" style="outline:none;box-shadow:none;"/>
									</div>
								</div>
							</div>
								
								<!-- Validação Opção 5-->
								<div class="alert alert-success erro" role="alert" id="Opt5Success"></div>
								<div class="alert alert-danger erro" role="alert" id="Opt5Err"></div>
								
								<a href="#" id="addOpt">Adicionar Opção</a>
							</form>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button id="Confirmar_enquete" type="button" class="btn btn-success">Criar Enquete</button>
						  </div>
						</div>
					  </div>
					</div>
					<div class="principal col-sm-4">
						<h1><a style="color:#990099;" id="Principal" href="#">Principal</a></h1>
						<hr class="principalHR">
					</div>
					<div class="principal col-sm-4">
						<a style="outline:none;box-shadow:none;" id="Enquete_btn" data-toggle="modal" data-target="#CriarEnquete" href="#">
							<button style="outline:none;box-shadow:none;" type="button" class="btn btn-default btn-lg BotaoCriarEnquete" data-toggle="tooltip" data-placement="top" title="Nova Enquete">
									<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
							</button>
						</a>
						<hr align:center; class="criarHR">
					</div>
					<div class="principal col-sm-4">
						<h1><a id="Usuarios" href="#">Usuários</a></h1>
						<hr style="width:0%;" class="usuariosHR">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div id="output" class="well">
							<script>
								$(document).ready(function(){
									$("#output").load("enquete_principal.php");
								});
							</script>
						</div>
						<div id="pagi"></div>
					</div>
				</div>
			</div>
			<?php }
				else{?>
				<div class="container">
				<div class="row">
					<!-- Visualização Enquete -->
					<div class="modal fade bs-example-modal-lg" id="VerEnquete" tabindex="-1" role="dialog" aria-labelledby="VerEnquete">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content" id="VerEnqueteOutput">
							
							</div>
						</div>
					</div>
					<!-- Formulário de Criação de Enquete -->
					<div class="modal fade" id="CriarEnquete" tabindex="-1" role="dialog" aria-labelledby="CriarEnquete">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="NovaEnquete">Nova Enquete</h4>
						  </div>
						  <div class="modal-body">
							<form id="NovaEnquete_form" method="POST" action="criar_enquete.php" enctype="multipart/form-data">
							<div style="padding:15px;" class="row">
								<div class="form-group">
									<label for="titulo" class="control-label">Título</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="titulo" id="titulo"  placeholder="Digite o título de sua enquete" style="outline:none;box-shadow:none;"/>
									</div>
								</div>
							</div>
							
							<!-- Validação Título-->
							<div class="alert alert-success erro" role="alert" id="TituloSuccess"></div>
							<div class="alert alert-danger erro" role="alert" id="TituloErr"></div>
							
							<div style="padding:15px;" class="row">
								<div class="form-group">
									<label for="opcao1" class="control-label">Opção 1</label> <a href="#" id="addPhoto1"><label style="cursor:pointer;" for="fotoOpt1">Adicionar foto</label></a>
									<input id="fotoOpt1" style="display:none;" name="fotoOpt1" type="file" class="form-control">
									<div id="miniatura1" style="display:none;" id="foto_opcao1" class="media col-xs-3">
									  <div class="media-left">
										<a class="miniatura" href="#">
										  <img id="foto1" class="media-object" src="#"></img>
										</a>
									  </div>
									</div>
									<div class="input-group col-xs-6">
										<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="opcao1" id="opcao1"  placeholder="Digite a primeria opção" style="outline:none;box-shadow:none;"/>
									</div>
								</div>
							</div>
							
								<!-- Validação Opção 1-->
								<div class="alert alert-success erro" role="alert" id="Opt1Success"></div>
								<div class="alert alert-danger erro" role="alert" id="Opt1Err"></div>
								
							<div style="padding:15px;" class="row">
								<div class="form-group">
									<label for="opcao2" class="control-label">Opção 2</label> <a href="#" id="addPhoto2"><label style="cursor:pointer;" for="fotoOpt2">Adicionar foto</label></a>
									<input id="fotoOpt2" style="display:none;" name="fotoOpt2" type="file" class="form-control">
									<div id="miniatura2" style="display:none;" id="foto_opcao2" class="media col-xs-3">
									  <div class="media-left">
										<a class="miniatura" href="#">
										  <img id="foto2" class="media-object" src="#"></img>
										</a>
									  </div>
									</div>
									<div class="input-group col-xs-6">
										<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="opcao2" id="opcao2"  placeholder="Digite a segunda opção" style="outline:none;box-shadow:none;"/>
									</div>
								</div>
							</div>
								
								<!-- Validação Opção 2-->
								<div class="alert alert-success erro" role="alert" id="Opt2Success"></div>
								<div class="alert alert-danger erro" role="alert" id="Opt2Err"></div>
							<div id="Opt3" style="padding:15px;" class="row">	
								<div class="form-group">
									<label for="opcao2" class="control-label">Opção 3</label> <a href="#" id="addPhoto3"><label style="cursor:pointer;" for="fotoOpt3">Adicionar foto</label></a>
									<input id="fotoOpt3" style="display:none;" name="fotoOpt3" type="file" class="form-control">
									<div id="miniatura3" style="display:none;" id="foto_opcao3" class="media col-xs-3">
									  <div class="media-left">
										<a class="miniatura" href="#">
										  <img id="foto3" class="media-object" src="#"></img>
										</a>
									  </div>
									</div>
									<div class="input-group col-xs-6">
										<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="opcao3" id="opcao3"  placeholder="Digite a terceira opção" style="outline:none;box-shadow:none;"/>
									</div>
								</div>
							</div>
								
								<!-- Validação Opção 3-->
								<div class="alert alert-success erro" role="alert" id="Opt3Success"></div>
								<div class="alert alert-danger erro" role="alert" id="Opt3Err"></div>
							<div id="Opt4" style="padding:15px;" class="row">
								<div class="form-group">
									<label for="opcao2" class="control-label">Opção 4</label> <a href="#" id="addPhoto4"><label style="cursor:pointer;" for="fotoOpt4">Adicionar foto</label></a>
									<input id="fotoOpt4" style="display:none;" name="fotoOpt4" type="file" class="form-control">
									<div id="miniatura4" style="display:none;" id="foto_opcao4" class="media col-xs-3">
									  <div class="media-left">
										<a class="miniatura" href="#">
										  <img id="foto4" class="media-object" src="#"></img>
										</a>
									  </div>
									</div>
									<div class="input-group col-xs-6">
										<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="opcao4" id="opcao4"  placeholder="Digite a quarta opção" style="outline:none;box-shadow:none;"/>
									</div>
								</div>
							</div>
								
								<!-- Validação Opção 4-->
								<div class="alert alert-success erro" role="alert" id="Opt4Success"></div>
								<div class="alert alert-danger erro" role="alert" id="Opt4Err"></div>
								
							<div  id="Opt5" style="padding:15px;" class="row">	
								<div class="form-group">
									<label for="opcao2" class="control-label">Opção 5</label> <a href="#" id="addPhoto5"><label style="cursor:pointer;" for="fotoOpt5">Adicionar foto</label></a>
									<input id="fotoOpt5" style="display:none;" name="fotoOpt5" type="file" class="form-control">
									<div id="miniatura5" style="display:none;" id="foto_opcao5" class="media col-xs-3">
									  <div class="media-left">
										<a class="miniatura" href="#">
										  <img id="foto5" class="media-object" src="#"></img>
										</a>
									  </div>
									</div>
									<div class="input-group col-xs-6">
										<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="opcao5" id="opcao5"  placeholder="Digite a quinta opção" style="outline:none;box-shadow:none;"/>
									</div>
								</div>
							</div>
								
								<!-- Validação Opção 5-->
								<div class="alert alert-success erro" role="alert" id="Opt5Success"></div>
								<div class="alert alert-danger erro" role="alert" id="Opt5Err"></div>
								
								<a href="#" id="addOpt">Adicionar Opção</a>
							</form>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button id="Confirmar_enquete" type="button" class="btn btn-success">Criar Enquete</button>
						  </div>
						</div>
					  </div>
					</div>
					<div class="principal col-sm-4">
						<h1><a id="Principal" href="#">Principal</a></h1>
						<hr style="width:0%;" class="principalHR">
					</div>
					<div class="principal col-sm-4">
						<a style="outline:none;box-shadow:none;" id="Enquete_btn" data-toggle="modal" data-target="#CriarEnquete" href="#">
							<button style="outline:none;box-shadow:none;" type="button" class="btn btn-default btn-lg BotaoCriarEnquete" data-toggle="tooltip" data-placement="top" title="Nova Enquete">
									<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
							</button>
						</a>
						<hr align:center; class="criarHR">
					</div>
					<div class="principal col-sm-4">
						<h1><a style="color:#990099;" id="Usuarios" href="#">Usuários</a></h1>
						<hr class="usuariosHR">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div id="output" class="well">
							<script>
								$(document).ready(function(){
									$("#output").load("enquete_usuarios.php");
								});
							</script>
						</div>
						<div id="pagi"></div>
					</div>
				</div>
			</div>
				<?php } ?>
	</body>
</html>