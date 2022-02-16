<?php
$dados = $_POST;
$con = mysqli_connect('localhost', 'root', '');
$bd = mysqli_select_db($con, 'agendamento');
mysqli_set_charset($con, 'utf8');

$result = mysqli_query($con, "SELECT max(id) as next FROM funcionario");
$next = (int) mysqli_fetch_assoc($result)['next'] + 1;

$sql = "INSERT INTO funcionario (id, nome, idade, email) 
  VALUES ('{$next}', '{$dados['nome']}', '{$dados['idade']}', '{$dados['email']}')";

$result = mysqli_query($con, $sql);

if ($result) {
  print 'Registro inserido' . '<br>';
} else {
  print 'Errro';
}

mysqli_close($con);

?>
