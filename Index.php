<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body class="p-3 mb-2 bg-dark text-white">
     <div class="container border col-6 ">
        <div class="row">
            <div class="col-6">
            <div class="jumbotron bg-dark my-5">
                <h1 class="display-4 text-white">Cadastro WEB</h1>
                <form action="index.php" method="POST">
                  <div class="form-group">
                    <label for="">Login</label>
                    <input type="text" class="form-control" id="exampleInputEmaill" aria-describedby="emailHelp" name="login">
                    <small name="login" class="form-text text-light">Seu Email nunca será mostrado para o mundo</small>
                  </div>
                  <div class="form_group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="senha">
                  </div>
                  <button type="submit" class="btn btn-primary">Acessar</button>


                </form>
                <?php
                if(isset($_POST['login'])){
                  $login = $_POST['login'];
                  $senha = $_POST['senha'];
                  include "restrito/conexao.php";
                  $sql = "SELECT * FROM `usuarios` WHERE login = '$login' AND senha = '$senha'";

                  if($result = mysqli_query($conn,$sql)){
                  $num_registros = mysqli_num_rows($result);
                  };
                  if($num_registros == 1){
                    $linha = mysqli_fetch_assoc($result);
                    if(($login == $linha['login']) and ($senha == $linha['senha'])){
                      session_start();
                      $_SESSION['login'] = "Kevin";
                      header("location: restrito");
                    }else{
                      echo "Login invalido";
                    }
                  }else{
                    echo "Login invalido";
                  }

                  
                }

                ?>
            
            </div>
            
           
            
            </div>
        </div>
     </div>
   











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>