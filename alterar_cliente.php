<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Informações do Cliente PHP</title>
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
        if(isset($_POST['nome'])){
            $codigo=$_POST['codigo'];
            $nome=$_POST['nome'];
            $email=$_POST['email'];
            $telefone=$_POST['telefone'];
            $senha=$_POST['senha'];

        
            //Variavel de Alteração
            $alterar="UPDATE  usuario SET nome='{$nome}', email='{$email}', telefone='{$telefone}', senha='{$senha}' WHERE codigo_usuario='{$codigo}'";
        
            $operacao_alterar=mysqli_query($conexao,$alterar);
        
            if(!$operacao_alterar){
                echo "Error:".mysqli_error($conexao);
            }else{
                echo "Alteração Realizada com Sucesso";
            }
        }else{
            echo "Insira todas as informações a serem alteradas";
        }
    
    
        $usuario="SELECT * FROM usuario ";
    
        if(isset($_POST['codigo'])){//definição de teste da variavel
    
            $codigo=$_POST['codigo'];
            $usuario.= "WHERE codigo_usuario={$codigo}";
        }else{
            $usuario.= "WHERE codigo_usuario = 1";//Certifica o primeiro elemento
        }
    
        $query=mysqli_query($conexao,$usuario);
    
        if(!$query){//teste de conexão que verifica de e falso ou verdadeiro
            echo "Erro".mysqli_error($conexao);
        }else{
            $info_usuario=mysqli_fetch_assoc($query);//criando um array 
    
        }
        ?>
            <h1>Atualizar Dados do Cliente</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nome">Nome:</label>
            <input type="text" value="<?php echo $info_usuario['nome']?>" name="nome"><br>
            <label for="preco">Email</label>
            <input type="text" value="<?php echo $info_usuario['email']?>" name="email"><br>
            <label for="telefone">Telefone</label>
            <input type="text" value="<?php echo $info_usuario['telefone']?>" name="telefone"><br>
            <label for="senha">Senha</label>
            <input type="text" value="<?php echo $info_usuario['senha']?>" name="senha">
            <input type="hidden" value="<?php echo $info_usuario['codigo_usuario']?>" name="codigo"><br>
    
            <input type="submit" name="submit" value="Alterar">
        </form>
</body>
</html>