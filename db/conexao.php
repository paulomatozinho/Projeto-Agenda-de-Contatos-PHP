<?php
include("config.php");

$conexao = mysqli_connect(SERVIDOR, USUARIO, SENHA, BANCO) or die("Erro de Conexão" . mysqli_connect_error());

