<?php
	$tela = $telas;
	if($tela==1){
		$href =  "";
	}else{
		$href = "../";
	}
?>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
<!-- Theme style  -->
<link rel="stylesheet" href="css/style.css">

<div class="fh5co-loader"></div>

	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-3" >
						<div id="fh5co-logo" ><?php echo "<a href='".$href."index.php'>";?><span>Zer@</span><font color="red">DENGUE</font></a></div>
					</div>
					<div class="col-xs-9 text-right menu-1">
						<ul>

							


							<?php
								
								if(isset($_SESSION['inst_id'])) {
									$inst_id = $_SESSION['inst_id'];
									$inst_name = $_SESSION['nome'];
									if($inst_tipo=1){
										echo "	
											<li>
											<a href='".$href."user/admin_dashboard.php'><i class='fa fa-tachometer'></i>&nbsp;&nbsp;Dashboard</a></li>
												<li class='has-dropdown'><a href='#'><i class='icon-location'></i>&nbsp;&nbsp;Gerenciar</a>
													<ul class='dropdown'>
														<li><a href='".$href."admin/admin_dashboard.php'><i class='icon-location'></i>&nbsp;&nbsp;Ver todas as denúncias</a></li>									
													</ul>
												</li>
												<li class='btn-cta has-dropdown'><a href='#'>
												<span>
													<img  height='15px' width='15px'>&nbsp;&nbsp;".$inst_name."
												</span>
											</a>
												<ul class='dropdown'>
													<li><a href='#'><i class='fa fa-question-circle'></i>&nbsp;&nbsp;Ajuda</a></li>									
													<li><a href='".$href."logout.php'><i cla	ss='fa fa-sign-out'></i>&nbsp;&nbsp;Sair</a></li>
												</ul>
										</li>";
									}else{
										echo "	
										<li><a href='".$href."index.php'>Início</a></li>";
									}
								}else {
									echo "
									<li class='btn-cta' data-toggle='modal' data-target='#myModal'><a href='#'><span>Login</span></a></li>
									";
								}
							?>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>