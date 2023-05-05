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
            <img src="../img-estatico/fechar.png" class="fechaMenu" alt="fecha">
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

        <img src="../img-estatico/menu.png" class="menu" alt="menu">
    </header>



    <a href="../cliente/blog.php" id="voltar"><img src="../img-estatico/voltar.svg" alt="voltar"></a>

    <div class="box-img">
        <img src="../img-estatico/img-noticia3.svg" alt="imagem ilustrativa na notícia" class="noticia-img">
    </div>
    <div class="container box-noticia">

        <h1>Conheça os serviços oferecidos pelo petshop Hamtaro!</h1>

        <hr>

        <div class="texto">
            <p>O petshop Hamtaro é um lugar ideal para cuidar do seu animal de estimação, com serviços de alta qualidade e profissionais experientes. Localizado na região central da cidade, o Hamtaro oferece serviços de banho e tosa, entrega do pet em casa e atendimento clínico para cuidar da saúde dos seus bichinhos.</p>
            <h2>Serviço de banho e tosa</h2>
            <p>O serviço de banho e tosa do Hamtaro é realizado por profissionais experientes e qualificados, que garantem a higiene e o bem-estar do seu animal de estimação. Eles utilizam produtos de alta qualidade e técnicas avançadas para proporcionar um banho e tosa seguro e confortável para o seu pet. Além disso, o Hamtaro oferece uma variedade de serviços, como tosa higiênica, tosa bebê, tosa na tesoura, entre outros. Esses serviços são personalizados de acordo com o tipo de pelagem do animal e suas necessidades específicas. O objetivo é garantir que o seu pet saia do Hamtaro com uma aparência saudável, limpa e muito bonita.</p>
            <h2>Serviço de entrega em casa</h2>
            <p>O serviço de entrega em casa do Hamtaro é ideal para quem tem uma rotina agitada e não consegue levar o seu pet pessoalmente ao petshop. Com essa opção, você pode agendar a busca do seu animal de estimação e um profissional do Hamtaro irá buscá-lo e entregá-lo em casa, limpo e cheiroso. Esse serviço é muito conveniente para pessoas que possuem animais de grande porte, que podem ser difíceis de transportar em veículos ou para quem tem dificuldades de locomoção.</p>
            <h2>Serviço clínico</h2>
            <p>O serviço clínico do Hamtaro é realizado por veterinários qualificados e experientes, que oferecem atendimento especializado e personalizado para cada animal. Eles realizam consultas, exames, vacinação, cirurgias e outros procedimentos necessários para garantir a saúde e o bem-estar do seu pet. O atendimento é personalizado e os profissionais estão sempre à disposição para tirar dúvidas e orientar sobre cuidados específicos para cada tipo de animal.</p>
            <p>No Hamtaro, você pode ter a certeza de que o seu animal de estimação será tratado com o cuidado e o carinho que ele merece. Não deixe de conhecer os serviços oferecidos pelo Hamtaro e proporcionar ao seu pet uma vida mais feliz e saudável.</p>




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