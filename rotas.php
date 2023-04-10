<?php
$root = "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/Pet-Shop" . "/";
// $root = "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/";
$rootBack = $root . "backend/";
$rootBackProc = $rootBack . "processos/";
$rootBackFunctions = $rootBack . "funcoes/";
$rootFront = $root . "pages/";
$rootBackPages = $rootFront . "backendPages/";
$connRoute = $_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/Backend/conexao.php';
// $connRoute = $_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php';


$loginFunRoute = $rootBackPages . "loginFuncionario.php";
$loginCliRoute = $rootBackPages . "loginCliente.php";
$agendamentosRoute = $rootBackPages . "agendamentos.php";
$cadFunRoute = $rootBackPages . "cadFuncionario.php";
$registroRoute = $rootBackPages . "registro.php";
$detalhesRoute = $rootBackPages . "detalhes.php";
$detalhesHistoricoRoute = $rootBackPages . "detalhesHistorico.php";
$historicoRoute = $rootBackPages . "historico.php";

$homeRoute = $root . "index.php";

$procLoginFunRoute = $rootBackProc . "proc_loginFun.php";
$procLoginCliRoute = $rootBackProc . "proc_loginCli.php";
$procCadFunRoute = $rootBackProc . "proc_cadFuncionario.php";
$procRegistroRoute = $rootBackProc . "proc_registro.php";
$procDetalhesRoute = $rootBackProc . "proc_detalhe.php";
$procFechamentoRoute = $rootBackProc . "proc_fechamento.php";
$procLogoffRoute = $rootBackProc . "proc_logoff.php";
$procCalculoRoute = $rootBackProc . "proc_calculo.php";

$confSenhaRoute = $rootBackFunctions . "confsenha.js";
$modalInfRoute = $rootBackFunctions . "modalInf.js";
$engineSenhaRoute = $rootBackFunctions . "enginesenha.js";
$functionsRoute = $rootBackFunctions . "functions.js";

// $verificacaoRoute = $_SERVER['DOCUMENT_ROOT'] . "/Pet-Shop/backend/funcoes/verificacao.php";
$verificacaoRoute = $_SERVER['DOCUMENT_ROOT'] . "/backend/funcoes/verificacao.php";
