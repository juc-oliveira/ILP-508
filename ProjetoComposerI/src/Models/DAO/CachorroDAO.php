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
    public function alterar(Cachorro $cachorro){
        try{
            $sql = "UPDATE cachorro SET nome = :nome, raca = :raca, dtNasc = :dtNasc, cpf_tutor = :cpf_tutor
                    WHERE id_cachorro = :id_cachorro";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $cachorro->getNome());
            $p->bindValue(":raca",$cachorro->getRaca());
            $p->bindValue(":dtNasc",$cachorro->getDtNasc());
            $p->bindValue(":cpf_tutor",$cachorro->getCPFTutor());
            $p->bindValue(":id_cachorro", $cachorro->getIdCachorro());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id_cachorro){
        try{
            $sql = "DELETE FROM cachorro WHERE id_cachorro = :id_cachorro";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_cachorro", $id_cachorro);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM cachorro";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id_cachorro){
        try{
            $sql = "SELECT * FROM cachorro WHERE id_cachorro = :id_cachorro";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_cachorro", $id_cachorro);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }


}