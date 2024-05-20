<?php
namespace Php\Primeiroprojeto\Models\DAO;
use Php\Primeiroprojeto\Models\Domain\Cliente;

class ClienteDAO{
    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }
    public function inserir(Cliente $cliente){
        try{

            $sql= "INSERT INTO  cliente (nome,cpf,telefone ) VALUES (:nome, :cpf, :telefone)";
            $p= $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $cliente->getNomeCliente());
            $p->bindValue(":cpf",$cliente->getCPFCliente());
            $p->bindValue(":telefone",$cliente->getTelefoneCliente());

            return $p->execute();
        }
        catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(Cliente $cliente){
        try{
            $sql = "UPDATE cliente SET nome = :nome, cpf = :cpf, telefone = :telefone
                    WHERE id_cliente = :id_cliente";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $cliente->getNomeCliente());
            $p->bindValue(":cpf",$cliente->getCPFCliente());
            $p->bindValue(":telefone",$cliente->getTelefoneCliente());
            $p->bindValue(":id_cliente", $cliente->getIdCliente());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id_cliente){
        try{
            $sql = "DELETE FROM cliente WHERE id_cliente = :id_cliente";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_cliente", $id_cliente);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM cliente";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id_cliente){
        try{
            $sql = "SELECT * FROM cliente WHERE id_cliente = :id_cliente";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_cliente", $id_cliente);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

}