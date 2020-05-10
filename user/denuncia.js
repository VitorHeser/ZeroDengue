// JavaScript Validation For Registration Page

$('document').ready(function()
{
		 $("#denuncias-form").validate({
		  rules:
		  {
				foto: {
					required: true
				},
				endereco: {
					required: true,
					validname: true,
					minlength: 10
				},
				descricao:{
					required: true,
					validname: true,
					minlength: 100
				}

		   },
		   messages:
		   {
			endereco: {
					required: "O endereço é obrigatório.",
					validname: "Digite apenas letras e espaços.",
					minlength: "Seu endereço está muito pequeno."
				},

				foto: {
					required: "A foto é obrigatória."
				},

				descricao: {
					required: "A descrição é obrigatória.",
					validname: "Digite apenas letras e espaços.",
					minlength: "Sua descrição está muito pequena."
				}
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error');
			  $(element).closest('.form-group').find('.help-block').html('');
		   },
				submitHandler: submitForm
		   });


		   function submitForm(){
				$.ajax({
			   		url: 'ajax-denuncia.php',
			   		type: 'POST',
					data: $("#denuncias-form").serializable(),
			   		dataType: 'json'
			   })
			   .done(function(data){

			   		$('#btn-salve').html('<img src="ajax-loader.gif" />&nbsp; Salvando...').prop('disabled', true);
			   		$('input[type=endereco],input[type=emaifotol],input[type=descricao]').prop('disabled', true);

			   		setTimeout(function(){

						if (data.status==='success') {

							$('#errorDiv2').slideDown('fast', function(){
								$('#errorDiv2').html('<div class="alert alert-info">'+data.message+'</div>');
								$("#denuncias-form").trigger('reset');
								$('input[type=endereco],input[type=emaifotol],input[type=descricao]').prop('disabled', true);
								$('#btn-salve').html('Salvando').prop('disabled', false);
							}).delay(3000).slideUp('fast');


					    } else {

						    $('#errorDiv2').slideDown('fast', function(){
						      	$('#errorDiv2').html('<div class="alert alert-danger">'+data.message+'</div>');
							  	$("#denuncias-form").trigger('reset');
								  $('input[type=endereco],input[type=emaifotol],input[type=descricao]').prop('disabled', true);
							  	$('#btn-salve').html('Salvando').prop('disabled', false);
							}).delay(3000).slideUp('fast');
						}

					},3000);

			   })
			   .fail(function(){
			   		$("#denuncias-form").trigger('reset');
			   		alert('An unknown error occoured. Please try again later.');
			   });

}
});
