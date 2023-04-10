<?php
    include_once("../rotas.php");
    require_once($verificacaoRoute);

    switch($_GET['function']){
        case 'logoff':
            logoff();
            echo $loginCliRoute;
            break;
    }
