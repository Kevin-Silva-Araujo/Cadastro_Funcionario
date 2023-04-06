<?php
$hostname = "localhost";
$user = "root";
$password = "";
$db = "empresa";

$conn = mysqli_connect($hostname,$user,$password,$db);

function mensagem($texto,$tipo){
    echo "<div class='alert alert-$tipo' role='alert'>
    $texto
  </div>";
};

function mostra_data($data){
  $d = explode('-',$data);
  $escreve = $d[2]."/".$d[1]."/".$d[0];
  return $escreve;
};
function mover_foto($vetor_foto){
  $vtipo = explode("/",$vetor_foto['type']);
  $tipo = $vtipo[0] ?? '';
  $extensao = ".".$vtipo[1] ?? '';

if( (!$vetor_foto['error']) and ($vetor_foto['size'] <= 5000000) and ($tipo == "image")) {
  
  $nome_arquivo = date('Ymdhms').$extensao; //aki é pra os arquivos não serem os mesmos para não subtituir a foto original
  move_uploaded_file($vetor_foto['tmp_name'],"img/".$nome_arquivo);//aki é para 
  
  return $nome_arquivo;

}else{
  return 0;
}
};


?>