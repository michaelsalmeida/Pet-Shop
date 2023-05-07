<?php
include_once("../../rotas.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisadores descobrem curiosidades surpreendentes sobre a raça de cachorro Shiba Inu.</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css-estatico/header.css">
    <link rel="stylesheet" href="../css-estatico/noticias.css">
    <link rel="icon" href="../img-dinamico/dog-icon.png">
</head>

<body>

    <header>
        <a href="<?php echo $homeRoute; ?>" class="logo">
            <img src="../img-estatico/logo.svg" alt="">
        </a>

        <div class="responsive">
            <img onmousedown="fechaMenu()" src="../img-estatico/fechar.png" class="fechaMenu" alt="fecha">
            
            <div class="links">
                <a href="<?php echo $homeRoute; ?>">HOME</a>
                <a href="<?php echo $blogRoute; ?>">BLOG</a>
                <a href="<?php echo $sobreRoute; ?>">SOBRE</a>
                <a href="<?php echo $contatoRoute; ?>">CONTATO</a>
            </div>

            <div class="acesso">
                <a href="<?php echo $loginCliRoute; ?>"><img src="../img-estatico/login.svg" alt=""> Login</a>
                <a href="<?php echo $cadastroCliRoute; ?>">Cadastro</a>
            </div>
        </div>

        <img src="../img-estatico/menu.png" onmousedown="abreMenu()" class="menu" alt="menu">
    </header>



    <a href="../cliente/blog.php" id="voltar"><img src="../img-estatico/voltar.svg" alt="voltar"></a>

    <div class="box-img">
        <img src="https://sindilojas-sp.org.br/wp-content/uploads/2018/06/dicas-matadoras-para-fidelizar-clientes-no-seu-petshop.jpg" alt="imagem ilustrativa na notícia" class="noticia-img">
    </div>
    <div class="container box-noticia">

        <h1>Petshop Hamtaro se destaca no mercado com serviços de qualidade e amor pelos animais</h1>

        <hr>

        <div class="texto">
            <p>O petshop Hamtaro tem conquistado a admiração de muitos tutores de animais de estimação, devido aos seus serviços de qualidade e amor pelos animais. Com uma equipe de profissionais experientes e altamente capacitados, o Hamtaro se destaca no mercado oferecendo serviços diferenciados para cães, gatos e outros animais de estimação.</p>
            <p>Um dos principais diferenciais do petshop é o cuidado com a higiene e limpeza, tanto do espaço físico como dos animais. Todos os produtos utilizados no banho e tosa são de alta qualidade, e a equipe se preocupa em manter o ambiente sempre limpo e agradável para os animais.</p>
            <p>Além disso, os profissionais do Hamtaro são conhecidos por sua paixão e amor pelos animais, o que se reflete na qualidade do atendimento e na dedicação aos bichinhos de estimação. Eles estão sempre dispostos a ajudar os tutores a cuidar dos seus animais, oferecendo orientações sobre alimentação, saúde e bem-estar.</p>
            <p>O petshop oferece uma ampla variedade de serviços, desde banho e tosa até serviços veterinários e pet-sitting. O Hamtaro também conta com um espaço de recreação para os animais, onde eles podem se divertir e socializar com outros bichinhos, sob supervisão de um profissional capacitado.</p>
            <p>Todos esses diferenciais têm atraído cada vez mais tutores de animais de estimação, que buscam serviços de qualidade e confiança para cuidar dos seus bichinhos. O petshop Hamtaro tem se destacado no mercado por oferecer tudo isso e muito mais, com amor e paixão pelos animais.</p>
            <p>Se você busca um lugar confiável e dedicado para cuidar do seu animal de estimação, o Hamtaro é uma excelente opção.</p>



        </div>



        <hr>
        <p style="text-align: right;">Fonte: Chat GPT - 14.04.2021</p>

    </div>




    <footer>
        <a href="<?php echo $homeRoute; ?>" class="logo">
            <img src="../img-estatico/logo.svg" alt="">
        </a>

        <div class="links">
            <a href="<?php echo $blogRoute; ?>">BLOG</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="../script.js"></script>
</body>

</html>