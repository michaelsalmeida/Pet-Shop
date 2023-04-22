<?php
$root = "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/Pet-Shop/";
$rootBack = $root . "backend/";
$rootBackProc = $rootBack . "processos/";
$rootBackFunctions = $rootBack . "funcoes/";
$rootFront = $root . "pages/";
$rootCliPages = $rootFront . "cliente/";
$rootFunPages = $rootFront . "funcionario/";
$connRoute = $_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php';

// ----------------------    Rotas Estáticas    -----------------------------

$blogRoute = $rootCliPages . "blog.php";
$sobreRoute = $rootCliPages . "sobrenos.php";
$blogRoute = $rootCliPages . "blog.php";
$contatoRoute = $rootCliPages . "contato.php";

//                           FIM Rotas Estáticas




// ----------------------    Rotas do Funcionário    -----------------------------

$loginFunRoute = $rootFunPages . "loginFuncionario.php";
$agendamentoFunRoute = $rootFunPages . "agendamentosFun.php";
$cadastradaDatasRoute = $rootFunPages . "cadastrarDatas.php";
$cadastrarFunRoute = $rootFunPages . "cadFun.php";
$listarFunRoute = $rootFunPages . "listarFuncionario.php";
$agendarParaClienteRoute = $rootFunPages . "agendarParaCliente.php";

//                           FIM Rotas Funcionário




// ----------------------    Rotas do Cliente    -----------------------------
$cadastroCliRoute = $rootCliPages . "cadastroCli.php"; // em processo
$loginCliRoute = $rootCliPages . "loginCliente.php";
$agendamentoCliRoute = $rootCliPages . "agendamentosCli.php";
$fazAgendamentoCliRoute = $rootCliPages . "fazerAgendamentoCli.php";
$animaisCliRoute = $rootCliPages . "animaisCli.php";
$cadAnimaisCliRoute = $rootCliPages . "cadAnimaisCli.php";
$meuPerfilCliRoute = $rootCliPages . "meuPerfilCli.php";
$homeRoute = $root . "index.php";


//                           FIM Rotas Cliente




// ----------------------    Rotas dos Processos    -----------------------------
$procLoginCliRoute = $rootBackProc . "proc_loginCli.php";
$procLoginFunRoute = $rootBackProc . "proc_loginFun.php";
$procCadCliRoute = $rootBackProc . "proc_cadCli.php";
$proc_altCliRoute = $rootBackProc . "proc_altCli.php";
$procExcCliRoute = $rootBackProc . "proc_excCliente.php";
$proc_cadAnimalRoute = $rootBackProc . "proc_cadAnimal.php";
$proc_altAnimalCliRoute = $rootBackProc . "proc_altAnimal.php";
$procExcAnimalRoute = $rootBackProc . "proc_excAnimal.php";
$procCadDataRoute = $rootBackProc . "proc_cadData.php";
$procCadFunRoute = $rootBackProc . "proc_cadFun.php";
$procSalvarDetalhesRoute = $rootBackProc . "proc_salvarDetalhes.php";



// ----------------------    Rotas com JavaScripts    -----------------------------
$functionsRoute = $rootBackFunctions . "functions.js";
$viacepRoute = $rootBackFunctions . "viacep.js";
$dataHojeRoute = $rootBackFunctions . "dataHoje.js";
$confSenhaRoute = $rootBackFunctions . "confSenha.js";
$aaa = $rootBackFunctions . "aaa.js";



$funcoesRoute = $_SERVER['DOCUMENT_ROOT'] . "/Pet-Shop/backend/funcoes/funcoes.php";

//30785213031
//51805990080
//47650703010
//20676872042 esteticista
//33869223090 veterinario