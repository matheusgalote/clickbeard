<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <form action="insert_especialidade.php" method="post">
    <label for="id_fun">Funcionario</label>
    <select name="id_funcionario">
    <?php 
      require_once 'lista_funcionario.php';
      print lista_funcionario();
    ?>
    </select>
    <label for="id_ser">Serviço</label>
    <select name="id_servico">
    <?php 
      require_once 'lista_profissoes.php';
      print lista_profissoes();
    ?>
    </select>
    <input type="submit">
  </form>
</body>
</html>