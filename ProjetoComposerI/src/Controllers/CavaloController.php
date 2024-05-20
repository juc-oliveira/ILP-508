<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\CavaloDAO;
use Php\Primeiroprojeto\Models\Domain\Cavalo;

class CavaloController{

    public function index($params){
        $cavaloDAO = new CavaloDAO();
        $resultado = $cavaloDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true")
            $mensagem = "Registro inserido com sucesso!";
        elseif($acao == "inserir" && $status == "false")
            $mensagem = "Erro ao inserir!";
        elseif($acao == "alterar" && $status == "true")
            $mensagem = "Registro alterado com sucesso!";
        elseif($acao == "alterar" && $status == "false")
            $mensagem = "Erro ao alterar!";
        elseif($acao == "excluir" && $status == "true")
            $mensagem = "Registro excluído com sucesso!";
        elseif($acao == "excluir" && $status == "false")
            $mensagem = "Erro ao excluir!";
        else 
            $mensagem = "";
        require_once("../src/Views/cavalo/cavalo.php");
    }
    
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
    
    public function alterar($params){
        $cavaloDAO = new CavaloDAO();
        $resultado = $cavaloDAO->consultar($params[1]);
        require_once("../src/Views/cavalo/alterar_cavalo.php");
    }

    public function excluir($params){
        $cavaloDAO = new CavaloDAO();
        $resultado = $cavaloDAO->consultar($params[1]);
        require_once("../src/Views/cavalo/excluir_cavalo.php");
    }

    public function editar($params){
        $cavalo = new Cavalo($_POST['id_cavalo'], $_POST['nome'], $_POST['raca'], $_POST['dtNasc'], $_POST['cpf_tutor']);
        $cavaloDAO = new CavaloDAO();
        if ($cavaloDAO->alterar($cavalo)) {
            header("location: /cavalo/alterar/true");
        } else {
            header("location: /cavalo/alterar/false");
        }
    }

    public function deletar($params){
        $cavaloDAO = new CavaloDAO();
        if ($cavaloDAO->excluir($_POST['id_cavalo'])){
            header("location: /cavalo/excluir/true");
        } else {
            header("location: /cavalo/excluir/false");
        }
    }


}
