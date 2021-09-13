<?php

date_default_timezone_set('America/Sao_Paulo');

define('BD_SERVIDOR','localhost');
define('BD_USUARIO','root');
define('BD_SENHA','');
define('BD_BANCO','projetoweb');

class Banco{
    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }
    private function conexao(){
        $this->msqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
    }
    public function setAgendamentos($nome,$telefone,$origem,$data_contato,$observacao){
        $stmt = $this->mysqli->prepare("INSERT INTO agendamentos(`nome`, `telefone`, `origem`, `data_contato`, `obsevacao`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",$nome,$telefone,$origem,$data_contato,$observacao);
        if($stmt->execute() == TRUE){
            return true;
        }else{
            return false;
        }
    }
}
?>