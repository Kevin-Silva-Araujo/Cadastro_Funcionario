<!--$dados = mysqli_query($conn,$sql); << aqui pega os dados do banco e traz pra nos
 O While ele vai encontrar os itens para nós
  while($linha = mysqli_fetch_assoc($dados)){
    foreach ($linha as $key => $value) {
      echo "$key: $value<br>";
    }
    echo "<hr>";
  };
  isso serve para pegar os dados e colocar na Tela Apenas como teste

-->
<?php include "../validar.php";?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesquisar</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>

  <body class="">
    <?php 
 
    $pesquisa = $_POST['busca'] ?? '';
  
  
  include "conexao.php";

  $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%' ";
    
  $dados = mysqli_query($conn,$sql);

  
    
    ?>
     <div class="container ">
        <div class="row">
            <div class="col">
            <h1 class="display-6">Pesquisa</h1>            
            <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <form class="d-flex" role="search" action="pesquisa.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" name="busca">
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
</nav>
<table class="table table-hover table-dark">
<thead>
    <tr>
      <th scope="col">foto</th>
      <th scope="col">Nome</th>
      <th scope="col">Endereço</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Data De nascimento</th>
      <th scope="col">Funções</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    while($linha = mysqli_fetch_assoc($dados)){
      $cod_pessoa = $linha['cod_pessoa'];
      $nome = $linha['nome'];
      $endereco = $linha['endereco'];
      $telefone = $linha['telefone'];
      $email = $linha['email'];
      $data_nascimento = $linha['data_nascimento'];
      $data_nascimento = mostra_data($data_nascimento);
      $foto = $linha['foto'];
      if(!$foto == null){
       
        $mostra_foto = "<img src='img/$foto' class='lista_foto'>";
      }else{
        $mostra_foto = '';
      };
      
      
      echo "<tr>
      <th>$mostra_foto</th>
      <th scope='row'>$nome</th>
      <td>$endereco</td>
      <td>$telefone</td>
      <td>$email</td>
      <td>$data_nascimento</td>
      <td width='150px'>
      <a href='cadastro_edit.php?id=$cod_pessoa' class='btn btn-sm btn-info'>Editar</a>
      <a href='#' class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#confirma'   onclick="  .'"'." pegar_dados('$cod_pessoa','$nome')".'"'.">Exclui</a>
      </td>
    </tr>";
    };
    //Use '"'.'"'. aspas simples nas duplas para elas combinar e se juntar com a função do javascript para que assim o onlclik ou qualquer outra pegue com concatenar
    ?>
    
  </tbody>
</table>

            <a href="index.php" class="btn btn-lg btn-dark">Voltar</a>
            </div>
        </div>
     </div>
    <!-- Modal -->
<div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirma Exclusão?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="exclui_script.php" method="POST">
        <p>Deseja Realmente Excluir <b id="nome_pessoa">Nome da pessoa</b></p>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Não</button>
        <input type="hidden" name="nome" id="nome_pessoa_1" value="">
        <input type="hidden" name="id" id="cod_pessoa" value="">
        <input type="submit" class="btn btn-danger" value="Sim">
        </form>
      </div>
    </div>
  </div>
</div>






<script>
  function pegar_dados(id,nome){

    document.getElementById('nome_pessoa').innerHTML = nome;
    document.getElementById('nome_pessoa_1').value = nome;
    document.getElementById('cod_pessoa').value = id;
  }
</script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>