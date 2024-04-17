<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Cavalo{
    private $id_cavalo;
    private $nome;
    private $raca;
    private $dtNasc;
    private $cpf_tutor;
    public function __construct($id_cavalo, $nome, $raca, $dtNasc, $cpf_tutor){
        $this->setIdCavalo ($id_cavalo);
        $this->setNome ($nome);
        $this->setRaca ($raca);
        $this->setDtNasc ($dtNasc);
        $this->setCPFTutor ($cpf_tutor);
    }
    public function getIdCavalo(){
        return $this->id_cavalo;
}
public function setIdCavalo($id_cavalo){
    $this->id_cavalo = $id_cavalo;
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