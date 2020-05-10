<?php

	ini_set ('log_errors', 'on'); //Logging errors

	session_start();

	require_once 'config.php';

	if(isset($_SESSION['inst_id'])) {

		$inst_id = $_SESSION['inst_id'];

		$getinfo = "SELECT `nome`,`nivel_acesso`  from `usuarios` where `id`='{$_SESSION['inst_id']}'";
		$query = mysqli_query($link, $getinfo);
		$row = mysqli_fetch_assoc($query);
		$inst_acesso = $row['nivel_acesso'];
		if($inst_acesso==1){
			echo "
				<script type='text/javascript'>
					window.location.href = 'admin/admin_dashboard.php';
				</script>
			";
		}else if($inst_acesso==2){
			echo "
				<script type='text/javascript'>
					window.location.href = 'user/user_dashboard.php';
				</script>
			";
		}
	}
?>