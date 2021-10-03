<?php
require_once("banco.php");

class Cadastro extends Banco {

    private $id;
    private $nome;
    private $telefone;
    private $origem;
    private $data_contato;
    private $observacao;

    //Metodos Set
    public function setId($string){
        $this->id = $string;
    }
    public function setNome($string){
        $this->nome = $string;
    }
    public function setTelefone($string){
        $this->telefone = $string;
    }
    public function setOrigem($string){
        $this->origem = $string;
    }
    public function setData_contato($string){
        $this->data_contato = $string;
    }
    public function setObservacao($string){
        $this->observacao = $string;
    }

    //Metodos Get
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getOrigem(){
        return $this->origem;
    }
    public function getData_contato(){
        return $this->data_contato;
    }
    public function getObservacao(){
        return $this->observacao;
    }

    public function incluir(){
        return $this->setAgendamentos($this->getNome(),$this->getTelefone(),$this->getOrigem(),$this->getData_contato(),$this->getObservacao());
    }

    public function listar($id){
    	return $this->getAgendamentos($id);
    }

    public function editar(){
        return $this->updateAgendamentos($this->getId(),$this->getNome(),$this->getTelefone(),$this->getOrigem(),$this->getData_contato(),$this->getObservacao());
    }

    public function excluir($id){
        return $this->deleteAgendamentos($id);
    }
}
?>