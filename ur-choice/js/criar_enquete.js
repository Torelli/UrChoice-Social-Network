$(document).ready(function(){	
	$("#Confirmar_enquete").click(function(){
		var nome = $("#titulo").val();
		var erroTitulo = $("#TituloErr");
		var opcao1 = $("#opcao1").val();
		var extensao_foto1 = $("#fotoOpt1").val().split('.').pop().toUpperCase();
		var opcao2 = $("#opcao2").val();
		var extensao_foto2 = $("#fotoOpt2").val().split('.').pop().toUpperCase();
		var erroGeral = $("#Opt5Err");
		if(nome.length < 8){
			erroTitulo.show();
			erroTitulo.html('Título muito curto!');
		}
		else if(opcao1 == "" && extensao_foto1 != "PNG" && extensao_foto1 != "JPG" && extensao_foto1 != "GIF" && extensao_foto1 != "JPEG" || opcao2 == "" && extensao_foto2 !="PNG" && extensao_foto2 !="JPG" && extensao_foto2 !="GIF" && extensao_foto2 !="JPEG"){
			erroTitulo.hide();
			erroGeral.show();
			erroGeral.html("A enquete deve ter no mínimo 2 opções!");
		}
		else{
			$('#Confirmar_enquete').attr('data-dismiss', "modal");
			$("#NovaEnquete_form").ajaxForm({
					success: function()
					{
						location.reload();
					}
			}).submit();
				}
	});
	$("#addOpt").click(function(event){
		if($("#Opt3").is(":hidden")){
			$("#Opt3").show();
		}
		else if($("#Opt4").is(":hidden")){
			$("#Opt4").show();
		}
		else if($("#Opt5").is(":hidden")){
			$("#Opt5").show();
		}
		else{
			$("#addOpt").html("Você não pode adicionar mais opções!");
		}
	});
});