<?php
namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Cavalo;

class CavaloDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Cavalo $cavalo){
        try{

            $sql= "INSERT INTO  cavalo (nome,raca,dtNasc,cpf_tutor) VALUES (:nome, :raca, :dtNasc, :cpf_tutor)";
            $p= $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $cavalo->getNome());
            $p->bindValue(":raca",$cavalo->getRaca());
            $p->bindValue(":dtNasc",$cavalo->getDtNasc());
            $p->bindValue(":cpf_tutor",$cavalo->getCPFTutor());
            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }
}