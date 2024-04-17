<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\GatoDAO;
use Php\Primeiroprojeto\Models\Domain\Gato;

class GatoController{

    public function inserir($params){
        require_once("../src/Views/gato/inserir_gato.html");
    }

    public function novo($params){
        $gato = new Gato(0, $_POST['nome'],  $_POST['raca'], $_POST['dtNasc'], $_POST['cpf_tutor']);
        $gatoDAO = new GatoDAO();
        if ($gatoDAO->inserir($gato)){
            return "Gato cadastrado com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
