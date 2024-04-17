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
}