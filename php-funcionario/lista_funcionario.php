<?php
function lista_funcionario($id = null) {
  $output = '';
  $con = mysqli_connect('localhost', 'root', '');
  $bd = mysqli_select_db($con, 'agendamento');
  mysqli_set_charset($con, 'utf8');

  $sql = mysqli_query($con, "SELECT id, nome FROM funcionario") or die("Erro");

  if ($sql) {
    while ($dados = mysqli_fetch_assoc($sql)) {
      $check = ($dados['id'] == $id) ? 'selected=1' : '';
      $output .= "<option $check value='{$dados['id']}'>{$dados['nome']}</option>\n";
    }
  }

  mysqli_close($con);
  return $output;
}
?>