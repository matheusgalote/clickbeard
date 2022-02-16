<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Novo Funcionario</title>
</head>
<body>
  <form action="insert_funcionario.php" method="post">
    <label for="id">Codigo</label>
    <input type="text" name="id" readonly="1">
    <label for="nome">Nome</label>
    <input type="text" name="nome">
    <label for="idade">Idade</label>
    <input type="number" name="idade">
    <label for="email">Email</label>
    <input type="email" name="email">
    <input type="submit">
  </form>
</body>
</html>