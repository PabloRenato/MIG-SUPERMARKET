<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Cliente PHP</title>
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
        $codigo="Não existe";
        $nome="Não existe";
        $email="Não existe";
        $telefone="Não existe";
        $senha="Não existe";
        
        $Email=$_POST['email'];
        $query="SELECT * FROM usuario WHERE email LIKE '%$Email%'";
        $resultado=mysqli_query($conexao,$query);
        if(mysqli_query($conexao,$query)){
            while($row_usuario=mysqli_fetch_assoc($resultado)){
                if(empty($Email)){
                    echo "Insira o Email do Cliente";
                    echo "<a href=consultar_cliente.html> Voltar a Consulta </a>";
                }else{
                    $codigo=$row_usuario['codigo_usuario'];
                    $nome=$row_usuario['nome'];
                    $email=$row_usuario['email'];
                    $telefone=$row_usuario['telefone'];
                    $senha=$row_usuario['senha'];
                }
            }
        }else{
            echo "Erro ".mysqli_error($conexao);
        }
        
    ?>
    <h1>INFORMAÇÕES DO CLIENTE</h1>
    <label for="codigo">CODIGO</label>
    <input type="text" name="codigo" value="<?php echo $codigo ?>" readonly><br>
    <label for="nome">NOME</label>
    <input type="text" name="nome" value="<?php echo $nome ?>" readonly><br>
    <label for="email">EMAIL</label>
    <input type="text" name="email" value="<?php echo $email ?>" readonly><br>
    <label for="telefone">TELEFONE</label>
    <input type="text" name="telefone" value="<?php echo $telefone ?>" readonly><br>
    <label for="senha">SENHA</label>
    <input type="text" name="senha" value="<?php echo $senha ?>" readonly><br>
    <button><a href="consultar_cliente.html">Voltar</a></button>
</body>
</html>