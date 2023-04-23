<?php
include_once("../../rotas.php");
include_once($connRoute);
require_once $funcoesRoute;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link rel="stylesheet" href="../css-estatico/header.css">
    <link rel="stylesheet" href="../css-dinamico/meu-perfil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

</head>

<body onload="altMeuPerfilCli()">
    <?php
    if (isset($_SESSION['tipo'])) { // Verifica se o usuário logado é um funcionário
        header("Location: " . $agendamentoFunRoute);
    }
    if (!loged()) { // Verifica se há um usuário logado
        $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
        // Se não tiver manda ele para a página de login
        header("Location: " . $loginCliRoute);
    }
    if (isset($_SESSION['msgMeuPerfilCli'])) { // Verifica se há uma mensagem para mostrar
        echo $_SESSION['msgMeuPerfilCli'];
        unset($_SESSION['msgMeuPerfilCli']);
    }
    ?>

    <header>
        <a href="<?php echo $homeRoute; ?>" class="logo">
            <img src="../img-estatico/logo.svg" alt="">
        </a>

        <div class="responsive">
            <img src="../img-estatico/fechar.png" class="fechaMenu" alt="fecha">
            <div class="links">
                <a href="<?php echo $blogRoute; ?>">BLOG</a>
                <a href="<?php echo $sobreRoute; ?>">SOBRE NÓS</a>
                <a href="<?php echo $contatoRoute; ?>">CONTATO</a>
            </div>

            <div class="acesso">
                <?php
                if (loged()) {
                    if (isset($_SESSION['tipo'])) {
                        // Se o usuário logado for um funcionário, ele é levado para a pág de agendamento
                        header("Location: " . $agendamentoFunRoute);
                    } else {
                        // Esses botões só aparecem quando o usuário estive logado
                        echo "
                        <a href='$fazAgendamentoCliRoute'>Fazer Agendamento</a>
                        <a href='$cadAnimaisCliRoute'>Cadastrar Animais</a>
                        <a href='$meuPerfilCliRoute'>Meu Perfil</a>
                        <a href='$animaisCliRoute'>Meus Animais</a>
                        <a href='$agendamentoCliRoute'>Meus Agendamentos</a>
                        <button onclick='executeFunctions(" . '"logoff" , ""' . ")'>Sair</button>";
                    }
                } else {
                    // Esses botões aparecem se o usuário não estiver logado
                    echo "<a href='$loginCliRoute'><img src='pages/img-estatico/login.svg' alt=''> Login</a>";
                    echo "<a href='$cadastroCliRoute'>Cadastro</a>";
                }
                if (isset($_SESSION['msgAltCli'])){
                  echo $_SESSION['msgAltCli'];
                  unset($_SESSION['msgAltCli']);
                }

                ?>
            </div>
        </div>

        <img src="../img-estatico/menu.png" class="menu" alt="menu">
    </header>


    <div class="informacoes-superior">
        <img src="../img-dinamico/icone-meu-perfil.svg" alt="ícone do meu perfil">

        <h1>MEU PERFIL</h1>
        <p>Gerencie suas informações</p>
    </div>

    <form action="<?php echo $proc_altCliRoute; ?>" method="post">

        <input type="hidden" name="idCliente" value="<?php echo $_SESSION['idCli']; ?>">


        <div class="informacoes-pessoais container">

            <h2>Informações Pessoais</h2>

            <div class="box-maior-input">

                <div class="box-input">
                    <label for="cpf">CPF <i class="bi bi-file-lock2"></i></label>
                    <input type="text" name="cpf" readonly required>
                </div>

                <div class="box-input">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" readonly required>
                </div>

            </div>

            <div class="box-maior-input">

                <div class="box-input">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" name="sobrenome" readonly required>
                </div>

                <div class="box-input">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" pattern="[0-9]{11}" readonly required>
                </div>

            </div>


            <div class="box-maior-input">

                <div class="box-input">
                    <label for="email">Email</label>
                    <input type="email" name="email" readonly required>
                </div>

                <div class="box-input box-botao">
                    <label>Clique para alterar</label>

                    <div class="botoes-alterar">
                        <button type="button" onclick="meuPerfilCliPes()">Alterar</button>
                        <input type="submit" value="Confirmar" name="conf" hidden>
                    </div>
                </div>

            </div>

        </div>


        <div class="informacoes-endereco informacoes-pessoais">

            <h2>Informações de Endereço</h2>


            <div class="box-maior-input">

                <div class="box-input">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" onchange="pesquisacep(this.value)" readonly required>
                </div>

                <div class="box-input">
                    <label for="log">Logradouro <i class="bi bi-file-lock2"></i></label>
                    <input type="text" name="log" readonly required>
                </div>

            </div>

            <div class="box-maior-input">

                <div class="box-input">
                    <label for="num">Número</label>
                    <input type="text" name="num" pattern="\d{1,5}" readonly required>
                </div>

                <div class="box-input">
                    <label for="comp">Complemento</label>
                    <input type="text" name="comp" readonly>
                </div>

            </div>


            <div class="box-maior-input">
                <div class="box-input">
                    <label for="bairro">Bairro <i class="bi bi-file-lock2"></i></label>
                    <input type="text" name="bairro" readonly required>
                </div>

                <div class="box-input">
                    <label for="cid">Munícipio <i class="bi bi-file-lock2"></i></label>
                    <input type="text" name="cid" readonly required>
                </div>
            </div>

            <div class="box-maior-input">
                <div class="box-input">
                    <label for="uf">UF <i class="bi bi-file-lock2"></i></label>
                    <input type="text" name="uf" readonly required>
                </div>
                <div class="box-input box-botao">
                    <label>Clique para alterar</label>

                    <div class="botoes-alterar">
                        <button type="button" onclick="meuPerfilCliEnd()">Alterar</button>
                        <input type="submit" value="Confirmar" name="conf" hidden>
                    </div>

                </div>
            </div>

        </div>

    </form>




    <div class="box-inferior-botoes">
        <a href="<?php echo $procExcCliRoute . "?id=" . $_SESSION["idCli"]; ?>" class="apagar-conta">Apagar Conta</a>
        <a href="<?php echo $homeRoute; ?>">Voltar</a>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="<?php echo $dataHojeRoute; ?>"></script>
    <script src="<?php echo $functionsRoute; ?>"></script>
    <script src="<?php echo $viacepRoute; ?>"></script>
    <script src="../script.js"></script>

</body>

</html>