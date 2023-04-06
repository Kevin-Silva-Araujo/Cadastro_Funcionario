<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
     <div class="container">
        <div class="row">
            <?php
            include "conexao.php";  //include serve pra pegar os codigos de outro index e colocar aki como esse vai mandar as infromações pro Banco de dados
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $data_nascimento = $_POST['data_nascimento'];
            $foto = $_FILES['foto'];
            $nome_foto = mover_foto($foto);
            if ($nome_foto == 0) {
              $nome_foto = null;
            }
            //nome das tabelas do Db banco de dados

            $sql = "INSERT INTO `pessoas`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`,`foto`)
            VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento','$nome_foto')";
            //Insert INTO pega todos os dados e manda para o banco de dados ficando por la 
            if (mysqli_query($conn,$sql)){
              if($nome_foto != null){
                echo "<img src='img/$nome_foto' title='$nome_foto' class='mostra_foto'>";
                
              };
              
                mensagem("$nome cadastrado com sucesso!", 'success' );
            }else{
              mensagem("$nome Erro na cadastração", 'danger' );
            }
            //Just A test

            ?>
            <a href="index.php" class="btn btn-primary">Voltar</a>

        </div>
     </div>