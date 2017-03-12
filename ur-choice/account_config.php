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
?>
<html>	
	<!-- jQuery (plugins em JavaScript) -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>  
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
						<a id="saudacao" class="navbar-brand perfil" href="my_profile.php"><img src="imgs/<?php echo $row['foto_usuario']; ?>"></a>
						<li role="presentation" class="dropdown">
							<a id="saudacao_txt" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
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
					<ul class="nav nav-tabs">
					  <li role="presentation"><a href="area_user.php">Home</a></li>
					</ul>
				</div>
			</nav>
		</div>
			<!-- conteúdo do site -->
			
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
							<h1>Configurações de Conta</h1>
							<hr class="account">
							<div class="col-xs-12">
								<form id="foto_formconfig" class="form-horizontal" method="POST" action="upload.php" enctype="multipart/form-data">
											<div class="form-group">
												<label class="control-label">Foto</label>
												<div class="media">
													<a id="alterFoto" class="navbar-brand perfil_config" href="#">	
														<span class="alterar_foto"><label class="alterar_foto" for="foto_config">Alterar</label></span>
														<img src="imgs/<?php echo $row['foto_usuario']; ?>"></img>
													</a>
												</div>
												<div id="loading"><img id="loading_img" src="imgs/loading.gif"></img></div>
												<input id="foto_config" style="display:none;" name="foto_config" type="file" class="form-control">
											</div>
								</form>	
								<!-- Validação da foto -->
								<div class="alert alert-success erro" role="alert" id="fotoSuccess"></div>
								<div class="alert alert-danger erro" role="alert" id="fotoErr"></div>
							</div>	
							<h6 class="advertencia">*De preferência use imagens quadradas.</h6>							
											<hr class="account">
											
											<div class="form-group">
												<label for="nome_config" class="control-label">Nome</label>
													<h3 id="nome_ref"><?php echo $row['nome_usuario']; ?>
													<a id="alterar_nome" href="#">Alterar</a></h3>
												<div id="nome_configform" class="input-group">					
												  <label class="sr-only">Nome</label>
													<span class="input-group-addon"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span>
													<input id="nome_config" name="nome_config" type="text" class="form-control" placeholder="Digite seu novo nome" style="outline:none;box-shadow:none;">
													<span class="input-group-btn">
														<button id="name_change" class="btn btn-default" type="button">Alterar</button>
													</span>
												 </div>
											</div>
											<!-- Validação do nome -->
											<div class="alert alert-success erro" role="alert" id="nomeSuccess"></div>
											<div class="alert alert-danger erro" role="alert" id="nomeErr"></div>
	
										<hr class="account">
										
										<div class="form-group">
											<label for="email_config" class="control-label">Email</label>
												<h3 id="email_ref"><?php echo $row['email_usuario']; ?>
												<a id="alterar_email" href="#">Alterar</a></h3>
											<div id="email_configform"  class="input-group">					
											  <label class="sr-only">Email</label>
												<span class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
												<input id="email_config" name="email_config" type="text" class="form-control" placeholder="Digite seu novo email" style="outline:none;box-shadow:none;">
												<span class="input-group-btn">
													<button id="email_change" class="btn btn-default" type="button">Alterar</button>
												</span>
											 </div>
										</div>
										
										<!-- Validação do email -->
										<div class="alert alert-success erro" role="alert" id="emailSuccess"></div>
										<div class="alert alert-danger erro" role="alert" id="emailErr"></div>
										
										<hr class="account">

										<div class="form-group">
											<label for="username_config" class="control-label">Nome de Usuário</label>
												<h3 id="user_ref"><?php echo $row['nick_usuario']; ?>
												<a id="alterar_username" href="#">Alterar</a></h3>
											<div id="user_configform" class="input-group">					
											  <label class="sr-only">Nome de Usuário</label>
												<span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
												<input id="username_config" name="username_config" type="text" class="form-control" placeholder="Digite seu novo nome de usuário" style="outline:none;box-shadow:none;">
												<span class="input-group-btn">
													<button id="username_change" class="btn btn-default" type="button">Alterar</button>
												</span>
											 </div>
										</div>
										
										<!-- Validação do nome de usuário -->
										<div class="alert alert-success erro" role="alert" id="userSuccess"></div>
										<div class="alert alert-danger erro" role="alert" id="userErr"></div>
										
										<hr class="account">
										
										<h4><a id="alterar_senha" href="#">Alterar senha</a></h4>
										<div class="pass_configform form-group">
											<div class="input-group">					
											  <label class="sr-only">Senha</label>
												<span class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
												<input id="oldpass" name="oldpass" type="password" class="form-control" placeholder="Digite sua antiga senha" style="outline:none;box-shadow:none;">
												<span class="input-group-btn">
													<button id="oldpass_check" class="btn btn-default" type="button">Confirmar</button>
												</span>
											 </div>
										</div>
										<div class="pass_configform form-group">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
												<input type="password" class="form-control" name="pass_config" id="pass_config"  placeholder="Digite sua nova senha" style="outline:none;box-shadow:none;"/>
											</div>
											<!-- Validação da senha -->
											<div class="alert alert-danger erro" role="alert" id="passErr"></div>
										</div>
										<div class="pass_configform form-group">
											<div class="input-group">					
											  <label class="sr-only">Senha</label>
												<span class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
												<input id="confpass_config" name="confpass_config" type="password" class="form-control" placeholder="Confirme sua nova senha" style="outline:none;box-shadow:none;">
												<span class="input-group-btn">
													<button id="pass_change" class="btn btn-default" type="button">Alterar</button>
												</span>
											 </div>
										</div>
										
										<!-- Validação da confirmação de senha -->
										<div class="alert alert-success erro" role="alert" id="senhaSuccess"></div>
										<div class="alert alert-danger erro" role="alert" id="confErr"></div>
							
					</div>
				</div>
			</div>
	</body>
</html>