<?php

class Cliente
{
  public $nome;
  public $cpf;
  public $email;
  public $password;
  public $cep;
  public $endereco;
  public $bairro;
  public $cidade;
  public $estado;

  function __construct($nome, $cpf, $email, $password, $cep, $endereco, $bairro, $cidade, $estado)
  {
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->email = $email;
    $this->password = $password;
    $this->cep = $cep;
    $this->endereco = $endereco;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
    $this->estado = $estado;
  }

  public function SalvaEmArquivo()
  {

    $arq = fopen("clientes.txt", "a");


    fwrite($arq, "{$this->nome};{$this->cpf};{$this->email};{$this->password};{$this->cep};{$this->endereco};{$this->bairro};{$this->cidade};{$this->estado}\n");


    fclose($arq);
  }
}


function carregaClientesDeArquivo()
{
  $arrayClientes = [];


  $arq = fopen("clientes.txt", "r");
  if (!$arq)
    return $arrayClientes;


  while (!feof($arq)) {

    $cliente = fgets($arq);


    list($nome, $cpf, $email, $password, $cep, $endereco, $bairro, $cidade, $estado) = array_pad(explode(';', $cliente), 3, null);


    $novoCliente = new Cliente($nome, $cpf, $email, $password, $cep, $endereco, $bairro, $cidade, $estado);
    $arrayClientes[] = $novoCliente;
  }

  fclose($arq);
  return $arrayClientes;
}
