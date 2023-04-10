<?php
    include_once("../rotas.php");
    include_once($verificacaoRoute);

    switch($_GET['function']){
        case 'logoff':
            logoff();
            echo $loginFunRoute;
            break;
    }
