<?php include "../validar.php";?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body class="">
     <div class="container shadow-lg p-3 md-5 bg-body-tertiary rounded  border col-0">
        <div class="row">
            <div class="col-12 p-3 mb-2 bg-dark text-white">
            <h1 class="display-6 text-center">Cadastro Funcionario</h1>
            <form action="cadastro_script.php" method="POST" enctype="multipart/form-data" class="">
            <div class="form-group">
            <label for="Nome" >Nome Completo</label>
            <input type="text" class="form-control"  placeholder="Por Favor Digite Seu nome Completo" name="nome" required>
        </div>
        <div class="form-group">
            <label for="endereco" >Endereço</label>
            <input type="text" class="form-control" placeholder="Por Favor Digite Seu Endereço Residencial" name="endereco">
        </div>
        <div class="form-group">
            <label for="endereco" >Telefone</label>
            <input type="text" class="form-control" placeholder="Por Favor Digite Seu Numero de telefefone" name="telefone">
        </div>
        <div class="form-group">
            <label for="endereco" >Email</label>
            <input type="email" class="form-control" placeholder="Por Favor Digite Seu Melhor Email" name="email">
        </div>
        <div class="form-group">
            <label for="" >Data de nascimento</label>
            <input type="date" class="form-control" placeholder="Por Favor Digite Sua data de nascimento Ex:xx/xx/xxxx" name="data_nascimento">
        </div>

        <div class="form-group">
            <label for="foto">FOTO</label>
            <input type="file" class="form-control"  name="foto" accept="img/*">
        </div>
        <div class="form-group">
            <input type="submit"  class="btn btn-primary">
        </div>
            </form>
            <a href="index.php" class="btn  btn-light ">INICIO</a>
            </div>
        </div>
     </div>
   











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>