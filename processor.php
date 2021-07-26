<?php
include_once("connect.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);

if (empty($nome) && empty($cpf) && empty($email) && empty($telefone)) {
  echo "preencha todos os campos";
}
if (empty($nome)) {
  $_SESSION["ERROR_NOME"] = "Preencha seu nome!";
  header("Location: index.php");
  die;
}
if (empty($cpf)) {
  $_SESSION["ERROR_CPF"] = "Preencha seu CPF!";
  header("Location: index.php");
  die;
}
if (empty($email)) {
  $_SESSION["ERROR_EMAIL"] = "Preencha seu e-mail!";
  header("Location: index.php");
  die;
}
if (empty($telefone)) {
  $_SESSION["ERROR_TELEFONE"] = "Preencha seu telefone!";
  header("Location: index.php");
  die;
}

$result_usuario = "INSERT INTO clientes (nome, email, cpf, telefone) VALUES('$nome', '$email', '$cpf', '$telefone')";
$resultado_usuario = mysqli_query(connectToDatabase(), $result_usuario);

header("Location:index.php");
