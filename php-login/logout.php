<?php
session_start();
session_destroy();

// Redireciona para página inicial
header('Location: ../index.html');
?>