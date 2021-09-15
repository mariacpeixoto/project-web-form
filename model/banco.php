<?php

//timezone

date_default_timezone_set('America/Sao_Paulo');

// conexão com o banco de dados

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
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function setAgendamentos($nome,$telefone,$origem,$data_contato,$observacao){
        $stmt = $this->mysqli->prepare("INSERT INTO agendamentos (`nome`, `telefone`, `origem`, `data_contato`, `observacao`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",$nome,$telefone,$origem,$data_contato,$observacao);
        if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }
    public function getAgendamentos() {
        try {
            $stmt = $this->mysqli->query("SELECT * FROM agendamentos;");
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;
            foreach ($lista as $l) {
                $f_lista[$i]['nome'] = $l['nome'];
                $f_lista[$i]['telefone'] = $l['telefone'];
                $f_lista[$i]['origem'] = $l['origem'];
                $f_lista[$i]['data_contato'] = $l['data_contato'];
                $f_lista[$i]['observacao'] = $l['observacao'];
                $i++;
            }
            return $f_lista;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
}    
?>
