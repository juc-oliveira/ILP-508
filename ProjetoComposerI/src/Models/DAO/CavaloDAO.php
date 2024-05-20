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
    public function alterar(Cavalo $cavalo){
        try{
            $sql = "UPDATE cavalo SET nome = :nome, raca = :raca, dtNasc = :dtNasc, cpf_tutor = :cpf_tutor
                    WHERE id_cavalo = :id_cavalo";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $cavalo->getNome());
            $p->bindValue(":raca",$cavalo->getRaca());
            $p->bindValue(":dtNasc",$cavalo->getDtNasc());
            $p->bindValue(":cpf_tutor",$cavalo->getCPFTutor());
            $p->bindValue(":id_cavalo", $cavalo->getIdCavalo());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id_cavalo){
        try{
            $sql = "DELETE FROM cavalo WHERE id_cavalo = :id_cavalo";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_cavalo", $id_cavalo);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM cavalo";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id_cavalo){
        try{
            $sql = "SELECT * FROM cavalo WHERE id_cavalo = :id_cavalo";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_cavalo", $id_cavalo);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

}