<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Cliente{
    private $id_cliente;
    private $nome;
    private $cpf;
    private $telefone;
    public function __construct($id_cliente, $nome, $cpf, $telefone){
        $this->setIdCliente ($id_cliente);
        $this->setNomeCliente ($nome);
        $this->setCPFCliente ($cpf);
        $this->setTelefoneCliente ($telefone);
    }
    public function getIdCliente(){
        return $this->id_cliente;
}
public function setIdCliente($id_cliente){
    $this->id_cliente = $id_cliente;
}
public function getNomeCliente(){
    return $this->nome;
}
public function setNomeCliente($nome){
     $this->nome = $nome;
}
public function getCPFCliente(){
    return $this->cpf;
}
public function setCPFCliente($cpf){
    $this->cpf = $cpf;
}
public function getTelefoneCliente(){
    return $this->telefone;
}
public function setTelefoneCliente($telefone){
    $this->telefone = $telefone;
}
}