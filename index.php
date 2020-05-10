<?php
	
	ini_set ('log_errors', 'on'); //Logging errors

	session_start();
	
	require_once 'config.php';

	if(isset($_SESSION['inst_id'])) {

		$inst_id = $_SESSION['inst_id'];

		$getinfo = "SELECT `nome`  from `usuarios` where `id`='{$_SESSION['inst_id']}'";
		$query = mysqli_query($link, $getinfo);
		$row = mysqli_fetch_assoc($query);

		$inst_name = $row['nome'];
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php

			include_once 'page-info.php';
			echo $page_meta; //Page modularization
		
		?>

		<!-- Facebook and Twitter integration -->
		<meta property="og:title" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:card" content="" />

		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">

		<!-- Animate.css -->
		<!--<link rel="stylesheet" href="css/animate.css"> -->
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">

		<!-- Magnific Popup -->
		<link rel="stylesheet" href="css/magnific-popup.css">

		<!-- Owl Carousel  -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">

		<!-- Flexslider  -->
		<link rel="stylesheet" href="css/flexslider.css">

		<!-- Pricing -->
		<link rel="stylesheet" href="css/pricing.css">

		<!-- Theme style  -->
		<link rel="stylesheet" href="css/style.css">

		<!-- Modernizr JS -->
		<script src="js/modernizr-2.6.2.min.js"></script>
		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
		<script src="js/respond.min.js"></script>
		<![endif]-->

		<style>
			.modal {
			text-align: center;
			padding: 0!important;
			}

			.modal:before {
			content: '';
			display: inline-block;
			height: 100%;
			vertical-align: middle;
			margin-right: -4px;
			}

			.modal-dialog {
			display: inline-block;
			text-align: left;
			vertical-align: middle;
			}
		</style>

	</head>
	
	<body>
	
	<?php $telas=1; include("extra_header.php"); ?>

	<!-- Modal - For Login-->
	<div class="modal fade" id="myModal" tabindex="-1" autocomplete="off" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Login</h4>
				</div>

				<div class="modal-body">
					<form id="login-form" method="POST" autocomplete="off">
						<div class="form-group">
							<b>User</b>
							<input type="user" name="instuser" class="form-control" id="instuser" placeholder="Digite Usuario">
							<span class="help-block" id="error"></span>
						</div>

						<div class="form-group">
							<b>Senha</b>
							<input type="password" name="instPassword" class="form-control" id="instPassword" placeholder="Senha">
							<span class="help-block" id="error"></span>
						</div>

						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" id="rememberMe"class="form-check-input">Lembre-me
							</label>
						</div>
						<div id="errorDiv"></div> 

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fecnar</button>
							<button type="submit" id="btn-login" class="btn btn-primary">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--Modal for login ends-->


	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
				<li style="background-image: url(images/dengue1.jpg);">
					<div class="overlay-gradient"></div>
					<div class="container">
						<!-- <div class="row">
							<div class="col-md-8 col-md-offset-2 text-center slider-text">
								<div class="slider-text-inner">
								</div>
							</div>
						</div> -->
					</div>
				</li>

		   		<li style="background-image: url(images/dengue2.jpg);">
					<div class="overlay-gradient"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center slider-text">
								<div class="slider-text-inner">
									<h1>Ajude-nos a combater a dengue</h1>
									<p><a class="btn btn-primary btn-lg" href="#">Informe possíveis focos de dengue</a></p>
								</div>
							</div>
						</div>
					</div>
			   </li>
			   
			   	<!-- <li style="background-image: url(images/pets3.jpg);">
					<div class="overlay-gradient"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center slider-text">
								<div class="slider-text-inner">
									<h1>Monitore em tempo real seus PETS</h1>
									<p><a class="btn btn-primary btn-lg" href="#">Consulte Preços</a></p>
								</div>
							</div>
						</div>
					</div>
				</li> -->

		  	</ul>
	  	</div>
	</aside>


<!--Sign up Code -->

	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 animate-box">
					<h3 class="text-center">Vamos Começar!</h3>
					<p class="text-center">Faça seu cadastro.</p> <br>
					

					<!-- Registration Form Begins -->
					<form method="post" id="register-form" autocomplete="off" enctype="multipart/form-data">

						<div class="row">
							<div class="col-md-6 form-group">
								<i class="fa fa-user"></i>&nbsp;&nbsp;Nome Completo
								<input type="text" name="nome" id="nome" class="form-control" placeholder="Informe seu nome completo" />
								<span class="help-block" id="error"></span>
							</div>

							<div class="col-md-6 form-group">
								<i class="fa fa-envelope"></i>&nbsp;&nbsp;Email
								<input type="email" name="email" id="email" class="form-control" placeholder="Informe seu Email" />
								<span class="help-block" id="error"></span>
							</div>			
						</div>

						<div class="row">
							<div class="col-md-6 form-group">
								<i class="fa fa-user"></i>&nbsp;&nbsp;Login
								<input type="text" name="login" id="login" class="form-control" placeholder="Informe seu login" />
								<span class="help-block" id="error"></span>
							</div>
							<div class="form-group col-md-6">
								&nbsp;&nbsp;Telefone
								<input type="number" name="tel" id="tel" class="form-control" placeholder="Coloque seu Telefone">
								<span class="help-block" id="error"></span>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<i class="fa fa-key"></i>&nbsp;&nbsp;Senha
								<input type="password" name="password" id="password" class="form-control" placeholder="Coloque sua senha (Maior do que 6 caracteres)" />
								<span class="help-block" id="error"></span>
							</div>

							<div class="form-group col-md-6">
								<i class="fa fa-key"></i>&nbsp;&nbsp;Repita sua Senha
								<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Repita sua senha" />
								<span class="help-block" id="error"></span>
							</div>								
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								&nbsp;&nbsp;RG
								<input type="number" name="rg" id="rg" class="form-control" placeholder="Coloque seu RG" />
								<span class="help-block" id="error"></span>
							</div>

							<div class="form-group col-md-6">
								&nbsp;&nbsp;CPF
								<input type="number" name="cpf" id="cpf" class="form-control" placeholder="Coloque seu CPF">
								<span class="help-block" id="error"></span>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								&nbsp;&nbsp;Endereço
								<input type="text" name="end" id="end" class="form-control" placeholder="Coloque seu Endereço" />
								<span class="help-block" id="error"></span>
							</div>

							<div class="form-group col-md-6">
								&nbsp;&nbsp;Cidade
								<input type="text" name="cidade" id="cidade" class="form-control" placeholder="Coloque sua Cidade">
								<span class="help-block" id="error"></span>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								&nbsp;&nbsp;Bairro
								<input type="text" name="bairro" id="bairro" class="form-control" placeholder="Coloque seu Bairro" />
								<span class="help-block" id="error"></span>
							</div>
							<div class="form-group col-md-6">
								&nbsp;&nbsp;Estado
								<input type="text" name="estado" id="estado" class="form-control" placeholder="Coloque seu Estado" />
								<span class="help-block" id="error"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="text-center">
								<button type="submit" id="btn-signup" class="btn btn-primary">Register</button>
							</div>
						</div>
						<div id="errorDiv2"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
<!--Sign up Code ends -->


	<!-- <footer id="fh5co-footer" role="contentinfo" style="background-image: url(images/mountain.jpg);">
		<?php include("extra_footer.php"); ?>
	</footer> -->
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<script src="assets/jquery.validate.min.js"></script>
	<script src="js/additional-methods.js"></script>
	<script src="js/extension.js"></script> <!--Message is validated and sent-->
	<script src="login.js"></script>
	<script src="register.js"></script>

	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Count Down -->
	<script src="js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	
	</body>
</html>
