<?php
    include_once("../rotas.php");
    require_once($funcoesRoute);

    switch($_GET['function']){
        case 'logoff':
            logoff();
            echo $loginCliRoute;
            break;
        case 'gerarTabelaAni':
            echo gerarTabelaAni();
            break;
        case 'altAnimal':
            echo altAnimal();
            break;
        case 'gerarTabelaAgenCli':
            echo gerarTabelaAgenCli();
            break;
        case 'checkAnimais':
            echo checkAnimais();
            break;
        case 'gerarTabelaFazAgenCli':
            echo gerarTabelaFazAgenCli();
            break;
        case 'fazAgendamentoCli':
            echo fazAgendamentoCli();
            break;
        case 'gerarTabelaAgenFun':
            echo gerarTabelaAgenFun();
            break;
        case 'profissionais':
            echo profissionais();
            break;
    }
