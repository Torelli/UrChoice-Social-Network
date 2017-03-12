function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
			$('#miniatura1').show();
            $('#foto1').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
			$('#miniatura2').show();
            $('#foto2').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURL3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
			$('#miniatura3').show();
            $('#foto3').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURL4(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
			$('#miniatura4').show();
            $('#foto4').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURL5(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
			$('#miniatura5').show();
            $('#foto5').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function(){
	$("#votoErr").hide();
	$("#nomeErr").hide();
	$("#emailErr").hide();
	$("#userErr").hide();
	$("#passErr").hide();
	$("#confErr").hide();
	$("#fotoErr").hide();
	$("#Opt1Err").hide();
	$("#Opt1Success").hide();
	$("#Opt2Err").hide();
	$("#Opt2Success").hide();
	$("#Opt3Err").hide();
	$("#Opt3Success").hide();
	$("#Opt4Err").hide();
	$("#Opt4Success").hide();
	$("#Opt5Err").hide();
	$("#Opt5Success").hide();
	$("#nome_configform").hide();
	$("#email_configform").hide();
	$("#user_configform").hide();
	$("#Opt3").hide();
	$("#Opt4").hide();
	$("#Opt5").hide();
	$(".pass_configform").hide();
	$("#senhaSuccess").hide();
	$("#fotoSuccess").hide();
	$("#nomeSuccess").hide();
	$("#emailSuccess").hide();
	$("#userSuccess").hide();
	$("#TituloErr").hide();
	$("#TituloSuccess").hide();
	$("#pass_config").prop('disabled', true);
	$("#confpass_config").prop('disabled', true);
	$("#pass_change").prop('disabled', true);
	$("#loading").hide();
	$("#logErr").hide();
	$(function () {
	$('[data-toggle="tooltip"]').tooltip()
	})
	$("#titulo").keyup(function(){
		var nome = $("#titulo").val();
		var erro = $("#TituloErr");
		if(nome.length < 8){
			erro.show();
			erro.html('Título muito curto!');
		}
		else{
			erro.hide();
			erro.html('');
		}
	});
	$("#nome").keyup(function(){
		var nome = $("#nome").val();
		var erro = $("#nomeErr");
		if(nome.length < 9){
			erro.show();
			erro.html('Digite seu nome completo!');
			$("#nome").css("border-color","#d9534f");
		}
		else{
			erro.hide();
			erro.html('');
			$("#nome").css("border-color","#5cb85c");
		}
	});
	$("#nome_config").keyup(function(){
		var nome = $("#nome_config").val();
		var erro = $("#nomeErr");
		if(nome.length < 10){
			erro.show();
			erro.html('Digite seu nome completo!');
			$("#nome_config").css("border-color","#d9534f");
		}
		else{
			erro.hide();
			erro.html('');
			$("#nome_config").css("border-color","#5cb85c");
			
		}
	});
	$("#email").keyup(function(){
		var email = $("#email").val();
		var erro = $("#emailErr");
		var atpos = email.indexOf("@");
		var dotpos = email.lastIndexOf(".");
		if(email == "" || atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
			erro.show();
			erro.html('Email inválido!');
			$("#email").css("border-color","#d9534f");
		}
		else{
			erro.hide();
			erro.html('');
			$("#email").css("border-color","#5cb85c");
		}
	});
	$("#email_config").keyup(function(){
		var email = $("#email_config").val();
		var erro = $("#emailErr");
		var atpos = email.indexOf("@");
		var dotpos = email.lastIndexOf(".");
		if(email == "" || atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
			erro.show();
			erro.html('Email inválido!');
			$("#email_config").css("border-color","#d9534f");
		}
		else{
			erro.hide();
			erro.html('');
			$("#email_config").css("border-color","#5cb85c");
		}
	});
	$("#username").keyup(function(){
		var user = $("#username").val();
		var erro = $("#userErr");
		var data = "user=" + user;
		if(user.length < 4){
			erro.show();
			erro.html('Nome de usuário muito curto!');
			$("#username").css("border-color","#d9534f");
		}
		else{
			erro.hide();
			erro.html('');
			$("#username").css("border-color","#5cb85c");
		}
	});
	$("#username_config").keyup(function(){
		var user = $("#username_config").val();
		var erro = $("#userErr");
		var data = "user=" + user;
		if(user.length < 4){
			erro.show();
			erro.html('Nome de usuário muito curto!');
			$("#username_config").css("border-color","#d9534f");
		}
		else{
			erro.hide();
			erro.html('');
			$("#username_config").css("border-color","#5cb85c");
		}
	});
	$("#password").keyup(function(){
		var pass = $("#password").val();
		var erro = $("#passErr");
		if(pass.length < 6){
			erro.show();
			erro.html('A senha deve ter no mínimo 6 caracteres!');
			$("#password").css("border-color","#d9534f");
		}
		else{
			erro.hide();
			erro.html('');
			$("#password").css("border-color","#5cb85c");
		}
	});
	$("#pass_config").keyup(function(){
		var pass = $("#pass_config").val();
		var erro = $("#passErr");
		if(pass.length < 6){
			erro.show();
			erro.html('A senha deve ter no mínimo 6 caracteres!');
			$("#pass_config").css("border-color","#d9534f");
		}
		else{
			erro.hide();
			erro.html('');
			$("#pass_config").css("border-color","#5cb85c");
		}
	});
	$("#confpass").keyup(function(){
		var pass = $("#password").val();
		var confpass = $("#confpass").val();
		var erro = $("#confErr");
		if(confpass != pass ){
			erro.show();
			erro.html('As senhas não correspondem!');
			$("#confpass").css("border-color","#d9534f");
		}
		else{
			erro.hide();
			erro.html('');
			$("#confpass").css("border-color","#5cb85c");
		}
	});
	$("#confpass_config").keyup(function(){
		var pass = $("#pass_config").val();
		var confpass = $("#confpass_config").val();
		var erro = $("#confErr");
		if(confpass != pass ){
			erro.show();
			erro.html('As senhas não correspondem!');
			$("#confpass_config").css("border-color","#d9534f");
		}
		else{
			erro.hide();
			erro.html('');
			$("#confpass_config").css("border-color","#5cb85c");
		}
	});
	$("#oldpass_check").click(function(){
		var senha_antiga = $("#oldpass").val();
		var data = "senha=" + senha_antiga;
		$.ajax({
			method: "post",
			url: "check_oldpass.php?",
			data : data,
			success: function(result)
			{
				if(result == 1){
					$("#oldpass").css("border-color","#d9534f");
				}
				else{
					$("#oldpass").css("border-color","#5cb85c");
					$("#pass_config").prop('disabled', false);
					$("#confpass_config").prop('disabled', false);
					$("#pass_change").prop('disabled', false);
				}
			}
		});
	});
	$("#pass_change").click(function(){
		var passErro = $("#passErr");
		var confErro = $("#confErr");
		if($("#pass_config").val().length < 6){
			passErro.show();
			passErro.html('A senha deve ter no mínimo 6 caracteres!');
			$("#pass_config").css("border-color","#d9534f");
			$("#pass_config").focus();
		}
		else if($("#confpass_config").val() != $("#pass_config").val()){
			confErro.show();
			confErro.html('As senhas não correspondem!');
			$("#confpass_config").css("border-color","#d9534f");
		}
		else{
			var nova_senha = $("#confpass_config").val();
			var data = "senha=" + nova_senha;
			$.ajax({
				method: "post",
				url: "alterar_senha.php?",
				data: data,
				success: function(result){
					if(result == 0){
						confErro.show();
						confErro.html("Sua senha nova não pode ser igual à antiga!");
					}
					else{
						confErro.hide();
						$("#senhaSuccess").show();
						$("#senhaSuccess").html("Senha alterada com sucesso!");
					}
				}
			});
		}
	});
	$("#name_change").click(function(){
		var nome = $("#nome_config").val();
		var nomeErro = $("#nomeErr");
		if(nome.length < 9){
			nomeErro.show();
			nomeErro.html('Digite seu nome completo!');
			$("#nome_config").css("border-color","#d9534f");
			$("#nome_config").focus();
		}
		else{
			var data = "nome=" + nome;
			$.ajax({
				method: "post",
				url: "alterar_nome.php?",
				data: data,
				success: function(result){
					if(result != 1){
						nomeErro.hide();
						$("#saudacao_txt").html("Olá, " + result);
						$("#nome_ref").html(result);
						$("#nomeSuccess").show();
						$("#nomeSuccess").html("Nome alterado com sucesso!");
					}
					else{
						nomeErro.show();
						nomeErro.html("Esse já é seu nome!");
					}
					
				}
			});
		}
	});
	$("#email_change").click(function(){
		var email = $("#email_config").val();
		var emailErro = $("#emailErr");
		var atpos = email.indexOf("@");
		var dotpos = email.lastIndexOf(".");
		if(email == "" || atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
			emailErro.show();
			emailErro.html('Email Inválido!');
			$("#email_config").css("border-color","#d9534f");
			$("#email_config").focus();
		}
		else{
			var data = "email=" + email;
			$.ajax({
				method: "post",
				url: "alterar_email.php?",
				data: data,
				success: function(result){
					if(result != 1){
						$("#email_ref").html(result);
						$("#emailSuccess").show();
						$("#emailSuccess").html("Email alterado com sucesso!");
					}
					else{
						emailErro.show();
						emailErro.html("Esse email já está cadastrado!");
					}
					
				}
			});
		}
	});
	$("#username_change").click(function(){
		var user = $("#username_config").val();
		var userErro = $("#userErr");
		if(user.length < 4){
			userErro.show();
			userErro.html('Nome de usuário muito curto!');
			$("#username_config").css("border-color","#d9534f");
			$("#username_config").focus();
		}
		else{
			var data = "user=" + user;
			$.ajax({
				method: "post",
				url: "alterar_username.php?",
				data: data,
				success: function(result){
					if(result != 1){
						$("#user_ref").html(result);
						$("#userSuccess").show();
						$("#userSuccess").html("Nome de usuário alterado com sucesso!");
					}
					else{
						userErro.show();
						userErro.html("Esse nome de usuário já está cadastrado!");
					}
					
				}
			});
		}
	});
	$("#register").click(function(){
		var nome = $("#nome").val();
		var email = $("#email").val();
		var atpos = email.indexOf("@");
		var dotpos = email.lastIndexOf(".");
		var user = $("#username").val();
		var pass = $("#password").val();
		var confpass = $("#confpass").val();
		var nomeErro = $("#nomeErr");
		var emailErro = $("#emailErr");
		var userErro = $("#userErr");
		var passErro = $("#passErr");
		var confErro = $("#confErr");
		
		if(nome.length < 9){
			nomeErro.show();
			nomeErro.html('Digite seu nome completo!');
			$("#nome").css("border-color","#d9534f");
			$("#nome").focus();
		}
		else if(email == "" || atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
			emailErro.show();
			emailErro.html('Email Inválido!');
			$("#email").css("border-color","#d9534f");
			$("#email").focus();
		}
		else if(user.length < 4){
			userErro.show();
			userErro.html('Nome de usuário muito curto!');
			$("#username").css("border-color","#d9534f");
			$("#username").focus();
		}
		else if(pass.length < 6){
			passErro.show();
			passErro.html('A senha deve ter no mínimo 6 caracteres!');
			$("#password").css("border-color","#d9534f");
			$("#password").focus();
		}
		else if(confpass != pass){
			confErro.show();
			confErro.html('As senhas não correspondem!');
			$("#confpass").css("border-color","#d9534f");
		}
		else{
			nomeErro.hide();
			nomeErro.html('');
			emailErro.hide();
			emailErro.html('');
			userErro.hide();
			userErro.html('');
			passErro.hide();
			passErro.html('');
			confErro.hide();
			confErro.html('');
			var data = "user=" + user + "&pass=" + pass + "&confpass=" + confpass + "&email=" + email + "&nome=" + nome;
		
			$.ajax({
				method: "post",
				url: "register.php?",
				data: data,
				success: function(result)
				{
					if(result == 1){
						emailErro.show();
						emailErro.html('Email já cadastrado!');
						$("#email").css("border-color","#d9534f");
					}
					else if(result == 2){
						userErro.show();
						userErro.html('Nome de usuário já existe!');
						$("#username").css("border-color","#d9534f");	
					}
					else{
						window.location="area_user.php";
					}
				}
			});
		}
	});
	$("#user").keyup(function(){
		if($("#user").val().length < 4){
			$("#user").css("border-color","#d9534f");
		}
		else{
			$("#user").css("border-color","#5cb85c");
		}
	});
	$("#pass").keyup(function(){
		if($("#pass").val().length < 6){
			$("#pass").css("border-color","#d9534f");
		}
		else{
			$("#pass").css("border-color","#5cb85c");
		}
	});
	$("#entrar").click(function(){
		if($("#user").val() == "" && $("#pass").val() == ""){
			$("#user").css("border-color","#d9534f");
			$("#pass").css("border-color","#d9534f");
			$("#logErr").show();
			$("#logErr").css("margin-top","0");
			$("#logErr").html('Preencha os campos!');
		}
		else if($("#user").val() == ""){
			$("#user").css("border-color","#d9534f");
			$("#logErr").show();
			$("#logErr").css("margin-top","0");
			$("#logErr").html('Digite o nome de usuário');
		}
		else if($("#pass").val() == ""){
			$("#pass").css("border-color","#d9534f");
			$("#logErr").show();
			$("#logErr").css("margin-top","0");
			$("#logErr").html('Digite a senha!');
		}
		else{
			var usuario = $("#user").val();
			var senha = $("#pass").val();
			
			var data = "user=" + usuario + "&pass=" + senha;
			
			$.ajax({
				method: "post",
				url: "login.php?",
				data: data,
				success: function(result)
				{
					if(result == 1){
						window.location="area_user.php";
					}
					else{
						$("#logErr").show();
						$("#logErr").css("margin-top","0");
						$("#logErr").html('Nome de usuário ou senha incorretos!');
					}
				}
			});
			$("#pass").css("border-color","#5cb85c");
			$("#user").css("border-color","#5cb85c");
			$("#logErr").hide();
			$("#logErr").html('');	   
		}
	});
	$("#sair").click(function(){
		$.ajax({
				method: "post",
				url: "sair.php?",
				success: function()
				{
						window.location="area_user.php";
				}
			});
	});
	$(".apagar_enquete").click(function(){
		var id_enquete = $(this).attr('id');
		data = "id_enquete=" + id_enquete;
		$.ajax({
				method: "post",
				url: "apagar_enquete.php?",
				data: data,
				success: function()
				{
						location.reload();
				}
			});
	});
	$("#alterar_nome").click(function(){
		$("#nome_configform").show();
		$("#nome_config").focus();
	});
	$("#alterar_email").click(function(){
		$("#email_configform").show();
		$("#email_config").focus();
	});
	$("#alterar_username").click(function(){
		$("#user_configform").show();
		$("#username_config").focus();
	});
	$("#alterar_senha").click(function(){
		$(".pass_configform").show();
		$("#oldpass").focus();
	});
	$('body').on('change','#foto_config', function()
	{
		var extension = $("#foto_config").val().split('.').pop().toUpperCase();
		if (extension!="PNG" && extension!="JPG" && extension!="GIF" && extension!="JPEG"){
			$("#fotoErr").show();
			$("#fotoErr").html("Formato de imagem desconhecido!");
		}
		else{
			$("#foto_formconfig").ajaxForm({
				 beforeSend: function() 
				{
					$("#loading").show();
				},
				success: function(result)
				{
					$("#fotoErr").hide();
					$("#loading").hide();
					$("#alterFoto").html('<span class="alterar_foto"><label class="alterar_foto" for="foto_config">Alterar</label></span>' + result);
					$("#saudacao").html(result);
					$("#fotoSuccess").show();
					$("#fotoSuccess").html("Foto alterada com sucesso!");
				}
			}).submit();
		}
	});
	$('body').on('change','#fotoOpt1', function()
	{
		var extension = $("#fotoOpt1").val().split('.').pop().toUpperCase();
		if (extension!="PNG" && extension!="JPG" && extension!="GIF" && extension!="JPEG"){
			$("#Opt1Err").show();
			$("#Opt1Err").html("Formato de imagem desconhecido!");
			$("#fotoOpt1").val() = "";
		}
		else{
			$("#Opt1Err").hide();
			readURL1(this);
		}
	});
	$('body').on('change','#fotoOpt2', function()
	{
		var extension = $("#fotoOpt2").val().split('.').pop().toUpperCase();
		if (extension!="PNG" && extension!="JPG" && extension!="GIF" && extension!="JPEG"){
			$("#Opt2Err").show();
			$("#Opt2Err").html("Formato de imagem desconhecido!");
			$("#fotoOpt2").val() = "";
		}
		else{
			$("#Opt2Err").hide();
			readURL2(this);
		}
	});
	$('body').on('change','#fotoOpt3', function()
	{
		var extension = $("#fotoOpt3").val().split('.').pop().toUpperCase();
		if (extension!="PNG" && extension!="JPG" && extension!="GIF" && extension!="JPEG"){
			$("#Opt3Err").show();
			$("#Opt3Err").html("Formato de imagem desconhecido!");
			$("#fotoOpt3").val() = "";
		}
		else{
			$("#Opt3Err").hide();
			readURL3(this);
		}
	});
	$('body').on('change','#fotoOpt4', function()
	{
		var extension = $("#fotoOpt4").val().split('.').pop().toUpperCase();
		if (extension!="PNG" && extension!="JPG" && extension!="GIF" && extension!="JPEG"){
			$("#Opt4Err").show();
			$("#Opt4Err").html("Formato de imagem desconhecido!");
			$("#fotoOpt4").val() = "";
		}
		else{
			$("#Opt4Err").hide();
			readURL4(this);
		}
	});
	$('body').on('change','#fotoOpt5', function()
	{
		var extension = $("#fotoOpt5").val().split('.').pop().toUpperCase();
		if (extension!="PNG" && extension!="JPG" && extension!="GIF" && extension!="JPEG"){
			$("#Opt5Err").show();
			$("#Opt5Err").html("Formato de imagem desconhecido!");
			$("#fotoOpt5").val() = "";
		}
		else{
			$("#Opt5Err").hide();
			readURL5(this);
		}
	});
	$("#Enquete_btn").click(function(){
		$("#Opt3").hide();
		$("#Opt4").hide();
		$("#Opt5").hide();
		$("#Opt1Err").hide();
		$("#Opt1Success").hide();
		$("#Opt2Err").hide();
		$("#Opt2Success").hide();
		$("#Opt3Err").hide();
		$("#Opt3Success").hide();
		$("#Opt4Err").hide();
		$("#Opt4Success").hide();
		$("#Opt5Err").hide();
		$("#Opt5Success").hide();
		$("#opcao1").val("");
		$("#opcao2").val("");
		$("#opcao3").val("");
		$("#opcao4").val("");
		$("#opcao5").val("");
		$("#titulo").val("");
		$('#miniatura1').hide();
		$('#miniatura2').hide();
		$('#miniatura3').hide();
		$('#miniatura4').hide();
		$('#miniatura5').hide();
		$("#addOpt").html("Adicionar Opção");
	});
	$(".Ver_enquete_btn").off("click");
	$(".Ver_enquete_btn").click(function(event){
		event.preventDefault();
    
		var script = $(this).data('script');
		var src = $(this).data('src');
		
		if ($('script[data-name="'+script+'"]').length == 0 ){
			
			$('head').append(
				$('<script />').attr('type', 'text/javascript')
				.attr('src', src)
				.attr('data-name', script)
			);
			
		} else {
			console.log(script, 'já foi carregado' );
		}
		var id_enquete= $(this).attr('id').substring(11);
		data = "id_enquete=" + id_enquete;
		$.ajax({
				method: "get",
				url: "ver_enquete.php?",
				data: data,
				success: function(result)
				{
						$("#VerEnqueteOutput").html(result);
				}
			});
	});
	$("#Principal").off("click");
	$("#Principal").click(function(event){
		event.preventDefault();
    
		var script = $(this).data('script');
		var src = $(this).data('src');
		
		if ($('script[data-name="'+script+'"]').length == 0 ){
			
			$('head').append(
				$('<script />').attr('type', 'text/javascript')
				.attr('src', src)
				.attr('data-name', script)
			);
			
		} else {
			console.log(script, 'já foi carregado' );
		}
		$("#Principal").unbind("click");
		$("#Principal").css("color","#990099");
		$("#Usuarios").css("color","#777");
		$(".usuariosHR").css("width","0%");
		$(".principalHR").css("width","100%");
		$("#output").load("enquete_principal.php");
	});
	$("#Usuarios").off("click");
	$("#Usuarios").click(function(event){
		event.preventDefault();
    
		var script = $(this).data('script');
		var src = $(this).data('src');
		
		if ($('script[data-name="'+script+'"]').length == 0 ){
			
			$('head').append(
				$('<script />').attr('type', 'text/javascript')
				.attr('src', src)
				.attr('data-name', script)
			);
			
		} else {
			console.log(script, 'já foi carregado' );
		}
		$("#Usuarios").css("color","#990099");
		$("#Principal").css("color","#777");
		$(".principalHR").css("width","0%");
		$(".usuariosHR").css("width","100%");
		$("#output").load("enquete_usuarios.php");

	});
});