<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Academia</title>
</head>
<body>
    
    



    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Academia</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="cliente.php">Cliente</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="pagamento.php">Pagamento</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      

  <form action="cliente.php" method="POST">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">codigo</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="codigo">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nome</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nome">  
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">telefone</label>
      <input type="number" class="form-control" id="exampleInputPassword1" name="telefone">
    </div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Data</label>
      <input type="date" class="form-control" id="exampleInputPassword1" name="data">
    </div>
    <button type="submit" class="btn btn-primary" name="acao" value="inserir">Inserir</button>
    <button type="submit" class="btn btn-primary" name="acao" value="consultar">Consultar</button>
    <button type="submit" class="btn btn-primary" name="acao" value="excluir">Excluir</button>
    <button type="submit" class="btn btn-primary" name="acao" value="atualizar">atualizar</button>
  </form>

  <br><br>

  


      
  
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

<?php

    // Inclui o arquivo de conexão com o BD
    include 'conexao/conexao.php';

    //variaves
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $data = $_POST['data'];
    $acao = $_POST['acao'];


   
     if ($acao == 'inserir' ) {

    
               // Declaração SQL a ser executada
               $sql = "INSERT INTO cliente ( nome,telefone,dataCliente) VALUES ('$nome','$telefone','$data')";
    
               // Executa a declaração SQL
               if ($connection->query($sql) === true) {
                   echo "Dados inseridos com sucesso!";
               } else {
                   echo "Erro ao inserir dados: " . $connection->error;
               }

         } elseif ($acao == 'consultar') {
       
    
               // Declaração SQL a ser executada
               $sql = "SELECT  codigo,nome, telefone,dataCliente FROM cliente"; 
               // Executa a declaração SQL e retorna o resultado
               $result = $connection->query($sql);
    
               // Verificar se há linhas de registros no resultado
               if ($result->num_rows > 0) {
    
                   // Faz Loop em cada registro recuperado
                   while ($row = $result->fetch_assoc()) {
                       // Access the data in each row

                        foreach ($row as $indice => $valor) {
                            echo $indice.":".$valor."<br>";
                        }
                   }
    
               } else {
                   echo "Nenhum registro encontrado!";
               }

         }elseif ($acao == 'excluir') {
    
    
              // Declaração SQL a ser executada
              $sql = "DELETE FROM cliente WHERE nome='$nome'";
    
              // Executa a declaração SQL
              if ($connection->query($sql) === true) {
                  echo "Registro apagado com sucesso!";
              } else {
              echo "Erro ao apagar registro: " . $connection->error;
              }

         }elseif($acao == 'atualizar'){
        
    
               // Declaração SQL a ser executada
               $sql = "UPDATE Cliente SET  nome = '$nome',telefone = '$telefone',dataCliente = '$data'WHERE codigo='$codigo'";
    
               // Executa a declaração SQL
               if ($connection->query($sql) === true) {
                   echo "Dados atualizados com sucesso.";
               } else {
                   echo "Erro ao atualizar dados: " . $connection->error;
               }
         }



?>