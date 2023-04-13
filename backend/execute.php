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
        case 'gerarTabelaAgenCli':
            echo gerarTabelaAgenCli();
            break;
        case 'gerarTabelaFazAgenCli':
            echo gerarTabelaFazAgenCli();
            break;
        case 'gerarTabelaAgenFun':
            echo gerarTabelaAgenFun();
            break;
    }
