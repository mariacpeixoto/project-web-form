<?php
require_once("controller/ControllerCadastro.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover"> 
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/estilo.css">
        <script src="js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="js/funcoes.js"></script>
        <title>Sistema de Agendamento - Clientes</title>
    </head>
    <body>
      <div class="container">
        <div class="row">
          <nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12">
            <a class="navbar-brand" href="#">SISTEMA WEB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Cadastrar<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consultarClientes.html">Consultar</a>
                </li>
              </ul>
            </div>
          </nav>  
        </div>
        <div class="row">
          <div class="card mb-3 col-12">
            <div class="card-body">
              <h5 class="card-title">Editar - Agendamento de Potenciais Clientes</h5>
              <p class="card-text">Sistema utilizado para agendamento de serviços.</p>
              <p>
              <?php
                 $controller = new ControllerCadastro();
                 $resultado = $controller->listar($_GET['id']);
              ?>
              <form method="post" action="controller/ControllerCadastro.php?funcao=editar&id=<?php echo $resultado[0]['id']; ?>" id="form" name="form">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Nome:</label>
                    <input type="text" class="form-control" name="txtNome" required id="txtNome" value="<?php echo $resultado[0]['nome']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Telefone:</label>
                    <input type="tel" class="form-control" required name="txtTelefone" id="txtTelefone" placeholder="(xx)xxxxx-xxxx" value="<?php echo $resultado[0]['telefone']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Origem:</label>
                    <select class="form-control" required name="txtOrigem" id="txtOrigem">
                      <option <?php if($resultado[0]['origem'] == "Celular"){echo "selected";} ?>>Celular</option>
                      <option <?php if($resultado[0]['origem'] == "Fixo"){echo "selected";} ?>>Fixo</option>
                      <option <?php if($resultado[0]['origem'] == "Whatsapp"){echo "selected";} ?>>Whatsapp</option>
                      <option <?php if($resultado[0]['origem'] == "Facebook"){echo "selected";} ?>>Facebook</option>
                      <option <?php if($resultado[0]['origem'] == "Instagram"){echo "selected";} ?>>Instagram</option>
                      <option <?php if($resultado[0]['origem'] == "Google Meu Negocio"){echo "selected";} ?>>Google Meu Negocio</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Data do Contato:</label>
                    <input type="date" class="form-control" required name="txtDataContato" id="txtDataContato" value="<?php echo $resultado[0]['data_contato']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Observação</label>
                    <textarea class="form-control" name="txtObservacao" id="txtObservacao" rows="3"><?php echo $resultado[0]['observacao']; ?></textarea>
                  </div>
                  <button type="submit" id="btnInserir" class="btn btn-primary">Editar</button>
                </form>
              </p>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>