<?php

    ini_set ('log_errors', 'on'); //Logging errors
    
    header('Content-type: application/json');

    $response = array();

    session_start();

    require_once 'config.php';

    $inst_user = mysqli_real_escape_string($link, $_POST['instuser']);
    $inst_password = mysqli_real_escape_string($link, $_POST['instPassword']); 

    $query = "SELECT `id`, `nome`, `password` FROM `usuarios` WHERE (`user`='$inst_user')";
    $execute_query = mysqli_query($link, $query);
    $get_row = mysqli_fetch_assoc($execute_query);

    $inst_id = $get_row['id'];
    $hashed_db_password = $get_row['password'];

    /*Comparing the entered password with the one in the database, and returning a boolean value.*/
    $isCorrectPassword = password_verify($inst_password, $hashed_db_password);

	// check for successful validation
    if (($execute_query) && ($isCorrectPassword)) {

        $_SESSION['inst_id'] = $inst_id;
        $_SESSION['nome'] = $get_row['nome'];
		$response['status']  = 'success';
		$response['message'] = '<span class="glyphicon glyphicon-ok"></span> Conta Verificada!';
    } else {
        $response['status']  = 'error'; // could not log in
        $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp;Email ou Senha errada! Tenta novamente.';
    }

    mysqli_close ($link);
    echo json_encode($response);
?>