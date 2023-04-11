<?php
    include_once("../rotas.php");
    require_once($funcoesRoute);

    switch($_GET['function']){
        case 'logoff':
            logoff();
            echo $loginCliRoute;
            break;
        case 'gerarTabela':
            print_r(gerarTabela());
            break;
    }
