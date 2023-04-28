<?php
  include_once("rotas.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Hudson</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5998/5998796.png">
    <link rel="stylesheet" href="Frontend/header.css">
    <link rel="stylesheet" href="Frontend/cssHomePage/home.css">
    <link rel="stylesheet" href="Frontend/cssHomePage/marketing.css">
    <link rel="stylesheet" href="Frontend/cssHomePage/blog.css">
    <link rel="stylesheet" href="Frontend/cssHomePage/localiza.css">
    <link rel="stylesheet" href="Frontend/cssHomePage/instituicao.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
    crossorigin="anonymous">
</head>
<body onresize="checaDispositivo()" onload="checaDispositivo()" onscroll="escondeHeader()">

    <a href="#topo" class="setaTopo">
      <img src="Frontend/FrontendPages/img/right-arrow.png" alt="seta">
    </a>

    <header>
        <a href="" class="logo">
            <img src="Frontend/FrontendPages/img/Capturar-removebg-preview 1.png" alt="logoEmpresa">
        </a>

        <img onclick="chamaMenu()" src="Frontend/FrontendPages/img/menu-suspenso.png" class="menu" alt="menu">

        <ul class="retratil">
            <li class="menuItens" style="font-weight:400;"><a href="Frontend\FrontendPages\mapa\mapa.html">Mapa de localização</a></li>
            <li class="menuItens"><a href="Frontend\FrontendPages\blog\blog.html">Blog</a></li>
            <li class="menuItens"><a href="Frontend\FrontendPages\institucional\institucional.html">Institucional</a></li>
            <li><a href="<?php echo $loginRoute; ?>">Login</a></li>
        </ul>
    </header>

    <section class="home" id="topo">
        <div class="box">
            <div>
                <h1>CONHEÇA NOSSA ESTRUTURA</h1>
                <p>São Paulo - Capital</p>
                <a href="Frontend/FrontendPages/institucional/institucional.html">Veja</a>
