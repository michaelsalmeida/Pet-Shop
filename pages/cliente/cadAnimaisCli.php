<?php
include_once("../../rotas.php");
include_once($connRoute);
require_once $funcoesRoute;

if (isset($_SESSION['tipo'])) { // Verifica se o usuário logado é um funcionário
    header("Location: " . $agendamentoFunRoute);
}
if (!loged()) { // Verifica se há um usuário logado
    $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
    // Se não tiver manda ele para a página de login
    header("Location: " . $loginCliRoute);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animais</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5998/5998796.png">
    <script src="<?php echo $functionsRoute; ?>"></script>

    <link rel="stylesheet" href="../css-estatico/header.css">
    <link rel="stylesheet" href="../css-dinamico/cadAnimais.css">
</head>

<body onload="activateToast(<?php echo verificarSession(['msgCadAnimaisCli']); ?>)">
    
    <header>
        <a href="<?php echo $homeRoute; ?>" class="logo">
            <img src="../img-estatico/logo.svg" alt="">
        </a>

        <div class="responsive">

            <img onmousedown="fechaMenu()" src="../img-estatico/fechar.png" class="fechaMenu" alt="fecha">
            <div class="links">
                <a href="<?php echo $blogRoute; ?>">BLOG</a>
                <a href="<?php echo $sobreRoute; ?>">SOBRE NÓS</a>
                <a href="<?php echo $contatoRoute; ?>">CONTATO</a>

            </div>

            <div class="acesso">
                <?php
                if (loged()) {
                    // Esses botões só aparecem quando o usuário estive logado
                    echo "
                    <a href='$fazAgendamentoCliRoute'>Fazer Agendamento</a>
                    <a href='$cadAnimaisCliRoute'>Cadastrar Animais</a>
                    ";
                } else {
                    // Esses botões aparecem se o usuário não estiver logado
                    echo "<a href='$loginCliRoute'><img src='pages/img-estatico/login.svg' alt=''> Login</a>";
                    echo "<a href='$cadastroCliRoute'>Cadastro</a>";
                }
                // if (isset($_SESSION['msgRotaProibidaCli'])){
                //   echo $_SESSION['msgRotaProibidaCli'];
                //   unset($_SESSION['msgRotaProibidaCli']);
                // }

                ?>
            </div>
        </div>



        <div class="perfilHambur">

            <?php
            if (loged()) {
                // Esses botões só aparecem quando o usuário estive logado
                echo "  <div class='perfil' onmousedown='menuPerfil()'>
                    <img src='../img-estatico/account_circle.svg'>
                    <p>></p>
                    </div>
                    
                    
                    <div class='menu-perfil'>
                    <p>Bem Vindo! ".$_SESSION['nomeCliente']."</p>
                    <a href='$meuPerfilCliRoute'><img src='../img-estatico/account_circle.svg'> Meu Perfil</a>
                    <a href='$animaisCliRoute'>Meus Animais</a>
                    <a href='$agendamentoCliRoute'>Meus Agendamentos</a>
                    <button onclick='executeFunctions(" . '"logoff" , ""' . ")'>Sair</button>
                    </div>";
            }
            ?>

            <img onmousedown="abreMenu()" src="../img-estatico/menu.png" class="menu" alt="menu">
        </div>
    </header>

    <?php
    if (isset($_SESSION['msgCadAnimaisCli'])) { // Verifica se há uma mensagem para mostrar
        unset($_SESSION['msgCadAnimaisCli']);
    }
    ?>
    <form action="<?php echo $proc_cadAnimalRoute; ?>" method="post">
        <img class="iconCachorro" src="../img-estatico/iconCachorro.svg" alt="">

        <h1>CADASTRE SEU PET EM NOSSO SISTEMA!</h1>

        <fieldset>
            <div>
                <label for="nome">Nome</label><br>
                <input type="text" name="nome" placeholder="Digite o nome">
            </div>

            <div>
                <label for="dataNasc">Data de Nascimento </label><br>
                <input type="date" name="dataNasc" placeholder="Digite a data de nascimento">
            </div>
            
            <div>
                <label for="sexo">Sexo</label><br>
                <select name="sexo" id="sexo">
                    <option value="F">Feminino</option>
                    <option value="M">Masculino</option>
                    <option value="I">Intersexo</option>
                </select>
            </div>

            <div>
                <label for="espec">Espécie</label><br>
                <input type="text" id="espec" name="espec" list="especs" onchange="datalistRacas()">

                <datalist id="especs">
                    <option value="Cachorro">
                    <option value="Gato">
                    <option value="Peixe">
                    <option value="Pássaro">
                    <option value="Hamster">
                    <option value="Coelho">
                    <option value="Tartaruga">
                </datalist>
            </div>

            <div>
                <label for="raca">Raça</label><br>
                <input type="text" name="raca" list="racas">

                <datalist id="racas">
                </datalist>
            </div>

            <div>
                <label for="peso">Peso (Kg)</label><br>
                <input type="number" name="peso" step=0.01 pattern="[0-9]*" placeholder="Digite o peso">
            </div>

            <div>
                <label for="cor">Cor</label><br>
                <input type="text" name="cor" placeholder="Digite a cor" list="cores-animais-list">

                <datalist id="cores-animais-list">
                    <option value="Preto">
                    <option value="Branco">
                    <option value="Marrom">
                    <option value="Cinza">
                    <option value="Bege">
                    <option value="Laranja">
                    <option value="Amarelo">
                    <option value="Vermelho">
                    <option value="Azul">
                    <option value="Verde">
                    <option value="Roxo">
                    <option value="Rosa">
                    <option value="Dourado">
                    <option value="Prateado">
                    <option value="Bronze">
                </datalist>
            </div>
        </fieldset>


        <button type="submit" value="Cadastrar">Cadastrar</button>
        <a href="<?php echo $homeRoute; ?>">Voltar</a>

    </form>


    <script src="<?php echo $dataHojeRoute; ?>"></script>
    <script src="../script.js"></script>
    <script src="<?php echo $functionsRoute; ?>"></script>
    <script src="../../backend/funcoes/toast.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>