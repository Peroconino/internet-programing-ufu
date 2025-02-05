<?php

require "usuarios.php";

// coleta os dados do formulário
$usuario = $_POST["usuario"] ?? "";
$password = $_POST["senha"] ?? "";


// cria um novo contato e acrescenta no arquivo de texto
$novoUsuario = new Usuario($usuario, password_hash($password, PASSWORD_BCRYPT));
$novoUsuario->SalvaEmArquivo();

// redireciona o navegador para a página de listagem de contatos
header("location: listarUsuariosCadastrados.php");
