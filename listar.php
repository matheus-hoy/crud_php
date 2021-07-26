<?php
session_start();
require_once("connect.php");
$connect = connectToDatabase();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Listagem</title>
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
          <a class="nav-link text-dark" href="listar.php">Listar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index.php">Cadastrar</a>
        </li>

      </ul>

    </div>
  </nav>

  <div class="container">
    <br>
    <h1>Listar Usuário</h1>
  </div>

  <?php
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  //Receber o número da página
  $currentPage = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);

  $page = (!empty($currentPage)) ? $currentPage : 1;

  //Quantiadade de itens por página
  $resultForPage = 3;

  //Calcular inicio da visualização
  $beginning = ($resultForPage * $page) - $resultForPage;

  $getClientes =  "SELECT * FROM clientes LIMIT $beginning, $resultForPage";
  $result_getClientes = mysqli_query($connect, $getClientes);
  ?>
  <div class="container">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>CPF</th>
          <th>E-mail</th>
          <th>Telefone</th>
          <th> </th>
          <th class="text-right"> </th>
        </tr>
      </thead>

      <tbody>

        <?php
        while ($row_usuario = mysqli_fetch_assoc($result_getClientes)) {
        ?>
          <tr>
            <td><?php echo $row_usuario['id']; ?></td>
            <td><?php echo $row_usuario['nome']; ?></td>
            <td><?php echo $row_usuario['cpf']; ?></td>
            <td><?php echo $row_usuario['email']; ?></td>
            <td><?php echo $row_usuario['telefone']; ?></td>
            <td><?php echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a>"; ?></td>
            <td><?php echo "<a href='apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><br>"; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php
  //Paginação - Somar a quantidade de clientes
  $getNumberIds = "SELECT COUNT(id) AS result_number FROM clientes";
  $resultNumberIds = mysqli_query($connect, $getNumberIds);
  $rowPage = mysqli_fetch_assoc($resultNumberIds);
  //echo $rowPage['result_number'];

  //Quantidade de página 
  $amountOfPage = ceil($rowPage['result_number'] / $resultForPage);

  //Página anterior/atual/última
  $maxLinks = 2;
  echo " <a href = 'listar.php?pagina=1'>Primeira </a> ";

  for ($previousPage = $page - $maxLinks; $previousPage <= $page - 1; $previousPage++) {
    if ($previousPage >= 1)
      echo " <a href = 'listar.php?pagina=$previousPage'>$previousPage</a>";
  }
  echo " $currentPage ";

  for ($nextPage = $page + 1; $nextPage <= $page + $maxLinks; $nextPage++) {
    if ($nextPage <= $amountOfPage) {
      echo " <a href = 'listar.php?pagina=$nextPage'>$nextPage</a>";
    }
  }

  echo "<a href = 'listar.php?
pagina=$amountOfPage'> última </a>";

  ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>