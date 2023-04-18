<?php
include_once("rotas.php");
require_once $funcoesRoute;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hamtaro Petshop</title>
  <link rel="stylesheet" href="pages/css-estatico/header.css">
  <link rel="stylesheet" href="pages/css-estatico/home.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  
  <script src="<?php echo $functionsRoute; ?>"></script>
</head>

<body>
  
  <div class="contatoHeader">
    <p>(11) 98253-2481</p>
    <img src="pages/img-estatico/endereço.svg" alt="">
  </div>

  <header>
    <a href="#" class="logo">
      <img src="pages/img-estatico/logo.svg" alt="">
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
            header("Location: " . $agendamentoFunRoute);
          } else {
            echo "
              <a href='$fazAgendamentoCliRoute'>Fazer Agendamento</a>
              <a href='$cadAnimaisCliRoute'>Cadastrar Animais</a>
              <button onclick='executeFunctions(" . '"logoff" , ""' . ")'>Sair</button>";
          }
        } else {
          echo "<a href='$loginCliRoute'><img src='pages/img-estatico/login.svg' alt=''> Login</a>";
          echo "<a href='$cadastroCliRoute'>Cadastro</a>";
        }

        ?>
      </div>
    </div>  
        
    <img src="pages/img-estatico/menu.png" class="menu" alt="menu">
  </header>




  <section class="container carrossel">
    <div class="container" id="slider-container">
      <div id="carouselMainControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="pages/img-estatico/carousel01.svg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="pages/img-estatico/carousel02.svg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="pages/img-estatico/carousel03.svg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselMainControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselMainControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </section>





  <section class="container row agendamento">
    <div class="col-md-7">
      <h1>Agende agora a consulta do seu pet com os melhores veterinários no Petshop Hamtaro!</h1>

      <h2>No Petshop Hamtaro, oferecemos uma equipe de veterinários altamente qualificados, prontos para atender seu pet
        com cuidado e dedicação, além de consultas personalizadas para garantir a saúde e bem-estar do seu melhor amigo.
      </h2>

      <a href="<?php echo $agendamentoCliRoute; ?>">Agendamento</a>
    </div>

    <img class="col-md-4" src="pages/img-estatico/agendar.svg" alt="">
  </section>





  <section class="container-fluid desconto">
    <h2>30% DE DESCONTO NA VACINAÇÃO</h2>

    <div>
      <img src="pages/img-estatico/desconto1.svg" alt="">
      <img src="pages/img-estatico/desconto2.svg" alt="">
      <img src="pages/img-estatico/desconto3.svg" alt="">
      <img src="pages/img-estatico/desconto4.svg" alt="">
    </div>

    <p>Não deixe a saúde do seu pet de lado! No Petshop Hamtaro, estamos oferecendo um desconto especial de 30% em todas
      as vacinas para cães e gatos. Isso significa que você pode manter o seu pet protegido contra doenças comuns e
      perigosas por um preço muito mais acessível.</p>

    <a href="<?php echo $fazAgendamentoCliRoute; ?>">Faça sua consulta</a>
  </section>





  <section class="container servicos">
    <h2>SERVIÇOS DISPONÍVEIS NO HAMTARO PETSHOP</h2>

    <p>Proporcione ao seu animal de estimação os melhores cuidados e atenção que ele merece, agende agora mesmo os
      serviços de alta qualidade oferecidos em nosso pet shop.</p>

    <div class="boxServicos">
      <div>
        <img src="pages/img-estatico/banho-e-tosa.svg" alt="">
        <h3>Banho e tosa</h3>
        <p>O serviço de banho e tosa do Hamtaro Petshop inclui a lavagem, corte de pelos e limpeza de ouvidos e unhas do animal. É importante escolher um profissional qualificado para garantir a higiene e a aparência do seu animal de estimação.</p>
      </div>

      <div>
        <img src="pages/img-estatico/Delivery.svg" alt="">
        <h3>Delivery</h3>
        <p>O Hamtaro é um petshop que oferece o serviço de entrega de pets em casa. Esse serviço permite que os clientes
          possam receber seus animais de estimação com comodidade e segurança, sem precisar se deslocar até a loja
          física.</p>
      </div>

      <div>
        <img src="pages/img-estatico/Doctor.svg" alt="">
        <h3>Clinico</h3>
        <p>A clínica veterinária da Hamtaro oferece serviços completos e confiáveis, incluindo consultas, vacinação,
          exames laboratoriais, cirurgias e internação. A equipe de veterinários experientes e qualificados cuidará da
          saúde e do bem-estar do seu animal de estimação.</p>
      </div>
    </div>

    <a href="">Confira</a>
  </section> 


  

  <section class="container pagamento">

    <div class="botoes">
      <button class="btn-pagamento">Formas de pagamentos</button>
      <button class="btn-pagamento btn-valores">Valores</button>
    </div>


    <div class="conteudo-pagamento">

      <div class="item-pagamento">

        <img src="pages/img-estatico/debito.svg" alt="débito">
        <p>Débito</p>

      </div>


      <div class="item-pagamento">

        <img src="pages/img-estatico/pix.svg" alt="pix">
        <p>Pix</p>

      </div>

      <div class="item-pagamento">

        <img src="pages/img-estatico/credito.svg" alt="crédito">
        <p>Crédito</p>

      </div>

      <div class="item-pagamento">

        <img src="pages/img-estatico/boleto.svg" alt="crédito">
        <p>Boleto</p>

      </div>

    </div>
  </section>

  <footer>
    <a href="#" class="logo">
      <img src="pages/img-estatico/logo.svg" alt="">
    </a>

    <div class="links">
      <a href="<?php echo $blogRoute; ?>">BLOG</a>
      <a href="<?php echo $sobreRoute; ?>">SOBRE NÓS</a>
      <a href="<?php echo $contatoRoute; ?>">CONTATO</a>
    </div>

    <div class="redes">
      <img src="pages/img-estatico/facebook.svg" alt="">
      <img src="pages/img-estatico/youtube.svg" alt="">
      <img src="pages/img-estatico/twitter.svg" alt="">
      <img src="pages/img-estatico/github.svg" alt="">
    </div>

    <p>© Hamtaro Petshop todos direitos reservados</p>
  </footer>

  <script src="pages/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>