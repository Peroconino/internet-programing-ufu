<?php

require "usuarios.php";

$usuario = $_POST["usuario"] ?? "";
$password = $_POST["senha"] ?? "";

if (verificaUsuario($usuario, $password))
  header("location: sucesso.html");
else
  header("location: login.html");


