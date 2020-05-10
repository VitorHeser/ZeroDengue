<?php

	header('Content-type: application/json');

	require_once 'config.php';

	$response = array();

	if ($_POST) {

		$name = trim($_POST['nome']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$inst_id = uniqid();

		$full_name = strip_tags($name);
		$user_email = strip_tags($email);
		$user_pass = strip_tags($password);
		$login = $_POST['login'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];
		$end = $_POST['end'];
		$cidade = $_POST['cidade'];
		$bairro = $_POST['bairro'];
		$estado = $_POST['estado'];
		$tel = $_POST['tel'];

		//Password hashing
		$hashed_password = password_hash($user_pass, PASSWORD_DEFAULT);

		// $user_picture = $_FILES['profile_picture']['name'];


		// /* Storing the profile picture in disk and doing validation */
        // /* -- Extracting file extensions and filename for renaming the file later on. */
        // $file_property = pathinfo($user_picture);
        // $pic_filename = $file_property['filename'];
        // $pic_file_extension = $file_property['extension'];
		// $directory .= $pic_filename.mt_rand().'.'.$pic_file_extension;

		// //Moving file to the disk.
		// move_uploaded_file($_FILES['profile_picture']['tmp_name'], $directory); 

		// $query = "INSERT INTO usuarios ('nome', 'user','email','password', 	'telefone', 'cpf', 'rg', 'bairro', 'cidade', 'estado', 'endereco') VALUES ('$full_name', '$login', '$user_email', '$hashed_password', '$tel', '$cpf', '$rg', '$bairro', '$cidade', '$estado', '$end') ";
		$query = "INSERT INTO usuarios VALUES 
		(NULL, 
		'$login', 
		'$hashed_password', 
		 2,
		'$full_name', 
		'$tel', 
		'$cpf', 
		'$rg', 
		'$user_email', 
		'$bairro', 
		'$cidade', 
		'$estado', 
		'$end'
		) ";
		$stmt =  mysqli_query($link, $query);

		// check for successful registration
        if ($stmt) {
			$response['status'] = 'success';
			$response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp; Obrigado por se cadastrar! Faça seu login agora.';
        } else {
            $response['status'] = 'error'; // could not register
			$response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Não foi possivel realizar seu cadastro, tente novamente mais tarde!.';
        }
	}

	echo json_encode($response);
?>
