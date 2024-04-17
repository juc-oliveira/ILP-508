<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Gato{
    private $id_gato;
    private $nome;
    private $raca;
    private $dtNasc;
    private $cpf_tutor;
    public function __construct($id_gato, $nome, $raca, $dtNasc, $cpf_tutor){
        $this->setIdGato ($id_gato);
        $this->setNome ($nome);
        $this->setRaca ($raca);
        $this->setDtNasc ($dtNasc);
        $this->setCPFTutor ($cpf_tutor);
    }
    public function getIdGato(){
        return $this->id_gato;
}
public function setIdGato($id_gato){
    $this->id_gato = $id_gato;
}
public function getNome(){
    return $this->nome;
}
public function setNome($nome){
     $this->nome = $nome;
}
public function getRaca(){
    return $this->raca;
}
public function setRaca($raca){
     $this->raca = $raca;
}
public function getDtNasc(){
    return $this->dtNasc;
}
public function setDtNasc($dtNasc){
     $this->dtNasc = $dtNasc;
}
public function getCPFTutor(){
    return $this->cpf_tutor;
}
public function setCPFTutor($cpf_tutor){
    $this->cpf_tutor = $cpf_tutor;
}
}