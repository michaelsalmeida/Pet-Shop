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

        <img src="../img-estatico/menu.png" class="menu" alt="menu">
    </header>



    <a href="../cliente/blog.php" id="voltar"><img src="../img-estatico/voltar.svg" alt="voltar"></a>

    <div class="box-img">
        <img src="https://digitalvet.com.br/wp-content/uploads/2019/05/vacinas-para-caes.png" alt="imagem ilustrativa na notícia" class="noticia-img">
    </div>
    <div class="container box-noticia">

        <h1>Vacinação de animais é importante para prevenir doenças e garantir a saúde dos pets.</h1>

        <hr>

        <div class="texto">
            
            <p>A vacinação é um cuidado essencial para garantir a saúde e o bem-estar dos animais de estimação. Através da vacinação, é possível prevenir diversas doenças que podem colocar em risco a vida do seu pet.</p>
            <p>Os animais de estimação são suscetíveis a diversas doenças, como a raiva, leptospirose, parvovirose, cinomose, entre outras. Essas doenças podem ser transmitidas através do contato com outros animais ou até mesmo através de objetos contaminados. A vacinação é a melhor maneira de proteger os pets dessas doenças.</p>
            <p>Os animais devem ser vacinados desde filhotes e seguir um calendário de vacinação, que pode variar de acordo com a região e as necessidades específicas de cada animal. É importante lembrar que a vacinação deve ser realizada por um médico veterinário e que somente ele pode indicar as vacinas necessárias e os prazos para cada uma.</p>
            <p>Além da proteção para os animais, a vacinação também é importante para a saúde pública. A vacina contra a raiva, por exemplo, é obrigatória e ajuda a prevenir a disseminação da doença para humanos.</p>
            <p>O custo da vacinação é relativamente baixo em comparação com os gastos que podem surgir com o tratamento de uma doença não prevenida. Por isso, é importante incluir a vacinação como um cuidado de rotina para o seu pet.</p>
            <p>Em tempos de pandemia, muitas pessoas têm se preocupado com a possibilidade de contágio de COVID-19 em animais de estimação. Até o momento, não há evidências de que os animais possam transmitir o vírus para humanos ou vice-versa. No entanto, é importante manter as medidas de higiene recomendadas e seguir as orientações das autoridades de saúde.</p>
            <p>Cuide da saúde do seu pet e garanta uma vida longa e saudável para ele. Não deixe de vacinar seu animal de estimação e consultar um médico veterinário para mais informações sobre as vacinas necessárias.</p>




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