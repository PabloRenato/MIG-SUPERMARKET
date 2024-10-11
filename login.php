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
        include("conexao.php");

        if(isset($_POST["email"])){
            $email=$_POST["email"];
            $senha=$_POST["senha"];
            $login="SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senha}' ";
            $acesso=mysqli_query($conexao,$login);
            if(!$acesso){
                echo "<h2>Falha de Login</h2>";
            }
            $informacao=mysqli_fetch_assoc($acesso);
            if(empty($informacao)){
                echo"Login Sem Conexão";
            }else{
                header("location:index.html");
            }
        }
    

        
        

    ?>

    <h1>LOGIN</h1>
    <form action="" method="post">
        <label for="email">Email</label>
        <input type="email" name="email">
        <label for="senha">Senha</label>
        <input type="password" name="senha">
        <input type="submit" name="submit" value="ENTRAR"><br>
        <button><a href="cadastro_usuario.php">Criar uma conta</a></button>
    </form>
</body>
</html>