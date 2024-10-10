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
                    <li><a href="">Inicio</a></li>
                    <li><a href="">Sobre</a></li>
                    <li><a href="">Produtos</a></li>
                    <li><a href="">Login</a></li>
                    <li><div class="dropdown">
                        <button class="menubtn">●●●</button>
                        <div class="dropdown-child">
                            <ul>
                                <li><a href="">Consultar Cliente</a></li>
                                <li><a href="">Alterar informações de Cliente</a></li>
                                <li><a href="">Excluir Cliente</a></li>
                                <li><a href="consultar_produto.html">Consultar Produto</a></li>
                                <li><a href="">Alterar Produto</a></li>
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

                echo "<td>$row_produto[codigo_produto]</td>";
                echo "<td>$row_produto[nome_produto]</td>";
                echo "<td>R$$row_produto[preco_produto]</td>";
                echo "<td><img src='$row_produto[imagem]' width='75' height='75'</td>";
    
                echo "</table>";
            }
        }
    }else{
        echo "Erro ".mysqli_error($conexao);
    }
    ?>
</body>
</html>