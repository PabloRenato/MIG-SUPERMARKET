<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>
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
    include ("conexao.php");
    if(isset($_POST['nome'])){
        $nome=$_POST['nome'];
        $preco=$_POST['preco'];
        $codigo=$_POST['codigo'];
        if (empty($nome) || empty($preco) || empty($_FILES['imagem']['name'])) {
            echo "Por favor, preencha todos os campos e envie uma imagem.";
        } else {
            $imagem = "./img/" . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
        
    
            //Variavel de Alteração
            $alterar="UPDATE  produto SET nome_produto='{$nome}', preco_produto='{$preco}', imagem='{$imagem}' WHERE codigo_produto='{$codigo}'";
        
            $operacao_alterar=mysqli_query($conexao,$alterar);
        
            if(!$operacao_alterar){
                echo "Error:".mysqli_error($conexao);
            }else{
            // header('location:alteracao.html');
                echo "Alteração Realizada com Sucesso";
            }
        }
    }


    $produto="SELECT * FROM produto ";

    if(isset($_POST['codigo'])){//definição de teste da variavel

        $codigo=$_POST['codigo'];
        $produto.= "WHERE codigo_produto={$codigo}";
    }else{
        $produto.= "WHERE codigo_produto = 1";//Certifica o primeiro elemento
    }

    $query=mysqli_query($conexao,$produto);

    if(!$query){//teste de conexão que verifica de e falso ou verdadeiro
        echo "Erro".mysqli_error($conexao);
    }else{
        $info_produto=mysqli_fetch_assoc($query);//criando um array 

    }
    ?>
        <h1>Atualizar Dados do Produto</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nome">Nome do Produto:</label>
        <input type="text" value="<?php echo $info_produto['nome_produto']?>" name="nome"><br>
        <label for="preco">Preço do Produto</label>
        <input type="text" value="<?php echo $info_produto['preco_produto']?>" name="preco"><br>
        <label for="imagem">Imagem</label><br>
        <?php echo "<img src='$info_produto[imagem]' width='150' height='150'";?><br>
        <input type="file" name="imagem" accept="image/*">
        <input type="hidden" value="<?php echo $info_produto['codigo_produto']?>" name="codigo"><br>

        <input type="submit" name="submit" value="Alterar">
        <button><a href="alterar_produto.html">Voltar</a></button>
    </form>
</body>
</html>