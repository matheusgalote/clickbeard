<?php
session_start();

require_once('../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DATABASE_HOST'];
$db_user = $_ENV['DATABASE_USER'];
$db_pass = $_ENV['DATABASE_PASS'];
$db_name = $_ENV['DATABASE_NAME'];

$con = mysqli_connect($host, $db_user, $db_pass, $db_name);

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
      header('Location: home.php');
    } else {
      echo 'Senha e/ou Usuário incorretos';
    }
  } else {
    echo 'Senha e/ou Usuário incorretos';
  }

	$stmt->close();
}
?>