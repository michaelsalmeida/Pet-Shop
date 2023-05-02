<?php
include_once("../../rotas.php");
require_once $funcoesRoute;

if (isset($_SESSION['tipo'])) {
    // Se o usuário logado for um funcionário, ele é levado para a pág de agendamento
    header("Location: " . $agendamentoFunRoute);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Hantaro</title>

    <link rel="stylesheet" href="../css-estatico/contato.css">
    <link rel="stylesheet" href="../css-estatico/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body onload="activateToast(<?php echo verificarSession(['msgComent']); ?>)">
    <header>
        <a href="<?php echo $homeRoute; ?>" class="logo">
            <img src="../img-estatico/logo.svg" alt="">
        </a>

        <div class="responsive">

            <img onmousedown="fechaMenu()" src="../img-estatico/fechar.png" class="fechaMenu" alt="fecha">
            <div class="links">
                <a href="<?php echo $blogRoute; ?>">BLOG</a>
                <a href="<?php echo $sobreRoute; ?>">SOBRE NÓS</a>
                <a href="#">CONTATO</a>

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
                    echo "<a href='$loginCliRoute'><img src='../img-estatico/login.svg' alt=''> Login</a>";
                    echo "<a href='$cadastroCliRoute'>Cadastro</a>";
                }

                if (isset($_SESSION['msgComent'])){
                  unset($_SESSION['msgComent']);
                }

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

    <section class="container mapa">
        <h1>ENCONTRE O MELHOR PETSHOP DE SÃO PAULO!</h1>

        <div class="frame">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.7799321122684!2d-46.7243160902296!3d-23.648050978651618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce510e8d3746ed%3A0x3e9f3a76e1ebfb69!2sEscola%20Senai%20Su%C3%AD%C3%A7o-Brasileira%20Paulo%20Ernesto%20Tolle!5e0!3m2!1spt-BR!2sbr!4v1681327886589!5m2!1spt-BR!2sbr"
                width="600" height="450" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <a target="_blank"
            href="https://www.google.com/maps/place/Escola+Senai+Suíço-Brasileira+Paulo+Ernesto+Tolle/@-23.6482243,-46.7241806,17z/data=!4m6!3m5!1s0x94ce510e8d3746ed:0x3e9f3a76e1ebfb69!8m2!3d-23.648051!4d-46.7217358!16s%2Fg%2F1wk7rz_s">
            <img src="../img-estatico/setaMapa.svg" alt="">
            Localização: R. Bento Branco de Andrade Filho, 379 - Santo Amaro
        </a>
    </section>

    <section class="container-fluid mensagem">
        <h2>Precisa de ajuda? Envie uma mensagem</h2>

        <form action="<?php echo $procComentarioRoute; ?>" method="post">
            <fieldset id="nome">
                <label for="">Nome</label>
                <input type="text" name="nome" required>
            </fieldset>
            <fieldset id="tell">
                <label for="">Telefone</label>
                <input type="text" name="tell" required>
            </fieldset>
            <fieldset id="email">
                <label for="">Email</label> 
                <input type="email" name="email" required>
            </fieldset>
            <fieldset id="msg">
                <label for="">Sua mensagem</label>
                <textarea name="msg" id="" cols="30" rows="10" required></textarea>
            </fieldset>

            <input type="submit">
        </form>
    </section>

    <section class="container contato">
        <h2>Informações de contato</h2>

        <div>
            <button><img src="../img-estatico/call.svg" alt="">Telefone: (11)98253-2481</button>
            <button><img src="../img-estatico/email.svg" alt="">Email: hamtaro@gmail.com</button>
            <button><img src="../img-estatico/instagram.svg" alt="">Instagram: @hamtaropetshop</button>
        </div>
    </section>

    <footer>
        <a href="<?php echo $homeRoute; ?>" class="logo">
            <img src="../img-estatico/logo.svg" alt="">
        </a>

        <div class="links">
            <a href="<?php echo $blogRoute; ?>">BLOG</a>
            <a href="<?php echo $sobreRoute; ?>">SOBRE NÓS</a>
            <a href="#">CONTATO</a>
        </div>

        <div class="redes">
            <img src="../img-estatico/facebook.svg" alt="">
            <img src="../img-estatico/youtube.svg" alt="">
            <img src="../img-estatico/twitter.svg" alt="">
            <img src="../img-estatico/github.svg" alt="">
        </div>

        <p>© Hamtaro Petshop trabalho com fins lucrativos</p>
    </footer>

    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

        <script src="<?php echo $functionsRoute; ?>"></script>
        <script src="../../backend/funcoes/toast.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
