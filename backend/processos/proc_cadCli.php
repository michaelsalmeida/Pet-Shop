<?php
    session_start();
    include_once('../../rotas.php');
    include_once($connRoute);

    // Pega os valores do form
    $cpf = htmlspecialchars($_POST['cpf']);
    $nome = htmlspecialchars($_POST['nome']);
    $sobrenome = htmlspecialchars($_POST['sobrenome']);
    $celular = htmlspecialchars($_POST['celular']);
    
    // Endereço
    
    $cep = htmlspecialchars($_POST['cep']);
    $rua = htmlspecialchars($_POST['log']);
    $numero = htmlspecialchars($_POST['numero']);
    $bairro = htmlspecialchars($_POST['bairro']);
    $cidade = htmlspecialchars($_POST['cid']);
    $uf = htmlspecialchars($_POST['uf']);
    
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = hash("sha512", htmlspecialchars($_POST['senha']));

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


    if ($certo1 && $certo2){
        try {
            // String de preparação
            $stmt = $conn->prepare("INSERT INTO Clientes
            (pk_Cliente, cpf, nome, sobrenome, celular, cep, logradouro, numero, bairro, municipio, uf, email, senha)
            VALUES (default, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            // Substituição da string preparada pelos valores corretos
            $stmt->bind_param("ssssssssssss",
            $cpf, $nome, $sobrenome, $celular, $cep, $rua, $numero, $bairro, $cidade, $uf, $email, $senha);
            // Executa o sql
            $stmt->execute();

            // Se a inserção ocorre normalmente, o usuário é enviado para a página de login
            $_SESSION['msgCadCli'] = "Cliente Cadastrado com Sucesso";
            header('location: ' . $loginCliRoute);
        } catch (Exception $e) {
            echo $e->getMessage();
            $_SESSION['msgCadCli'] = "Cliente Não Cadastrado";
            header('Location: ' . $cadastroCliRoute);
        }
    }
