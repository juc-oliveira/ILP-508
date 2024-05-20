<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\CachorroDAO;
use Php\Primeiroprojeto\Models\Domain\Cachorro;

class CachorroController{

    public function index($params){
        $cachorroDAO = new CachorroDAO();
        $resultado = $cachorroDAO->consultarTodos();
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
        require_once("../src/Views/cachorro/cachorro.php");
    }
    

    public function inserir($params){
        require_once("../src/Views/cachorro/inserir_cachorro.html");
    }

    public function novo($params){
        $cachorro = new Cachorro(0, $_POST['nome'], $_POST['raca'], $_POST['dtNasc'], $_POST['cpf_tutor']);
        $cachorroDAO = new CachorroDAO();
        if ($cachorroDAO->inserir($cachorro)){
            return "Cachorro cadastrado com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

    public function alterar($params){
        $cachorroDAO = new CachorroDAO();
        $resultado = $cachorroDAO->consultar($params[1]);
        require_once("../src/Views/cachorro/alterar_cachorro.php");
    }

    public function excluir($params){
        $cachorroDAO = new CachorroDAO();
        $resultado = $cachorroDAO->consultar($params[1]);
        require_once("../src/Views/cachorro/excluir_cachorro.php");
    }

    public function editar($params){
        $cachorro = new Cachorro($_POST['id_cachorro'], $_POST['nome'], $_POST['raca'], $_POST['dtNasc'], $_POST['cpf_tutor']);
        $cachorroDAO = new CachorroDAO();
        if ($cachorroDAO->alterar($cachorro)) {
            header("location: /cachorro/alterar/true");
        } else {
            header("location: /cachorro/alterar/false");
        }
    }

    public function deletar($params){
        $cachorroDAO = new CachorroDAO();
        if ($cachorroDAO->excluir($_POST['id_cachorro'])){
            header("location: /cachorro/excluir/true");
        } else {
            header("location: /cachorro/excluir/false");
        }
    }

}
