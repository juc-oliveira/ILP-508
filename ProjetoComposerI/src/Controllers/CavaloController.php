<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\CavaloDAO;
use Php\Primeiroprojeto\Models\Domain\Cavalo;

class CavaloController{

    public function inserir($params){
        require_once("../src/Views/cavalo/inserir_cavalo.html");
    }

    public function novo($params){
        $cavalo = new Cavalo(0, $_POST['nome'],  $_POST['raca'], $_POST['dtNasc'], $_POST['cpf_tutor']);
        $cavaloDAO = new CavaloDAO();
        if ($cavaloDAO->inserir($cavalo)){
            return "Cavalo cadastrado com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
