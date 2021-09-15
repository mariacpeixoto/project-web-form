<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/project-web/model/cadastro.php");

class ControllerCadastro{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Cadastro();
        if(isset($_GET['funcao']) && $_GET['funcao'] == "cadastro"){
            $this->incluir();
        }
    }

    private function incluir(){
        $this->cadastro->setNome($_POST['txtNome']);
        $this->cadastro->setTelefone($_POST['txtTelefone']);
        $this->cadastro->setOrigem($_POST['txtOrigem']);
        $this->cadastro->setData_contato(date('Y-m-d',strtotime($_POST['txtDataContato'])));
        $this->cadastro->setObservacao($_POST['txtObservacao']);
        $result = $this->cadastro->incluir();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');</script>";
        }
    }

    public function listar(){
        return $result = $this->cadastro->listar();
    }
}
new ControllerCadastro();
?>