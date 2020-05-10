<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="../favicon.png" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MonitoraPET</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

	<?php
	
		ini_set ('log_errors', 'on'); //Logging errors

		session_start();

		require_once '../config.php';

		if(isset($_SESSION['inst_id'])) {

			$inst_id = $_SESSION['inst_id'];
	
			$getinfo = "SELECT `nome`,`nivel_acesso`  from `usuarios` where `id`='{$_SESSION['inst_id']}'";
			$query = mysqli_query($link, $getinfo);
			$row = mysqli_fetch_assoc($query);
	
			$inst_name = $row['nome'];
			$inst_name = $row['nivel_acesso'];
		}
		else
		{
			//Redirect the instructor to login page if he/she is not logged in.
			echo "
				<script type='text/javascript'>
					window.location.href = '../login.php';
				</script>
			";
		}
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
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="../css/flexslider.css">

	<!-- Pricing -->
	<link rel="stylesheet" href="../css/pricing.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
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

	<div class="fh5co-loader"></div>

	<div id="page">
	<?php $telas=2; include("admin_header.php"); ?>

	<!-- Modal - For Logout-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Logout</h4>
				</div>

				<div class="modal-body">
					<br>
					<p> Você realmente quer sair? </p>
				</div>

				<div class="modal-footer">
					<form action="../logout.php">
						<button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
						<input type="submit" value="Sim" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--Modal ends-->
	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(../images/pets1.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
								<h1 class="heading-section">Olá, <?php echo $inst_name;?>!</h1>
								<!--<span> <?php echo "<img src='../profile_pictures/".basename($inst_picture)."' class='img-circle img-responsive text-center' style='height: 150px; width: 150px; margin: auto;' alt='No image'>"; ?></span> <br>-->
								<br>
								<h2>Vamos começar! Escolha qualquer opção abaixo.<br></h2>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>
	
	<!-- Add Dashboard Elements -->
	<div id="fh5co-course-categories">
		<div class="container">
			<div class="row animate-box">

			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6 text-center animate-box">
				<a href="create-course.php">
						<div class="services">
							<span class="icon">
								<i class="icon-plus"></i>
							</span>
							<div class="desc">
								<h3><a href="create-course.php">Crie Cursos</a></h3>
								<p>Crie um curso novo, ou pode ser apenas uma aula!</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<a href="course-management.php?sortby=category">
						<div class="services">
							<span class="icon">
								<i class="icon-pen"></i>
							</span>
							<div class="desc">
								<h3><a href="course-management.php?sortby=category">Gerencie Cursos</a></h3>
								<p>Gerencie as video Aulas do seus cursos!</p>
							</div>
						</div>
					</a>
				</div>
			
				<div class="col-md-3 col-sm-6 text-center animate-box" >
					<a href="messages.php">
						<div class="services">
							<span class="icon" >
								<i class="fa fa-envelope" ></i>
							</span>
							<div class="desc">
								<h3><a href="messages.php">Mensagens</a></h3>
								<p>Veja e responda as mensagens dos estudantes.</p>
							</div>
						</div>
					</a>
				</div>

				<a href="#">
					<div class="col-md-3 col-sm-6 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="fa fa-question"></i>
							</span>
							<div class="desc">
								<h3><a href="#">Obtenha Ajuda</a></h3>
								<p>Contate-nos e responderemos em 24 horas.</p>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>

	


	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="../js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="../js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="../js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/magnific-popup-options.js"></script>
	<!-- Count Down -->
	<script src="../js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script>

	</body>
</html>
