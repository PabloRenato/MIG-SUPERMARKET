<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro HTML</title>
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
                    <li><a href="">Sobre</a></li>
                    <li><a href="">Produtos</a></li>
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
    include ('conexao.php');
    if(isset($_POST['nome']) && isset($_POST['preco']) && isset($_FILES['imagem'])){
        if(isset($_FILES['imagem']) && !empty($_FILES['imagem'])){

            $imagem= "./img/".$_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'],$imagem);
            $nome=$_POST['nome'];
            $preco=$_POST['preco'];
            $query="INSERT INTO produto(nome_produto,preco_produto,imagem) VALUES('$nome','$preco','$imagem')";
            if(mysqli_query($conexao,$query)){
                echo "Produto Cadastrado";
            }else{
                echo "Erro".mysqli_error($conexao);
            }
        }else{
            echo "<h2> PREENCHA TODAS AS INFORMAÇÕES</h2>";
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="nome">Nome</label>
        <input type="text" name="nome">
        <label for="preco">Preço</label>
        <input type="text" name="preco" placeholder="00.00">
        <label for="imagem">Imagem</label>
        <input type="file" name="imagem" accept="image/*">
        <input type="submit" name="cadastrar" value="CADASTRAR">
    </form>
</body>
</html>