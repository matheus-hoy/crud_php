<?php
require('connect.php');
function session($valor)
{
  if (isset($_SESSION[$valor])) {
    echo $_SESSION[$valor];
    unset($_SESSION[$valor]);
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Crud - Matheus</title>
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
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 my-4">


        <h3>Cadastro de usuário</h3>

        <form class="form" id="formulario" method="post" action="processor.php">


          <div class="form-group">
            <label>Nome</label><br><input class="form-control" type="text" name="nome" placeholder="Digite o nome completo"><br>
            <?php
            session("ERROR_NOME");
            ?>
          </div>
          <div class="form-group">
            <label>CPF</label><br><input class="form-control" type="text" name="cpf" placeholder="Digite o CPF"><br>
            <?php
            session("ERROR_CPF");
            ?>
          </div>

          <label>E-mail</label><br><input class="form-control" type="text" name="email" placeholder="Digite o E-mail"><br>
          <?php
          session("ERROR_EMAIL");
          ?>
          <label>Telefone</label><br><input class="form-control" type="text" name="telefone" placeholder="Digite o telefone"><br>
          <?php
          session("ERROR_TELEFONE");
          ?>
          <label>Criado</label><br><input class="form-control" type="date" name="criado"><br>
          <label>Atualizado</label><br><input class="form-control" type="date" name="atualizado"><br>


          <input class="btn btn-primary" type="submit" value="cadastrar-se">
        </form>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>