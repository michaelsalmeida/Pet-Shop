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

// ----------------------    Rotas do Funcionário    -----------------------------


//                           FIM Rotas Funcionário


// ----------------------    Rotas do Cliente    -----------------------------
$loginCliRoute = $rootBackPages . "loginCliente.php";
$homeRoute = $root . "index.php";


//                           FIM Rotas Cliente


// ----------------------    Rotas dos Processos    -----------------------------
$procLoginCliRoute = $rootBackProc . "proc_loginCli.php";


$functionsRoute = $rootBackFunctions . "functions.js";

// $verificacaoRoute = $_SERVER['DOCUMENT_ROOT'] . "/Pet-Shop/backend/funcoes/verificacao.php";
$verificacaoRoute = $_SERVER['DOCUMENT_ROOT'] . "/backend/funcoes/verificacao.php";
