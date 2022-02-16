<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phpadmin';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno() ) {
	exit('Falha ao conectar ao MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['username'], $_POST['password']) ) {
	exit('Prencha os campos do formulário.');
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();

  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password);
    $stmt->fetch();

    // Conta existe, agora verifica a senha.
    if (password_verify($_POST['password'], $password)) {
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['name'] = $_POST['username'];
      $_SESSION['id'] = $id;
      header('Location: ../dashboard.html');
    } else {
      echo 'Senha e/ou Usuário incorretos';
    }
  } else {
    echo 'Senha e/ou Usuário incorretos';
  }

	$stmt->close();
}
?>