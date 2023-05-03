<?php

include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexao
require_once $funcoesRoute;

if (isset($_SESSION['tipo'])) { // Verifica se o usuário logado é um funcionário
    header("Location: " . $agendamentoFunRoute);
}
if (loged()) { // Verifica se há um usuário logado
    // Se tiver manda ele para a página principal
    header("Location: " . $homeRoute);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hamtaro PetShop</title>
    <link rel="stylesheet" href="../css-estatico/header.css">
    <link rel="stylesheet" href="../css-dinamico/login-cliente.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css-estatico/olhoSenha.css">

</head>

<body onload="activateToast(<?php echo verificarSession(['msglogin']); ?>)">
    <header>
        <a href="<?php echo $homeRoute; ?>" id="logo">
            <p>Hamtaro Petshop</p>
        </a>

        <div class="links-login-cliente">
            <a href="<?php echo $loginFunRoute; ?>" class="corporativo">Corporativo </a>

            <div class="acesso-seguro">
                <p>Ambiente Seguro</p>
                <img src="../img-dinamico/cadeado.svg" alt="">
            </div>
        </div>
    </header>


    <div class="container box-conteudo">

        <form action="<?php echo $procLoginCliRoute; ?>" method="post">

            <div class="titulos">
                <h1>Acesse sua conta</h1>
                <p>Informe seu email e senha de cadastro</p>
            </div>


            <div class="inputs">

                <div class="email">
                    <label for="email">Email</label><br>
                    <input type="email" name="email">
                </div>

                <div class="senha">
                    <label for="senha">Senha <button type="button" id="toggleButton" class="bi-eye-fill" onclick="mostrarSenha('toggleButton', 'password')"></button></label><br>
                    <input type="password" name="senha" id="password">
                </div>

            </div>


            <div class="botoes">
                <input type="submit" value="Entrar">

                <?php
                if (isset($_SESSION['msglogin'])) { // Verifica se há uma mensagem para mostrar
                    unset($_SESSION['msglogin']);
                }
                ?>

                <a class="voltar" href="<?php echo $homeRoute; ?>">Voltar</a>
            </div>
        </form>
        
    </div>


    <div class="box-cadastro">
        <span>Ainda não possui cadastro online na Hamtaro? <a href="<?php echo $cadastroCliRoute; ?>"
                class="cadastro-cliente">Cadastre-se</a></span>
    </div>

    <script src="<?php echo $functionsRoute; ?>"></script>
    <script src="../../backend/funcoes/toast.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../script.js"></script>
</body>

</html>
