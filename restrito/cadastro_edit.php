<?php include "../validar.php";?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edita Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
    <?php
    include "conexao.php";
    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM pessoas WHERE cod_pessoa = $id";

    $dados = mysqli_query($conn,$sql);
    $linha = mysqli_fetch_assoc($dados);


    ?>


  <body>
     <div class="container">
        <div class="row">
            <div class="col">
            <h1>Muda Cadastro</h1>
            <form action="edit_script.php" method="POST">
            <div class="form-group">
            <label for="Nome" >Nome Completo</label>
            <input type="text" class="form-control"  placeholder="Por Favor Digite Seu nome Completo" name="nome" required value="<?php echo $linha['nome']; ?>">
        </div>
        <div class="form-group">
            <label for="endereco" >Endereço</label>
            <input type="text" class="form-control" placeholder="Por Favor Digite Seu Endereço Residencial" name="endereco" value="<?php echo $linha['endereco']; ?>">
        </div>
        <div class="form-group">
            <label for="endereco" >Telefone</label>
            <input type="text" class="form-control" placeholder="Por Favor Digite Seu Numero de telefefone" name="telefone" value="<?php echo $linha['telefone']; ?>">
        </div>
        <div class="form-group">
            <label for="endereco" >Email</label>
            <input type="email" class="form-control" placeholder="Por Favor Digite Seu Melhor Email" name="email" value="<?php echo $linha['email']; ?>">
        </div>
        <div class="form-group">
            <label for="" >Data de nascimento</label>
            <input type="date" class="form-control" placeholder="Por Favor Digite Seu Numero de telefefone" name="data_nascimento" value="<?php echo $linha['data_nascimento']; ?>">
        </div>
        <div class="form-group">
            <input type="submit"  class="btn btn-success" value="Salvar alterações">
            <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa']; ?>">
        </div>
            </form>
            <a href="index.php" class="btn btn-primary ">INICIO</a>
            </div>
        </div>
     </div>
   











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>