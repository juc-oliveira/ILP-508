<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\GatoDAO;
use Php\Primeiroprojeto\Models\Domain\Gato;

class GatoController{
    
    public function index($params){
        $gatoDAO = new GatoDAO();
        $resultado = $gatoDAO->consultarTodos();
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
        require_once("../src/Views/gato/gato.php");
    }
    


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
    public function alterar($params){
        $gatoDAO = new GatoDAO();
        $resultado = $gatoDAO->consultar($params[1]);
        require_once("../src/Views/gato/alterar_gato.php");
    }

    public function excluir($params){
        $gatoDAO = new GatoDAO();
        $resultado = $gatoDAO->consultar($params[1]);
        require_once("../src/Views/gato/excluir_gato.php");
    }

    public function editar($params){
        $gato = new Gato($_POST['id_gato'], $_POST['nome'], $_POST['raca'], $_POST['dtNasc'], $_POST['cpf_tutor']);
        $gatoDAO = new GatoDAO();
        if ($gatoDAO->alterar($gato)) {
            header("location: /gato/alterar/true");
        } else {
            header("location: /gato/alterar/false");
        }
    }

    public function deletar($params){
        $gatoDAO = new GatoDAO();
        if ($gatoDAO->excluir($_POST['id_gato'])){
            header("location: /gato/excluir/true");
        } else {
            header("location: /gato/excluir/false");
        }
    }

}
