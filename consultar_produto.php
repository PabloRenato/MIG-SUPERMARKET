<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Produto PHP</title>
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
                                <li><a href="">Excluir Cliente</a></li>
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
    include ("conexao.php");
    $nome=$_POST['nome'];
    $query="SELECT * FROM produto WHERE nome_produto LIKE '%$nome%'";
    $resultado=mysqli_query($conexao,$query);
    if(mysqli_query($conexao,$query)){
        while($row_produto=mysqli_fetch_assoc($resultado)){
            if(empty($nome)){
                echo "Insira o nome do Produto";
                echo "<a href=consultar_produto.html> Voltar a Consulta </a>";
            }else{
                echo "<table border ='1'>";
                echo "<tr>";
                echo "<th>CÓDIGO</th>";
                echo "<th>NOME</th>";
                echo "<th>PREÇO</th>";
                echo "<th>IMAGEM</th>";
                echo "</tr>";
                echo "<td>$row_produto[codigo_produto]</td>";
                echo "<td>$row_produto[nome_produto]</td>";
                echo "<td>R$$row_produto[preco_produto]</td>";
                echo "<td><img src='$row_produto[imagem]' width='100' height='100'</td>";
    
                echo "</table>";
            }
        }
    }else{
        echo "Erro ".mysqli_error($conexao);
    }
    ?>
    <button><a href="consultar_produto.html">Voltar</a></button>
</body>
</html>