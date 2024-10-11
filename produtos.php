<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
<header>
        <div id="cabeçalho">
            <ul>
                <div id="logo">
                <img src="img/logo_mig_supermarket.jpg" alt="">                
                <h2>MIG SUPERMARKET</h2>
                </div>
                <div id="menu">
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="sobre.html">Sobre</a></li>
                    <li><a href="produtos.php">Produtos</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><div class="dropdown">
                        <button class="menubtn">●●●</button>
                        <div class="dropdown-child">
                            <ul>
                                <li><a href="consultar_cliente.html">Consultar Cliente</a></li>
                                <li><a href="alterar_cliente.html">Alterar informações de Cliente</a></li>
                                <li><a href="deletar_cliente.php">Excluir Cliente</a></li>
                                <li><a href="consultar_produto.html">Consultar Produto</a></li>
                                <li><a href="alterar_produto.html">Alterar Produto</a></li>
                                <li><a href="deletar_produto.php">Exclusão de Produto</a></li>
                                <li><a href="cadastro_produto.php">Cadastro de Produto</a></li>
                            </ul> 
                            </div>                                       
                </div></li>
            </ul>
        </div>
    </header>
    <?php
    include("conexao.php");
    $query="SELECT * FROM produto";
    $resultado_produto=mysqli_query($conexao,$query);
    echo "    <center><h1>PRODUTOS</h1></center>";
    echo "<div id='prateleira1'>";
    //Execução do Query
    if(mysqli_query($conexao,$query)){
        //Imprimir até encontrar o respectivo nome e ter funcionado o Query
        while($row_produto=mysqli_fetch_assoc($resultado_produto)){
            $nome=$row_produto['nome_produto'];
            $preco=$row_produto['preco_produto'];
            $imagem=$row_produto['imagem'];            
            echo "
        <div class='produto'>
            <img src= $imagem alt=''>
            <h3> $nome </h3>
            <h3> R$$preco</h3>
            <button><a href='solicitado.html'>SOLICITAR COMPRA</a></button>
        </div>";
        }
    }else{
        echo "Erro.".mysqli_error($conexao); 
    }
    echo "</div>";
    ?>

</body>
</html>