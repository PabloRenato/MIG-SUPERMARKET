<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Cliente PHP</title>
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
    <h1>DELETAR CLIENTE</h1>
    <form action="" method="post">
        <label for="codigo">Insira o Código do Cliente</label>
        <input type="text" name="codigo" placeholder="0">
        <input type="submit" name="submit" placeholder="Enviar">
    </form>
    
    <?php
    include ("conexao.php");
    if(!empty($_POST['codigo'])){
        if(isset($_POST['codigo'])){
            $codigo=$_POST['codigo'];
        }
        $query="DELETE FROM usuario WHERE codigo_usuario=($codigo)";
        if(empty($codigo)){
            echo "Insira o Código do Cliente";
            }else{
            if(mysqli_query($conexao,$query)){
                echo "<h2> Cliente Excluido com Sucesso";
            }else{
                echo "Erro".mysqli_error($conexao);
            }
        }
    }


    ?>

</body>
</html>