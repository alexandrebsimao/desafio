/**
 * funcoes.js
 * Arquivo responsavel pelas operações em javascript e jQuery
 * @author Alexandre A. B. Simão <alexandre.b.simao@gmail.com>
 */
$(document).ready(function(){

	/**
	 * Aprova o recado
	 */
	$('.aprovar').on('click',function(){
		var ref_click 	= this
		var id 			= $(this).attr('href').replace('#','');

		$.ajax({
			url: '/desafio/recados/aprovar',
			data:{
				id: id
			},
			type: 'post',
			dataType: 'json',
			success: function( data ){

				// Verifica se a atualização foi feita corretamente
				if( data.status == true ){
					$(ref_click).parent().html('<i class="glyphicon glyphicon-check green"></i>');
				}

				var alert = "<div class='alert " + data.class + "' role='alert'>";
				alert 	 += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
				alert	 += data.message;
				alert	 += "</div>";

				// Exibe a mensagem de alert na tela
				$('#main-alert').append( alert );

			},
			error: function( error ){
				var alert = "<div class='alert alert-danger' role='alert'>";
				alert 	 += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
				alert	 += error;
				alert	 += "</div>";
			}
		});

	});
	
	/**
	 * Remover os itens selecionados 
	 *
	 */
	$('#remover_lista').on('click',function(){

		$('.list_delete').each(function(){

			var ref 	= this
			var id 		= $(this).val();

			if( $(ref).is(':checked') ){

				$.ajax({
					url: '/desafio/recados/remover_lista',
					data:{
						id: id
					},
					type: 'post',
					dataType: 'json',
					success: function( data ){

						if( data == true ){
							$(ref).parent().parent().remove();
						}

					},
					error: function( error ){
						var alert = "<div class='alert alert-danger' role='alert'>";
						alert 	 += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
						alert	 += error;
						alert	 += "</div>";
					}

				});

			}

		});

		var alert = "<div class='alert alert-success' role='alert'>";
		alert 	 += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
		alert	 += "Lista removida com sucesso!";
		alert	 += "</div>";

		// Exibe a mensagem de alert na tela
		$('#main-alert').append( alert );

	});

	/**
     * Mascara para data
	 */
	$('#data').keyup(function(){
		var value = $(this).val();
		
	    value=value.replace(/\D/g,"");
	    value=value.replace(/(\d{2})(\d)/,"$1/$2");
	    value=value.replace(/(\d{2})(\d)/,"$1/$2");
	 
	    value=value.replace(/(\d{2})(\d{2})$/,"$1$2");

        $(this).val(value);
	});
});

function alertRemove(){
	decisao = confirm("Deseja realmente remover item(s)!");
	if (decisao){
	    return true;
	} else {
	    return false;
	}
}