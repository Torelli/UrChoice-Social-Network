<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/votacao.js"></script>
<?php
	session_start();
	$id_enquete = $_GET['id_enquete'];	
	
	$conn = mysqli_connect("localhost","root","", "urchoice");
	
	$query = mysqli_query($conn,"Select * from enquete where id_enquete = $id_enquete");
	
	$row = mysqli_fetch_array($query);
	$dia = substr($row['data_enquete'],8,3);
	$mes = substr($row['data_enquete'],5,2);
	$ano = substr($row['data_enquete'],0,4);
	
	$id_criador = $row['usuario_id'];

	$query_user = mysqli_query($conn,"Select nome_usuario from usuarios where id_usuario = $id_criador");
	$row_user = mysqli_fetch_array($query_user);
	
	$id_usuario = $_SESSION['usuarioID'];
	
	$query_voto = mysqli_query($conn,"SELECT * FROM votos WHERE id_enquete = $id_enquete and id_usuario = $id_usuario");
	$teste_voto = mysqli_num_rows($query_voto);
	
	if($teste_voto < 1){
?>
				 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><?php echo $row['titulo_enquete']; ?></h4>
				</div>
				<div class="modal-body">
					<div class="row">
					<?php if($row['alternativa_c'] == "" && $row['alternativa_c_foto'] == "" && $row['alternativa_d'] == "" && $row['alternativa_d_foto'] == "" && $row['alternativa_e'] == "" && $row['alternativa_c_foto'] == ""){ ?>
								  <div class="col-sm-6 col-md-4">
									<div id="opcao1" class="thumbnail opcao">
									<?php if($row['alternativa_a_foto'] != ""){ ?>
									  <img src="imgs/<?php echo $row['alternativa_a_foto']; ?>">
									<?php } ?>
									  <div class="caption">
										<h3>Opção 1</h3>
										<p><?php echo $row['alternativa_a'];?></p>
										<p><a id="votarA" style="margin-left:auto;margin-right:auto;" href="#" class="btn btn-success" role="button">Votar</a>
									  </div>
									</div>
								  </div>
								  <div class="col-sm-6 col-md-4"></div>
								  <div class="col-sm-6 col-md-4">
									<div id="opcao2" class="thumbnail opcao">
									<?php if($row['alternativa_b_foto'] != ""){ ?>
									  <img src="imgs/<?php echo $row['alternativa_b_foto']; ?>">
									<?php } ?>
									  <div class="caption">
										<h3>Opção 2</h3>
										<p><?php echo $row['alternativa_b'];?></p>
										<p><a id="votarB" style="margin-left:auto;margin-right:auto;" href="#" class="btn btn-success" role="button">Votar</a>
									  </div>
									</div>
								  </div>
					</div>
					<div class="row">
					<?php	}
					else if($row['alternativa_d'] == "" && $row['alternativa_d_foto'] == "" && $row['alternativa_e'] == "" && $row['alternativa_e_foto'] == ""){?>
							<div class="col-sm-6 col-md-4">
								<div id="opcao1" class="thumbnail opcao">
									<?php if($row['alternativa_a_foto'] != ""){ ?>
										 <img src="imgs/<?php echo $row['alternativa_a_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 1</h3>
											<p><?php echo $row['alternativa_a'];?></p>
											<p><a id="votarA" style="margin-left:auto;margin-right:auto;" href="#" class="btn btn-success" role="button">Votar</a>
										</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div id="opcao2" class="thumbnail opcao">
									<?php if($row['alternativa_b_foto'] != ""){ ?>
										 <img src="imgs/<?php echo $row['alternativa_b_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 2</h3>
											<p><?php echo $row['alternativa_b'];?></p>
											<p><a id="votarB" style="margin-left:auto;margin-right:auto;" href="#" class="btn btn-success" role="button">Votar</a>
										</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div id="opcao3" class="thumbnail opcao">
									<?php if($row['alternativa_c_foto'] != ""){ ?>
										 <img src="imgs/<?php echo $row['alternativa_c_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 3</h3>
											<p><?php echo $row['alternativa_c'];?></p>
											<p><a id="votarC" style="margin-left:auto;margin-right:auto;" href="#" class="btn btn-success" role="button">Votar</a>
										</div>
								</div>
							</div>
					</div>
				<div class="row">
			<?php   } 
					else if($row['alternativa_e'] == "" && $row['alternativa_e_foto'] == ""){?>
							<div class="col-sm-6 col-md-4">
								<div id="opcao1" class="thumbnail opcao">
									<?php if($row['alternativa_a_foto'] != ""){ ?>
										 <img src="imgs/<?php echo $row['alternativa_a_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 1</h3>
											<p><?php echo $row['alternativa_a'];?></p>
											<p><a id="votarA" style="margin-left:auto;margin-right:auto;" href="#" class="btn btn-success" role="button">Votar</a>
										</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div id="opcao2" class="thumbnail opcao">
									<?php if($row['alternativa_b_foto'] != ""){ ?>
										 <img src="imgs/<?php echo $row['alternativa_b_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 2</h3>
											<p><?php echo $row['alternativa_b'];?></p>
											<p><a id="votarB" style="margin-left:auto;margin-right:auto;" href="#" class="btn btn-success" role="button">Votar</a>
										</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div id="opcao3" class="thumbnail opcao">
									<?php if($row['alternativa_c_foto'] != ""){ ?>
										 <img src="imgs/<?php echo $row['alternativa_c_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 3</h3>
											<p><?php echo $row['alternativa_c'];?></p>
											<p><a id="votarC" style="margin-left:auto;margin-right:auto;" href="#" class="btn btn-success" role="button">Votar</a>
										</div>
								</div>
							</div>
				</div>
				<div class="row">
						<div class="col-sm-6 col-md-4"></div>
						<div class="col-sm-6 col-md-4">
								<div id="opcao4" class="thumbnail opcao">
									<?php if($row['alternativa_d_foto'] != ""){ ?>
										 <img src="imgs/<?php echo $row['alternativa_d_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 4</h3>
											<p><?php echo $row['alternativa_d'];?></p>
											<p><a id="votarD" style="margin-left:auto;margin-right:auto;" href="#" class="btn btn-success" role="button">Votar</a>
										</div>
								</div>
							</div>
					</div>
					<div class="row">
			<?php   } 
					else{ ?>
					<div class="col-sm-6 col-md-4">
						<div id="opcao1" class="thumbnail opcao">
							<?php if($row['alternativa_a_foto'] != ""){ ?>
								 <img src="imgs/<?php echo $row['alternativa_a_foto']; ?>">
							<?php } ?>
								<div class="caption">
									<h3>Opção 1</h3>
									<p><?php echo $row['alternativa_a'];?></p>
									<p><a id="votarA" style="margin-left:auto;margin-right:auto;" href="#" class="btn btn-success" role="button">Votar</a>
								</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div id="opcao2" class="thumbnail opcao">
							<?php if($row['alternativa_b_foto'] != ""){ ?>
								 <img src="imgs/<?php echo $row['alternativa_b_foto']; ?>">
							<?php } ?>
								<div class="caption">
									<h3>Opção 2</h3>
									<p><?php echo $row['alternativa_b'];?></p>
									<p><a id="votarB" style="margin-left:auto;margin-right:auto;" href="#" class="btn btn-success" role="button">Votar</a>
								</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div id="opcao3" class="thumbnail opcao">
							<?php if($row['alternativa_c_foto'] != ""){ ?>
								 <img src="imgs/<?php echo $row['alternativa_c_foto']; ?>">
							<?php } ?>
								<div class="caption">
									<h3>Opção 3</h3>
									<p><?php echo $row['alternativa_c'];?></p>
									<p><a id="votarC" style="margin-left:auto;margin-right:auto;" href="#" class="btn btn-success" role="button">Votar</a>
								</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-md-4">
							<div id="opcao4" class="thumbnail opcao">
								<?php if($row['alternativa_d_foto'] != ""){ ?>
									 <img src="imgs/<?php echo $row['alternativa_d_foto']; ?>">
								<?php } ?>
									<div class="caption">
										<h3>Opção 4</h3>
										<p><?php echo $row['alternativa_d'];?></p>
										<p><a id="votarD" style="margin-left:auto;margin-right:auto;" href="#" class="btn btn-success" role="button">Votar</a>
									</div>
							</div>
					</div>
					<div class="col-sm-6 col-md-4"></div>
					<div class="col-sm-6 col-md-4">
									<div id="opcao5" class="thumbnail opcao">
										<?php if($row['alternativa_e_foto'] != ""){ ?>
											 <img src="imgs/<?php echo $row['alternativa_e_foto']; ?>">
										<?php } ?>
											<div class="caption">
												<h3>Opção 5</h3>
												<p><?php echo $row['alternativa_e'];?></p>
												<p><a id="votarE" style="margin-left:auto;margin-right:auto;" href="#" class="btn btn-success" role="button">Votar</a>
											</div>
									</div>
					</div>
				</div>
					<?php } ?>	
				<div class="modal-footer">
					<div style="float:left">Criada por <strong><?php echo $row_user['nome_usuario']; ?></strong> </div>
					<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
					<button id="ConfirmarVoto" type="button" class="btn btn-success <?php echo $row['id_enquete']; ?>">Confirmar</button>
					<div style="color:#d9534f;" id="votoErr"></div>
				</div>
	<?php }
		else{ 
			$id_enquete = $row['id_enquete'];
			$result_votos = mysqli_query($conn,"SELECT COUNT(*) FROM votos WHERE id_enquete = $id_enquete");
			$total_votos = mysqli_fetch_array($result_votos);
			$result_votos_alternativa_a = mysqli_query($conn,"SELECT COUNT(*) FROM votos WHERE votos_alternativa_a > 0 and id_enquete = $id_enquete");
			$votos_alternativa_a = mysqli_fetch_array($result_votos_alternativa_a);
			$porcentagem_alternativa_a = round(($votos_alternativa_a[0] * 100) / $total_votos[0]);
			$result_votos_alternativa_b = mysqli_query($conn,"SELECT COUNT(*) FROM votos WHERE votos_alternativa_b > 0 and id_enquete = $id_enquete");
			$votos_alternativa_b = mysqli_fetch_array($result_votos_alternativa_b);
			$porcentagem_alternativa_b = round(($votos_alternativa_b[0] * 100) / $total_votos[0]);
			$result_votos_alternativa_c = mysqli_query($conn,"SELECT COUNT(*) FROM votos WHERE votos_alternativa_c > 0 and id_enquete = $id_enquete");
			$votos_alternativa_c = mysqli_fetch_array($result_votos_alternativa_c);
			$porcentagem_alternativa_c = round(($votos_alternativa_c[0] * 100) / $total_votos[0]);
			$result_votos_alternativa_d = mysqli_query($conn,"SELECT COUNT(*) FROM votos WHERE votos_alternativa_d > 0 and id_enquete = $id_enquete");
			$votos_alternativa_d = mysqli_fetch_array($result_votos_alternativa_d);
			$porcentagem_alternativa_d = round(($votos_alternativa_d[0] * 100) / $total_votos[0]);
			$result_votos_alternativa_e = mysqli_query($conn,"SELECT COUNT(*) FROM votos WHERE votos_alternativa_e > 0 and id_enquete = $id_enquete");
			$votos_alternativa_e = mysqli_fetch_array($result_votos_alternativa_e);
			$porcentagem_alternativa_e = round(($votos_alternativa_e[0] * 100) / $total_votos[0]);
				?>
			<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><?php echo $row['titulo_enquete']; ?>  Total de Votos (<?php echo $total_votos[0]; ?>)</h4>
			</div>
				<div class="modal-body">
					<div class="row">
					<?php if($row['alternativa_c'] == "" && $row['alternativa_c_foto'] == "" && $row['alternativa_d'] == "" && $row['alternativa_d_foto'] == "" && $row['alternativa_e'] == "" && $row['alternativa_c_foto'] == ""){ ?>
								  <div class="col-sm-6 col-md-4">
									<div id="opcao1" class="thumbnail opcao">
									<?php if($row['alternativa_a_foto'] != ""){ ?>
									  <img src="imgs/<?php echo $row['alternativa_a_foto']; ?>">
									<?php } ?>
									  <div class="caption">
										<h3>Opção 1</h3>
										<p><?php echo $row['alternativa_a'];?></p>
										<div class="progress">
										  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $porcentagem_alternativa_a; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem_alternativa_a; ?>%" data-toggle="tooltip" data-placement="bottom" title="<?php echo $votos_alternativa_a[0]; ?> votos">
											<?php echo $porcentagem_alternativa_a; ?>%
										  </div>
										</div>
									  </div>
									</div>
								  </div>
								  <div class="col-sm-6 col-md-4"></div>
								  <div class="col-sm-6 col-md-4">
									<div id="opcao2" class="thumbnail opcao">
									<?php if($row['alternativa_b_foto'] != ""){ ?>
									  <img src="imgs/<?php echo $row['alternativa_b_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 2</h3>
											<p><?php echo $row['alternativa_b'];?></p>
											<div class="progress">
											  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $porcentagem_alternativa_b; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem_alternativa_b; ?>%" data-toggle="tooltip" data-placement="bottom" title="<?php echo $votos_alternativa_b[0]; ?> votos">
												<?php echo $porcentagem_alternativa_b; ?>%
											  </div>
											</div>
										</div>
									</div>
									</div>
					</div>
					<div class="row">
					<?php	}
					else if($row['alternativa_d'] == "" && $row['alternativa_d_foto'] == "" && $row['alternativa_e'] == "" && $row['alternativa_e_foto'] == ""){?>
							<div class="col-sm-6 col-md-4">
								<div id="opcao1" class="thumbnail opcao">
									<?php if($row['alternativa_a_foto'] != ""){ ?>
										 <img src="imgs/<?php echo $row['alternativa_a_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 1</h3>
											<p><?php echo $row['alternativa_a'];?></p>
											<div class="progress">
											  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $porcentagem_alternativa_a; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem_alternativa_a; ?>%" data-toggle="tooltip" data-placement="bottom" title="<?php echo $votos_alternativa_a[0]; ?> votos">
												<?php echo $porcentagem_alternativa_a; ?>%
											  </div>
											</div>
										</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div id="opcao2" class="thumbnail opcao">
									<?php if($row['alternativa_b_foto'] != ""){ ?>
										 <img src="imgs/<?php echo $row['alternativa_b_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 2</h3>
											<p><?php echo $row['alternativa_b'];?></p>
											<div class="progress">
											  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $porcentagem_alternativa_b; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem_alternativa_b; ?>%" data-toggle="tooltip" data-placement="bottom" title="<?php echo $votos_alternativa_b[0]; ?> votos">
												<?php echo $porcentagem_alternativa_b; ?>%
											  </div>
											</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div id="opcao3" class="thumbnail opcao">
									<?php if($row['alternativa_c_foto'] != ""){ ?>
										 <img src="imgs/<?php echo $row['alternativa_c_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 3</h3>
											<p><?php echo $row['alternativa_c'];?></p>
											<div class="progress">
											  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $porcentagem_alternativa_c; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem_alternativa_c; ?>%" data-toggle="tooltip" data-placement="bottom" title="<?php echo $votos_alternativa_c[0]; ?> votos">
												<?php echo $porcentagem_alternativa_c; ?>%
											  </div>
											</div>
									</div>
								</div>
							</div>
					</div>
				<div class="row">
			<?php   } 
					else if($row['alternativa_e'] == "" && $row['alternativa_e_foto'] == ""){?>
							<div class="col-sm-6 col-md-4">
								<div id="opcao1" class="thumbnail opcao">
									<?php if($row['alternativa_a_foto'] != ""){ ?>
										 <img src="imgs/<?php echo $row['alternativa_a_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 1</h3>
											<p><?php echo $row['alternativa_a'];?></p>
											<div class="progress">
											  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $porcentagem_alternativa_a; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem_alternativa_a; ?>%" data-toggle="tooltip" data-placement="bottom" title="<?php echo $votos_alternativa_a[0]; ?> votos">
												<?php echo $porcentagem_alternativa_a; ?>%
											  </div>
											</div>
										</div>
								</div>
							</div>
							<div id="opcao2" class="col-sm-6 col-md-4">
								<div class="thumbnail opcao">
									<?php if($row['alternativa_b_foto'] != ""){ ?>
										 <img src="imgs/<?php echo $row['alternativa_b_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 2</h3>
											<p><?php echo $row['alternativa_b'];?></p>
											<div class="progress">
											  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $porcentagem_alternativa_b; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem_alternativa_b; ?>%" data-toggle="tooltip" data-placement="bottom" title="<?php echo $votos_alternativa_b[0]; ?> votos">
												<?php echo $porcentagem_alternativa_b; ?>%
											  </div>
											</div>
										</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div id="opcao3" class="thumbnail opcao">
									<?php if($row['alternativa_c_foto'] != ""){ ?>
										 <img src="imgs/<?php echo $row['alternativa_c_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 3</h3>
											<p><?php echo $row['alternativa_c'];?></p>
											<div class="progress">
											  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $porcentagem_alternativa_c; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem_alternativa_c; ?>%" data-toggle="tooltip" data-placement="bottom" title="<?php echo $votos_alternativa_c[0]; ?> votos">
												<?php echo $porcentagem_alternativa_c; ?>%
											  </div>
											</div>
										</div>
								</div>
							</div>
				<div class="row">
						<div class="col-sm-6 col-md-4"></div>
						<div class="col-sm-6 col-md-4">
								<div id="opcao4" class="thumbnail opcao">
									<?php if($row['alternativa_d_foto'] != ""){ ?>
										 <img src="imgs/<?php echo $row['alternativa_d_foto']; ?>">
									<?php } ?>
										<div class="caption">
											<h3>Opção 4</h3>
											<p><?php echo $row['alternativa_d'];?></p>
											<div class="progress">
											  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $porcentagem_alternativa_d; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem_alternativa_d; ?>%" data-toggle="tooltip" data-placement="bottom" title="<?php echo $votos_alternativa_d[0]; ?> votos">
												<?php echo $porcentagem_alternativa_d; ?>%
											  </div>
											</div>
										</div>
								</div>
						</div>
				</div>
			</div>
					<div class="row">
			<?php   } 
					else{ ?>
					<div class="col-sm-6 col-md-4">
						<div id="opcao1" class="thumbnail opcao">
							<?php if($row['alternativa_a_foto'] != ""){ ?>
								 <img src="imgs/<?php echo $row['alternativa_a_foto']; ?>">
							<?php } ?>
								<div class="caption">
									<h3>Opção 1</h3>
									<p><?php echo $row['alternativa_a'];?></p>
									<div class="progress">
										  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $porcentagem_alternativa_a; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem_alternativa_a; ?>%" data-toggle="tooltip" data-placement="bottom" title="<?php echo $votos_alternativa_a[0]; ?> votos">
											<?php echo $porcentagem_alternativa_a; ?>%
										  </div>
									</div>
								</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div id="opcao2" class="thumbnail opcao">
							<?php if($row['alternativa_b_foto'] != ""){ ?>
								 <img src="imgs/<?php echo $row['alternativa_b_foto']; ?>">
							<?php } ?>
								<div class="caption">
									<h3>Opção 2</h3>
									<p><?php echo $row['alternativa_b'];?></p>
									<div class="progress">
										  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $porcentagem_alternativa_b; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem_alternativa_b; ?>%" data-toggle="tooltip" data-placement="bottom" title="<?php echo $votos_alternativa_b[0]; ?> votos">
											<?php echo $porcentagem_alternativa_b; ?>%
										  </div>
									</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div id="opcao3" class="thumbnail opcao">
							<?php if($row['alternativa_c_foto'] != ""){ ?>
								 <img src="imgs/<?php echo $row['alternativa_c_foto']; ?>">
							<?php } ?>
								<div class="caption">
									<h3>Opção 3</h3>
									<p><?php echo $row['alternativa_c'];?></p>
									<div class="progress">
										  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $porcentagem_alternativa_c; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem_alternativa_c; ?>%" data-toggle="tooltip" data-placement="bottom" title="<?php echo $votos_alternativa_c[0]; ?> votos">
											<?php echo $porcentagem_alternativa_c; ?>%
										  </div>
									</div>
								</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-md-4">
							<div id="opcao4" class="thumbnail opcao">
								<?php if($row['alternativa_d_foto'] != ""){ ?>
									 <img src="imgs/<?php echo $row['alternativa_d_foto']; ?>">
								<?php } ?>
									<div class="caption">
										<h3>Opção 4</h3>
										<p><?php echo $row['alternativa_d'];?></p>
										<div class="progress">
											  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $porcentagem_alternativa_d; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem_alternativa_d; ?>%" data-toggle="tooltip" data-placement="bottom" title="<?php echo $votos_alternativa_d[0]; ?> votos">
												<?php echo $porcentagem_alternativa_d; ?>%
											  </div>
										</div>
									</div>
							</div>
					</div>
					<div class="col-sm-6 col-md-4"></div>
					<div class="col-sm-6 col-md-4">
									<div id="opcao5" class="thumbnail opcao">
										<?php if($row['alternativa_e_foto'] != ""){ ?>
											 <img src="imgs/<?php echo $row['alternativa_e_foto']; ?>">
										<?php } ?>
											<div class="caption">
												<h3>Opção 5</h3>
												<p><?php echo $row['alternativa_e'];?></p>
												<div class="progress">
												  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $porcentagem_alternativa_e; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentagem_alternativa_e; ?>%" data-toggle="tooltip" data-placement="bottom" title="<?php echo $votos_alternativa_e[0]; ?> votos">
													<?php echo $porcentagem_alternativa_e; ?>%
												  </div>
												</div>
											</div>
									</div>
					</div>
				</div>
					<?php 
					} ?>	
				</div>
				<div class="modal-footer">
					<div style="float:left">Criada por <strong><?php echo $row_user['nome_usuario']; ?></strong> </div>
					<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
				</div>
				</div>
	<?php   }
			?>