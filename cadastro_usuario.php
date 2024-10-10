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
        include("conexao.php");//Verificar conexão com o BD

        //valores informados pelo usuário
        if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['telefone'])){
            $nome=$_POST['nome'];
            $email=$_POST['email'];
            $senha=$_POST['senha'];
            $telefone=$_POST['telefone'];
                
        
            // Consulta SQL para inserir dados na tabela usuario
            $query="INSERT INTO usuario(nome,email,senha,telefone) VALUES('$nome','$email','$senha','$telefone')";
            
            if(empty($nome) && empty($email) && empty($senha) && empty($telefone)){
                echo "<h2>Insira todas as informações<h2>";
            }else{
                if (mysqli_query($conexao,$query)){
                    header('location:login.php');

                }else{
                    echo "Erro".mysqli_error($conexao);
                }
            }
        }
    ?>

    <h1>CRIAR CONTA</h1>
    <form action="" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome"><br>
        <label for="email">Email</label>
        <input type="text" name="email"><br>
        <label for="senha">Senha</label>
        <input type="password" name="senha" placeholder="Máximo 16 Caracteres"><br>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" placeholder="Apenas Números"><br>
        <input type="submit" name="submit" value="CADASTRAR">
    </form>

</body>
</html>