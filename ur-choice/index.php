<?php
session_start(); 	//A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION['usuarioID'])) {		//Verifica se há seções
        session_destroy();						//Destroi a seção por segurança
}
else{
	header("Location: area_user.php"); exit;
}
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
					Entrar
			</button>
			<a href="" class="navbar-brand"><img src="imgs/logo.png"></img></a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-principal">
			<ul class="nav nav-tabs navbar-right">
			
				<!-- Formulário de Login -->
				
				<form id="Login" class="navbar-form navbar-left" method="POST" action="login.php">
				<div class="input-group">
				  <label class="sr-only">Usuário</label>
					<span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
					<input id="user" name="user" type="text" class="form-control" placeholder="Usuário" style="outline:none;box-shadow:none;">
				</div>
				<div class="input-group">					
				  <label class="sr-only">Senha</label>
					<span class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
					<input id="pass" name="pass" type="password" class="form-control" placeholder="Senha" style="outline:none;box-shadow:none;">
					<span class="input-group-btn">
						<button id="entrar" class="btn btn-default" type="button">Entrar</button>
					</span>
				  </div>
				</form>		
			</ul>
		</div>
	</nav>
	</div>
		<!-- conteúdo do site -->
		
		<div class="container">
			<div class="row">
				<div class="col-md-6">	
					<div class="jumbotron" style="background-color:transparent;text-align:center;">
						<img src="imgs/logo.png" class="img-responsive"></img>
						<h1>Junte-se a nós!</h1>
					</div>
				</div>
				<div class="col-md-6">
				
					<!-- Verificação do BD -->
					<p>
						<div id="register_output"></div>
					</p>
				
					<!-- Formulário de Registro -->
					
					<form id="Registrar" class="form-horizontal" method="POST" action="register.php">
						<div class="form-group">
							<label for="nome" class="cols-sm-2 control-label">Nome</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="nome" id="nome"  placeholder="Digite seu nome" style="outline:none;box-shadow:none;"/>
							</div>
						</div>
						
						<!-- Validação do nome -->
						<div class="alert alert-danger erro" role="alert" id="nomeErr"></div>

						<div class="form-group">
							<label for="email" class="control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Digite seu Email" style="outline:none;box-shadow:none;"/>
								</div>
							</div>
						</div>
						
						<!-- Validação do email -->
						<div class="alert alert-danger erro" role="alert" id="emailErr"></div>

						<div class="form-group">
							<label for="username" class="control-label">Nome de Usuário</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Digite seu nome de usuário" style="outline:none;box-shadow:none;"/>
								</div>
						</div>
						
						<!-- Validação do nome de usuário -->
						<div class="alert alert-danger erro" role="alert" id="userErr"></div>

						<div class="form-group">
							<label for="password" class="control-label">Senha</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Digite sua senha" style="outline:none;box-shadow:none;"/>
								</div>
						</div>
						
						<!-- Validação da senha -->
						<div class="alert alert-danger erro" role="alert" id="passErr"></div>

						<div class="form-group">
							<label for="confirm" class="control-label">Confirmação de senha</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confpass" id="confpass"  placeholder="Confirme sua senha" style="outline:none;box-shadow:none;"/>
								</div>
						</div>
						
						<!-- Validação da confirmação de senha -->
						<div class="alert alert-danger erro" role="alert" id="confErr" style="display:none;"></div>

						<div class="form-group ">
							<button id="register" type="button" class="btn btn-success btn-lg btn-block login-button" style="outline:none;box-shadow:none;">Criar conta</button>
						</div>
					</form>
					</div>
				</div>
			</div>
	</body>
</html>
