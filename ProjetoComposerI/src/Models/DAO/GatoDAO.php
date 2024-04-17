<?php
namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Gato;

class GatoDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Gato $gato){
        try{

            $sql= "INSERT INTO  gato (nome,raca,dtNasc,cpf_tutor ) VALUES (:nome, :raca, :dtNasc, :cpf_tutor)";
            $p= $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $gato->getNome());
            $p->bindValue(":raca",$gato->getRaca());
            $p->bindValue(":dtNasc",$gato->getDtNasc());
            $p->bindValue(":cpf_tutor",$gato->getCPFTutor());
            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }
}