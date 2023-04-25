<?php
include_once("../../rotas.php");
require_once $funcoesRoute;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Hamtaro PetShop</title>
    <link rel="stylesheet" href="../css-estatico/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css-estatico/blog.css">

</head>

<body>
    <header>
        <a href="<?php echo $homeRoute; ?>" class="logo">
            <img src="../img-estatico/logo.svg" alt="">
        </a>

        <div class="responsive">

            <img src="pages/img-estatico/fechar.png" class="fechaMenu" alt="fecha">
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
                        ";
                    }
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
                if (isset($_SESSION['tipo'])) {
                    // Se o usuário logado for um funcionário, ele é levado para a pág de agendamento
                    header("Location: " . $agendamentoFunRoute);
                } else {
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
            }
            ?>

            <img src="../img-estatico/menu.png" class="menu" alt="menu">
        </div>
    </header>


    <section class="blog container">

        <img src="../img-estatico/gato-blog.svg" alt="gato">

        <p>Descubra curiosidades e novidades sobre o mundo pet na sessão blog do Hamtaro do Petshop!</p>

        <div class="divisoes">
            <div class="divisao-maior"></div>
            <div class="divisao-menor"></div>
        </div>
    </section>



    <div class="container-fluid fundo-noticias">

        <h1>Notícias</h1>

        <section class="noticias">

            <a href="../noticias/noticia1.php">
                <div class="card-noticia">

                    <div class="img-noticia n-1"></div>

                    <div class="info">
                        <h2>Pesquisadores descobrem curiosidades sobre a raça Shiba Inu.</h2>

                        <img src="../img-estatico/pets.svg" alt="pata do pet">
                    </div>

                </div>
            </a>

            <a href="../noticias/noticia2.php">
                <div class="card-noticia">

                    <div class="img-noticia n-2"></div>

                    <div class="info">
                        <h2>Estudo revela que gatos reconhecem o nome dado.</h2>

                        <img src="../img-estatico/pets.svg" alt="pata do pet">
                    </div>

                </div>
            </a>

            <a href="../noticias/noticia3.php">
                <div class="card-noticia">

                    <div class="img-noticia n-3"></div>

                    <div class="info">
                        <h2>Conheça os serviços oferecidos pelo petshop Hamtaro!</h2>

                        <img src="../img-estatico/pets.svg" alt="pata do pet">
                    </div>

                </div>
            </a>


            <a href="../noticias/noticia4.php">
                <div class="card-noticia">

                    <div class="img-noticia n-4"></div>

                    <div class="info">
                        <h2>Vacinação de animais: proteja seu pet e previna doenças.</h2>

                        <img src="../img-estatico/pets.svg" alt="pata do pet">
                    </div>

                </div>
            </a>

            <a href="../noticias/noticia5.php">
                <div class="card-noticia">

                    <div class="img-noticia n-5"></div>

                    <div class="info">
                        <h2>Estudo comprova que interagir com animais melhora a saúde mental.</h2>

                        <img src="../img-estatico/pets.svg" alt="pata do pet">
                    </div>

                </div>
            </a>

            <a href="../noticias/noticia6.php">
                <div class="card-noticia">

                    <div class="img-noticia n-6"></div>

                    <div class="info">
                        <h2>Petshop Hamtaro: amor e qualidade nos cuidados com animais</h2>

                        <img src="../img-estatico/pets.svg" alt="pata do pet">
                    </div>

                </div>
            </a>
        </section>
    </div>



    <section class="container depoimentos">
        <h2 class="text-center">Acompanhe alguns depoimentos dos nossos clientes</h2>

        <div class="box-depoimentos">

            <div class="cliente">
                <img src="../img-estatico/cliente1.svg" alt="foto do cliente">

                <div class="comentario">
                    <h3>Lucas Santos Silva</h3>
                    <p>Gostei muito da consulta meu gato ficou 100%.</p>
                </div>
            </div>

            <div class="cliente">
                <img src="../img-estatico/cliente2.svg" alt="foto do cliente">

                <div class="comentario">
                    <h3>Luiza Soares</h3>
                    <p>Preços bons e funcionários apaixonados pelo animais.</p>
                </div>
            </div>

        </div>

        <div class="box-depoimentos">

            <div class="cliente">
                <img src="../img-estatico/cliente3.svg" alt="foto do cliente">

                <div class="comentario">
                    <h3>Luiz Carlos Sampaio</h3>
                    <p>A pata do meu pet está saudável graças ao veterináro Daniel.</p>
                </div>
            </div>

            <div class="cliente">
                <img src="../img-estatico/cliente4.svg" alt="foto do cliente">

                <div class="comentario">
                    <h3>Daniela Correa</h3>
                    <p>Gostei do atendimento de qualidade e limpeza do local. </p>
                </div>
            </div>

        </div>

    </section>

    <footer>
        <a href="<?php echo $homeRoute; ?>" class="logo">
            <img src="../img-estatico/logo.svg" alt="">
        </a>

        <div class="links">
            <a href="#">BLOG</a>
            <a href="<?php echo $sobreRoute; ?>">SOBRE NÓS</a>
            <a href="<?php echo $contatoRoute; ?>">CONTATO</a>
        </div>

        <div class="redes">
            <img src="../img-estatico/facebook.svg" alt="">
            <img src="../img-estatico/youtube.svg" alt="">
            <img src="../img-estatico/twitter.svg" alt="">
            <img src="../img-estatico/github.svg" alt="">
        </div>

        <p>© Hamtaro Petshop todos direitos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <script src="../script.js"></script>
    <script src="<?php echo $functionsRoute; ?>"></script>
</body>

</html>
