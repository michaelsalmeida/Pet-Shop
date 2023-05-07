<?php
include_once("../../rotas.php");
include_once($connRoute);

$nome = htmlspecialchars($_POST['nome']);
$cpf = htmlspecialchars($_POST['cpf']);
$profissao = htmlspecialchars($_POST['profissao']);
$senha = htmlspecialchars($_POST['senha']);
$hash = hash("sha512", $senha);

// Remove os pontos e hífens do cpf
$cpf = str_replace('.', '', $cpf);
$cpf = str_replace('-', '', $cpf);
// Tranforma a string do cpf em um array
$sep = str_split($cpf, 1);

// Pega os dois últimos valores, que são os dígitos,
// e armazena em duas variáveis
$dig1 = $sep[9];
$dig2 = $sep[10];
$certo1 = false;
$certo2 = false;

// Realiza o calculo utilizando os 9 primeiros valores e os pesos equivalentes
$soma = 0;
$j = 10;
for ($i = 0; $i < count($sep) - 2; $i++) {
    $soma += $sep[$i] * $j;
    $j -= 1;
}

// Calcula o valor do digito, e verifica se ele é maior que 9,
// que serão substituidos por 0
$vDig1 = 11 - $soma % 11;
if ($vDig1 > 9) {
    $vDig1 = 0;
}

// Verifica se o digito calculado é igual ao digitado
if ($dig1 == $vDig1) {
    $certo1 = true;
}

// Realiza o calculo utilizando os 10 primeiros valores e os pesos equivalentes
$soma = 0;
$j = 11;
for ($i = 0; $i < count($sep) - 1; $i++) {
    $soma += $sep[$i] * $j;
    $j -= 1;
}

// Calcula o valor do digito, e verifica se ele é maior que 9,
// que serão substituidos por 0
$vDig2 = 11 - $soma % 11;
if ($vDig2 > 9) {
    $vDig2 = 0;
}

// Verifica se o digito calculado é igual ao digitado
if ($dig2 == $vDig2) {
    $certo2 = true;
}


if ($certo1 && $certo2) {
    $def = 'default';
    try {
        // String de preparação
        $stmt = $conn->prepare("INSERT INTO Funcionarios
            (pk_Funcionario, nome, cpf, profissao, senha, ativo)
            VALUES (default, ?, ?, ?, ?, 'ativo')");
        // Substituição da string preparada pelos valores corretos
        $stmt->bind_param("ssss", $nome, $cpf, $profissao, $hash);
        // Executa o sql
        $stmt->execute();

        // Se a inserção ocorre normalmente, o usuário é enviado para a página de login
        $_SESSION['msgCadFun'] = "Funcionário Cadastrado com Sucesso";
        header('location: ' . $agendamentoFunRoute);
    } catch (mysqli_sql_exception $e) {
        // Pega o código do erro, 1062 é o código de entrada duplicada,
        if ($e->getCode() === 1062 && strpos($e->getMessage(), 'cpf') !== false) {
            // e verifica se na mensagem de error há a string cpf
            $_SESSION['msgCadFun'] = "CPF já cadastrado";
        } else {
            // Trabalha qualquer outro erro
            $_SESSION['msgCadFun'] = "Funcionário não Cadastrado";
        }
        header('Location: ' . $cadastrarFunRoute);
    }
} else {
    $_SESSION['msgCadFun'] = "CPF inválido";
    header("Location: " . $cadastrarFunRoute);
}
