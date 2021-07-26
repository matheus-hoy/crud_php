<?php
session_start();
include_once("connect.php");
$conn = connectToDatabase();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$result_usuario = "DELETE FROM clientes WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
		header("Location: listar.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
		header("Location: listar.php");
	}
