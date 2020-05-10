// JavaScript Validation For Registration Page

$('document').ready(function()
{

		 // name validation
		 var nameregex = /^[a-zA-Z ]+$/;
		 $.validator.addMethod("validname", function(value, element) {
		     return this.optional(element) || nameregex.test(value);
		 });

		 // valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional(element) || eregex.test(value);
		 });

		 //Valid URL pattern
		 var urlregex = /^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
		 $.validator.addMethod("validurl", function(value, element) {
			return this.optional(element) || urlregex.test(value);
		});

		 $("#register-form").validate({
		  rules:
		  {
				nome: {
					required: true,
					validname: true,
					minlength: 4
				},
				login: {
					required: true,
					minlength: 4
				},

				email: {
				required : true,
				validemail: true,
				remote: {
					url: "check-email.php",
					type: "post",
					data: {
						email: function() {
							return $("#email").val();
						}
					}
				}
				},


				password: {
					required: true,
					minlength: 6,
					maxlength: 15
				},

				cpassword: {
					required: true,
					equalTo: '#password'
				},

				rg: {
					required: true,
					minlength: 6
				},

				cpf: {
					required: true,
					minlength: 6
				},
				
				end: {
					required: true,
					minlength: 6
				},

				cidade: {
					required: false,
					minlength: 4
				},
				bairro: {
					required: false,
					minlength: 4
				},
				estado: {
					required: false,
					minlength: 4
				},
				tel: {
					required: false,
					minlength: 4
				}
		   },
		   messages:
		   {
				nome: {
					required: "O nome é obrigatório.",
					validname: "Digite apenas letras e espaços.",
					minlength: "Seu nome está muito pequeno."
				},

				email: {
					required: "O Email é obrigatório.",
					validemail: "Digite um email válido.",
					remote: "Esse email já existe."
				},

				password: {
					required: "A senha é obrigatória.",
					minlength: "A senha deve possuir mais de 6 caracteres.."
				},

				cpassword: {
					required: "Repita sua senha|",
					equalTo: "A senha não está igual!"
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
			   		url: 'ajax-signup.php',
			   		type: 'POST',
					data: new FormData(document.getElementById("register-form")),
					cache: false,
					contentType: false,
					processData: false,
			   		dataType: 'json'
			   })
			   .done(function(data){

			   		$('#btn-signup').html('<img src="ajax-loader.gif" />&nbsp; Registering...').prop('disabled', true);
			   		$('input[type=text],input[type=email],input[type=password]').prop('disabled', true);

			   		setTimeout(function(){

						if (data.status==='success') {

							$('#errorDiv2').slideDown('fast', function(){
								$('#errorDiv2').html('<div class="alert alert-info">'+data.message+'</div>');
								$("#register-form").trigger('reset');
								$('input[type=text],input[type=email],input[type=password],input[type=url],input[type=file]').prop('disabled', false);
								$('#btn-signup').html('Register').prop('disabled', false);
							}).delay(3000).slideUp('fast');


					    } else {

						    $('#errorDiv2').slideDown('fast', function(){
						      	$('#errorDiv2').html('<div class="alert alert-danger">'+data.message+'</div>');
							  	$("#register-form").trigger('reset');
							  	$('input[type=text],input[type=email],input[type=password],input[type=url],input[type=file]').prop('disabled', false);
							  	$('#btn-signup').html('Register').prop('disabled', false);
							}).delay(3000).slideUp('fast');
						}

					},3000);

			   })
			   .fail(function(){
			   		$("#register-form").trigger('reset');
			   		alert('An unknown error occoured. Please try again later.');
			   });

}
});
