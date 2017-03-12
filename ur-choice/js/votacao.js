$(document).ready(function(){	
	$("#votarA").click(function(){
		$("#opcao1").addClass("votado");
		$("#opcao1").removeClass("opcao");
		$("#opcao2").removeClass("votado");
		$("#opcao2").addClass("opcao");
		$("#opcao3").removeClass("votado");
		$("#opcao3").addClass("opcao");
		$("#opcao4").removeClass("votado");
		$("#opcao4").addClass("opcao");
		$("#opcao5").removeClass("votado");
		$("#opcao5").addClass("opcao");
	});
	$("#votarB").click(function(){
		$("#opcao2").addClass("votado");
		$("#opcao2").removeClass("opcao");
		$("#opcao1").removeClass("votado");
		$("#opcao1").addClass("opcao");
		$("#opcao3").removeClass("votado");
		$("#opcao3").addClass("opcao");
		$("#opcao4").removeClass("votado");
		$("#opcao4").addClass("opcao");
		$("#opcao5").removeClass("votado");
		$("#opcao5").addClass("opcao");
	});
	$("#votarC").click(function(){
		$("#opcao3").addClass("votado");
		$("#opcao3").removeClass("opcao");
		$("#opcao1").removeClass("votado");
		$("#opcao1").addClass("opcao");
		$("#opcao2").removeClass("votado");
		$("#opcao2").addClass("opcao");
		$("#opcao4").removeClass("votado");
		$("#opcao4").addClass("opcao");
		$("#opcao5").removeClass("votado");
		$("#opcao5").addClass("opcao");
	});
	$("#votarD").click(function(){
		$("#opcao4").addClass("votado");
		$("#opcao4").removeClass("opcao");
		$("#opcao1").removeClass("votado");
		$("#opcao1").addClass("opcao");
		$("#opcao3").removeClass("votado");
		$("#opcao3").addClass("opcao");
		$("#opcao2").removeClass("votado");
		$("#opcao2").addClass("opcao");
		$("#opcao5").removeClass("votado");
		$("#opcao5").addClass("opcao");
	});
	$("#votarE").click(function(){
		$("#opcao5").addClass("votado");
		$("#opcao5").removeClass("opcao");
		$("#opcao1").removeClass("votado");
		$("#opcao1").addClass("opcao");
		$("#opcao3").removeClass("votado");
		$("#opcao3").addClass("opcao");
		$("#opcao4").removeClass("votado");
		$("#opcao4").addClass("opcao");
		$("#opcao2").removeClass("votado");
		$("#opcao2").addClass("opcao");
	});
	$("#ConfirmarVoto").click(function(){
		if($("#opcao1").hasClass("votado")){
			$(this).removeClass("btn btn-success");
			var data = "id_enquete=" + $(this).attr('class') + "&opcao=opcao1";
			$.ajax({
				method: "post",
				url: "votar_enquete.php?",
				data: data,
				success: function(result)
				{
					$("#VerEnqueteOutput").html(result);
					
				}
			});
		}
		else if($("#opcao2").hasClass("votado")){
			$(this).removeClass("btn btn-success");
			var data = "id_enquete=" + $(this).attr('class') + "&opcao=opcao2";
			$.ajax({
				method: "post",
				url: "votar_enquete.php?",
				data: data,
				success: function(result)
				{
					$("#VerEnqueteOutput").html(result);
					
				}
			});
		}
		else if($("#opcao3").hasClass("votado")){
			$(this).removeClass("btn btn-success");
			var data = "id_enquete=" + $(this).attr('class') + "&opcao=opcao3";
			$.ajax({
				method: "post",
				url: "votar_enquete.php?",
				data: data,
				success: function(result)
				{
					$("#VerEnqueteOutput").html(result);
					
				}
			});
		}
		else if($("#opcao4").hasClass("votado")){
			$(this).removeClass("btn btn-success");
			var data = "id_enquete=" + $(this).attr('class') + "&opcao=opcao4";
			$.ajax({
				method: "post",
				url: "votar_enquete.php?",
				data: data,
				success: function(result)
				{
					$("#VerEnqueteOutput").html(result);
					
				}
			});
		}
		else if($("#opcao5").hasClass("votado")){
			$(this).removeClass("btn btn-success");
			var data = "id_enquete=" + $(this).attr('class') + "&opcao=opcao5";
			$.ajax({
				method: "post",
				url: "votar_enquete.php?",
				data: data,
				success: function(result)
				{
					$("#VerEnqueteOutput").html(result);
					
				}
			});
		}
		else{
			$("#votoErr").show();
			$("#votoErr").html("Selecione uma opção!");
		}
	});
});