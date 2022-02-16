<?php
$dados = $_POST;
$con = mysqli_connect('localhost', 'root', '');
$bd = mysqli_select_db($con, 'agendamento');
mysqli_set_charset($con, 'utf8');

$sql = "INSERT INTO especialidades (id_funcionario, id_servico) 
  VALUES ('{$dados['id_funcionario']}, '{$dados['id_servico']}')";

$result = mysqli_query($con, $sql);

if ($result) {
  print 'Registro inserido' . '<br>';
} else {
  print 'Erro';
}

mysqli_close($con);
?>

