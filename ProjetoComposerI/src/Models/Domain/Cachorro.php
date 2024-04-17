<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Cachorro{
    private $id_cachorro;
    private $nome;
    private $raca;
    private $dtNasc;
    private $cpf_tutor;
    public function __construct($id_cachorro, $nome, $raca, $dtNasc, $cpf_tutor){
        $this->setIdCachorro ($id_cachorro);
        $this->setNome ($nome);
        $this->setRaca ($raca);
        $this->setDtNasc ($dtNasc);
        $this->setCPFTutor ($cpf_tutor);
    }
    public function getIdCachorro(){
        return $this->id_cachorro;
}
public function setIdCachorro($id_cachorro){
    $this->id_cachorro = $id_cachorro;
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