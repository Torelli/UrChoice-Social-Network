$(document).ready(function(){
		var mostrar_por_pagina = 5; 
		var numero_de_itens = $('#output').children('.panel-success').size();
		var numero_de_paginas = Math.ceil(numero_de_itens / mostrar_por_pagina);
		$('#pagi').append('<div class=controls></div><input id="current_page" type="hidden"><input id="mostrar_por_pagina" type="hidden">');
		$('#current_page').val(0);
		//Criamos os links de navegação
		var nevagacao = '<li><a href="#" class="prev" onclick="anterior()">Anterior</a></li>';
		var link_atual = 0;
		nevagacao += '<li><a href="#" class="proxima" onclick="proxima()">Proxima</a></li>';
		//colocamos a nevegação dentro da div class controls
		$('.controls').html("<div class='paginacao'>\<ul class='pager'>"+nevagacao+"</ul></div>");
		$('#output').children(".panel-success").css('display', 'none');
		$('#output').children(".panel-success").slice(0, mostrar_por_pagina).css('display', 'block');
	});
		function ir_para_pagina(numero_da_pagina) {
			 //Pegamos o número de itens definidos que seria exibido por página
			 var mostrar_por_pagina = parseInt(5, 0);
			 //pegamos  o número de elementos por onde começar a fatia
			 inicia = numero_da_pagina * mostrar_por_pagina;
			//o número do elemento onde terminar a fatia
			 end_on = inicia + mostrar_por_pagina;
			$('#output').children(".panel-success").css('display', 'none').slice(inicia, end_on).css('display', 'block');
			$('.page[longdesc=' + numero_da_pagina+ ']').addClass('active').siblings('.active').removeClass('active');
			$('#current_page').val(numero_da_pagina);
		}
		 
		function anterior() {
				nova_pagina = parseInt($('#current_page').val(), 0) - 1;
				if ($('#current_page').val() > 0) {
				  ir_para_pagina(nova_pagina);
				}
		}
		 
		function proxima() {
				nova_pagina = parseInt($('#current_page').val(), 0) + 1;
				if ($('#current_page').val() < Math.ceil(($('.well').children('.panel-success').size()/5))-1) {
				  ir_para_pagina(nova_pagina);
				}
		}