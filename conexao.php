<?php

$host="localhost"; //endereço do servidor
$usuario="root"; //nome do usuario do BD
$senha="Senac@2024"; //senha do BD
$dbname="migsupermarket"; //nome do BD

//utiliza a conexão do banco de dados com mysql
$conexao=mysqli_connect($host,$usuario,$senha,$dbname);

//$conexao= new mysqli($host,$usuario,$senha,$dbname)

if($conexao->connect_error){
    echo "Erro". mysqli_error($conexao); //se ocorrer erro na conexao
}else{
    echo "Conexão realizada com sucesso.<br>";
    //header('Location: index.html');
}

?>