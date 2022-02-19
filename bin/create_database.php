<?php
$servername = "localhost";
$username = "root";
$password = "";

function create_db($dbname) {
  global $servername, $username, $password;

  $conn = new mysqli($servername, $username, $password);

  if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
  } 

  $sql = "CREATE DATABASE $dbname";
  if ($conn->query($sql) === TRUE) {
    echo "DB criado com nome: " . $dbname . "<br>";
  } else {
    echo "Erro ao criar DB: " . $conn->error;
  }

  $conn->close();
}

function create_table($dbname, $email = null) {
  global $servername, $username, $password;

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
  }

  if($email) {
    $sql = "CREATE TABLE accounts (
      id INT AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(30) NOT NULL,
      email VARCHAR(255) NOT NULL,
      password VARCHAR(255) NOT NULL
    )";
  } else {
    $sql = "CREATE TABLE accounts (
      id INT AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(30) NOT NULL,
      password VARCHAR(255) NOT NULL
    )";
  }

  if ($conn->query($sql) === TRUE) {
    echo "Tabela accounts criada com successo" . "<br>";
  } else {
    echo "Erro ao criar tabela: " . $conn->error;
  }

  $conn->close();
}

function insert_data($dbname, $user, $pass, $email = null) {
  global $servername, $username, $password;

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
  }

  if ($email) {
    $sql = "INSERT INTO accounts (username, email, password)
    VALUES ('$user', '$email', '$pass')";

  } else {
    $sql = "INSERT INTO accounts (username, password)
    VALUES ('$user', '$pass')";
  }

  if ($conn->query($sql) === TRUE) {
    echo "Registro inserido!" . "<br>";
  } else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>