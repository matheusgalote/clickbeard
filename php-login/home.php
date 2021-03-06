<?php
session_start();

if(!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/auth.css"  type="text/css">
</head>
<body>
	<header class="header">
		<nav class="nav">
		<a href="#"><img src="../img/logo.svg"></a>
      <div>
        <a href="profile.php"><i class="fas fa-user-circle"></i>Perfil</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				<a href="../agendamento.html"><i class="fas fa-solid fa-calendar-check"></i>Agendar</a>
      </div>
		</nav>
	</header>

	<section class="loggedin">
		<div class="content">
			<h2>Home Page</h2>
			<p>Bem-vindo, <?=$_SESSION['name']?>!</p>
		</div>
	</section>
	<!-- </header>
  <section class="loggedin"> 
    <nav class="navtop">
			<a href="#"><img src="../img/logo.svg"></a>
      <div>
        <a href="profile.php"><i class="fas fa-user-circle"></i>Perfil</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
      </div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Bem-vindo, <?=$_SESSION['name']?>!</p>
		</div>
  </section> -->
</body>
</html>