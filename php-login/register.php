<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'login';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
	exit('Falha ao conectar ao MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	exit('Prencha os campos do formulário!');
}
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	exit('Prencha os campos do formulário!');
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
  // validando credenciais
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Email não é valido!');
  }
  if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
    exit('Nome de usuário inválido!');
  }
  if (strlen($_POST['password']) < 5) {
    exit('Senha deve ter mais 5 caracteres!');
  }

	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
  // verifica se a conta já existe no banco de dados
	if ($stmt->num_rows > 0) {
		echo 'Esse nome de usuário já existe!';
	} else {
    // usuário não existe, adicona novo usuário
    if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)')) {

      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
      $stmt->execute();
      echo 'Conta criada com sucesso!';
      sleep(8);
      header('Location: ../index.html');
    } else {
      echo 'Não foi possível concluir o cadastro!';
}
	}
	$stmt->close();
} else {
	echo 'Não foi possível concluir o cadastro!';
}
$con->close();
?>