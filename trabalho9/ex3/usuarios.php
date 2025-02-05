<?php

class Usuario
{
  public $usuario;
  public $password;

  function __construct($usuario, $password)
  {
    $this->usuario = $usuario;
    $this->password = $password;
  }

  public function SalvaEmArquivo()
  {

    $arq = fopen("usuarios.txt", "a");


    fwrite($arq, "{$this->usuario};{$this->password};\n");


    fclose($arq);
  }
}


function carregaUsuariosDeArquivo()
{
  $arrayUsuarios = [];


  $arq = fopen("usuarios.txt", "r");
  if (!$arq)
    return $arrayUsuarios;


  while (!feof($arq)) {

    $usuario = fgets($arq);


    list($usuario, $password) = array_pad(explode(';', $usuario), 3, null);


    $novoUsuario = new Usuario($usuario, $password);
    $arrayUsuarios[] = $novoUsuario;
  }

  fclose($arq);
  return $arrayUsuarios;
}

function verificaUsuario($usuarioProcurado, $senha)
{
  $usuarios = carregaUsuariosDeArquivo();
  foreach ($usuarios as $usuario) {
    if ($usuario->usuario === $usuarioProcurado) {
      return password_verify($senha, $usuario->password);
    }
  }
  return false;
}
