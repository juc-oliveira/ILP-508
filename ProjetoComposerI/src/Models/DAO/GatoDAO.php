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
    
    public function alterar(Gato $gato){
        try{
            $sql = "UPDATE gato SET nome = :nome, raca = :raca, dtNasc = :dtNasc, cpf_tutor = :cpf_tutor
                    WHERE id_gato = :id_gato";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $gato->getNome());
            $p->bindValue(":raca",$gato->getRaca());
            $p->bindValue(":dtNasc",$gato->getDtNasc());
            $p->bindValue(":cpf_tutor",$gato->getCPFTutor());
            $p->bindValue(":id_gato", $gato->getIdGato());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id_gato){
        try{
            $sql = "DELETE FROM gato WHERE id_gato = :id_gato";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_gato", $id_gato);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM gato";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id_gato){
        try{
            $sql = "SELECT * FROM gato WHERE id_gato = :id_gato";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_gato", $id_gato);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

}