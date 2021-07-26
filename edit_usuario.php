<?php
session_start();
include_once("connect.php");
$conn = connectToDatabase();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$getClientes = "SELECT * FROM clientes WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $getClientes);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>CRUD - Editar</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand text-dark" href="#">Crud Matheus</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">

				<li class="nav-item active">
					<a class="nav-link text-dark" href="listar.php">Voltar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" href="index.php">Início</a>
				</li>

			</ul>
		</div>
	</nav>

	<div class="container">
		<br>
		<h1>Editar Usuário</h1><br>
	</div>

	<?php

	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	?>

	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8 my-4">
			<form method="POST" action="processor_edit_usuario.php">
				<div class="form-group">
					<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
				</div>

				<div class="form-group">
					<label>Nome: </label>
					<input class="form-control" type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br>
				</div>

				<div class="form-group">
					<label>CPF: </label>
					<input class="form-control" type="text" name="cpf" placeholder="Digite o seu CPF" value="<?php echo $row_usuario['cpf']; ?>"><br>
				</div>

				<div class="form-group">
					<label>E-mail: </label>
					<input class="form-control" type="email" name="email" placeholder="Digite o seu e-mail" value="<?php echo $row_usuario['email']; ?>"><br>
				</div>

				<div class="form-group">
					<label>Telefone: </label>
					<input class="form-control" type="text" name="telefone" placeholder="Digite seu telefone" value="<?php echo $row_usuario['telefone']; ?>"><br>
				</div>
				<input class="btn btn-primary" type="submit" value="editar">
			</form>
		</div>
	</div>
	</div>
</body>

</html>