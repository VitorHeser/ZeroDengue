<?php

	header('Content-type: application/json');

	require_once '../config.php';

	$response = array();

	if ($_POST) {

		// $endereco = $_POST['endereco'];
		// $descricao = $_POST['descricao'];
		// $foto =$_FILES['foto']['name'];

		// $user = $_SESSION['inst_id'];


		// /* Storing the profile picture in disk and doing validation */
        // /* -- Extracting file extensions and filename for renaming the file later on. */
        // $file_property = pathinfo($foto);
        // $pic_filename = $file_property['filename'];
        // $pic_file_extension = $file_property['extension'];
		// $directory .= $pic_filename.mt_rand().'.'.$pic_file_extension;

		//Moving file to the disk.
		// move_uploaded_file($_FILES['foto']['tmp_name'], $directory); 

		// $query = "INSERT INTO usuarios ('nome', 'user','email','password', 	'telefone', 'cpf', 'rg', 'bairro', 'cidade', 'estado', 'endereco') VALUES ('$full_name', '$login', '$user_email', '$hashed_password', '$tel', '$cpf', '$rg', '$bairro', '$cidade', '$estado', '$end') ";
		$query = "INSERT INTO denuncias VALUES 
		(NULL, 
		'sadsadasdasdsadas', 
		'asdasdasdasdasd', 
		'adsadsadasdasdasdasdasd', 
		1) ";
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
