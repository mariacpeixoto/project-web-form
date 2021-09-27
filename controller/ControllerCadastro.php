<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/project-web/model/cadastro.php");

class ControllerCadastro{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Cadastro();
        if(isset($_GET['funcao']) && $_GET['funcao'] == "cadastro"){
            $this->incluir();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "editar"){
            $this->editar($_GET['id']);
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

    public function listar($id){
        return $result = $this->cadastro->listar($id);
    }
    private function editar($id){
        $this->cadastro->setId($id);
        $this->cadastro->setNome($_POST['txtNome']);
        $this->cadastro->setTelefone($_POST['txtTelefone']);
        $this->cadastro->setOrigem($_POST['txtOrigem']);
        $this->cadastro->setData_contato(date('Y-m-d',strtotime($_POST['txtDataContato'])));
        $this->cadastro->setObservacao($_POST['txtObservacao']);
        $result = $this->cadastro->editar();
        if($result >= 1){
            echo "<script>alert('Registro alterado com sucesso!');document.location='../consultarClientes.php'</script>";
        }else{
            echo "<script>alert('Erro ao alterar registro!');</script>";
        }
    }
}
new ControllerCadastro();
?>