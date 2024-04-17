<?php
namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Cachorro;

class CachorroDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Cachorro $cachorro){
        try{

            $sql= "INSERT INTO  cachorro (nome,raca,dtNasc,cpf_tutor ) VALUES (:nome, :raca, :dtNasc, :cpf_tutor)";
            $p= $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $cachorro->getNome());
            $p->bindValue(":raca",$cachorro->getRaca());
            $p->bindValue(":dtNasc",$cachorro->getDtNasc());
            $p->bindValue(":cpf_tutor",$cachorro->getCPFTutor());
            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }
}