
function executeFunctions(func, id) {
    // Define as variaveis necessárias no caso da função for acionada pelo botão de agendar
    extra = `&id=${id}`

    if (func == "fazAgendamentoCli") {
        // Pega o id do animal
        var idAnimal = document.getElementById('animais').value
        // Passa o id do agendamento e do animal para adicionar na url
        extra = `&idAgen=${id}&idAni=${idAnimal}`
    } else if (func == "fazerAgenParaCli"){
        var idAnimal = document.getElementById('animais').value;
        extra = `&idAgen=${id}&idAnimal=${idAnimal}`;
    }

    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/backend/execute.php?function=${func}${extra}`, true);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Pega a resposta do servidor
            location.href = response; // Segue a url voltada do servidor
        }
    };
    xhr.send();
}

function queryBanco(tipo) {
    // Define as variaveis necessárias no caso da função for acionada...
    extra = "";
    if (tipo == 'profissionais') { // para puxar os funcionários
        var servico = document.getElementById('servicos').value;
        extra = `&servico=${servico}`;

    } else if (tipo == 'gerarTabelaFazAgenCli') { // Puxar os agendamentos para o agendamento
        var tipoAgen = document.getElementById('tipoAgen').value
        var data = document.getElementById('dataAgen').value
        var extra = `&tipo=${tipoAgen}&data=${data}`;

    } else if (tipo == 'animais') {
        var cpf = document.getElementById('cpf').value;
        var extra = `&cpf=${cpf}`;
    }

    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/backend/execute.php?function=${tipo}${extra}`, true);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            
            var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor e passa para JSON
            document.getElementById(response[0]).innerHTML = response[1];
            
            // Seleciona o elemento de acordo com o primeiro valor do JSON
            // e coloca o segundo valor dentro deste elemento
        }
    };
    xhr.send();
}

function agenFun() {
    var params = new URLSearchParams(location.search);
    var status = params.get('status');
    console.log(status)
    if (status == null) {
        status = 'Disponivel';
    }

    document.getElementById('status').value = status;

    var pesq = params.get('pesq');
    document.getElementById('pesq').value = pesq;
}

function paginacao(tipo) {
    var extra = "";

    if (tipo == 'gerarTabelaDeleteFun') { // Listar funcionário
        var pesq = document.getElementById('pesq').value;
        var filtro = document.getElementById('situacoes').value;
        extra = `&pesq=${pesq}&situ=${filtro}`;
        
    } else if (tipo == 'gerarTabelaAgenFun') { // Puxar os agendamentos para o funcionário
        var pesq = document.getElementById('pesq').value;
        var filtro = document.getElementById('status').value;
        extra = `&pesq=${pesq}&status=${filtro}`;

    } else if (tipo == 'tabelaFunAgenCli'){
        var pesq = document.getElementById('pesq').value;
        var servico = document.getElementById('status').value;
        extra = `&servico=${servico}&pesq=${pesq}`;
    } else if (tipo == 'tabelaComentarios'){
        var pesq = document.getElementById('pesq').value;
        var data = document.getElementById('data').value;
        extra = `&pesq=${pesq}&data=${data}`;
    }

    var pag = document.getElementById('pag').innerText
    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/backend/execute.php?function=${tipo}&pag=${pag}${extra}`, true);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor e passa para JSON
            document.getElementById(response[0]).innerHTML = response[1];
            document.getElementById(response[2]).innerHTML = response[3];
            // Seleciona o elemento de acordo com o primeiro valor do JSON
            // e coloca o segundo valor dentro deste elemento
        }
    };
    xhr.send();
}

function queryBanco2(tipo) {

    // Define as variaveis necessárias no caso da função for acionada...
    extra = "";
    if (tipo == 'animais') {
        var cpf = document.getElementById('cpf').value;
        var extra = `&cpf=${cpf}`;
    

        var xhr = new XMLHttpRequest();
        // Executa o arquivo que irá iniciar a função
        xhr.open("GET", location.origin + `/backend/execute.php?function=${tipo}${extra}`, true);
        xhr.onload = function () {
            if (xhr.readyState === xhr.DONE && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor e passa para JSON
                document.getElementById(response[0]).innerHTML = response[1];
                if (response[1].length > 74){
                    document.getElementById('status').style.display = 'flex';
                    document.getElementById('divpesq').style.display = 'flex';
                    document.getElementById('tabela').style.display = 'flex';
                } else {
                    document.getElementById('status').style.display = 'none';
                    document.getElementById('divpesq').style.display = 'none';
                    document.getElementById('tabela').style.display = 'none';
                }
                // Seleciona o elemento de acordo com o primeiro valor do JSON
                // e coloca o segundo valor dentro deste elemento
            }
        };
    } else if (tipo == 'verificar'){
        var cpf = document.getElementById('cpf').value;
        var extra = `&cpf=${cpf}`;

        var xhr = new XMLHttpRequest();
        // Executa o arquivo que irá iniciar a função
        xhr.open("GET", location.origin + `/backend/execute.php?function=${tipo}${extra}`, true);
        xhr.onload = function () {
            if (xhr.readyState === xhr.DONE && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor e passa para JSON
                document.getElementById(response[0]).innerHTML = response[1];
                console.log(response[1]);
                console.log(response[1].length);
                if (response[1].length > 4){
                    document.getElementById('animal').style.display = 'block';
                    document.getElementById('aviso').style.display = 'none';
                    // document.getElementById('aviso').value = response[1][0];

                } else {
                    document.getElementById('animal').style.display = 'none';
                    document.getElementById('aviso').style.display = 'block';
                }   
            }
        };
    }
    xhr.send();
}

function altAnimal() {
    var idAni = document.getElementsByName("idAnimal")[0].value // Pega o id do animal

    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/backend/execute.php?function=altAnimal&idAni=${idAni}`, true);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor e passa para JSON
            document.getElementsByName("nome")[0].value = response[0];     // Adiciona o primeiro valor do JSON
            document.getElementsByName("dataNasc")[0].value = response[1]; // Adiciona o segundo valor do JSON
            document.getElementsByName("sexo")[0].value = response[2];    // Adiciona o terceiro valor do JSON
            document.getElementsByName("espec")[0].value = response[3];    // Adiciona o terceiro valor do JSON
            document.getElementsByName("raca")[0].value = response[4];     // Adiciona o quarto valor do JSON
            document.getElementsByName("peso")[0].value = response[5];     // Adiciona o quinto valor do JSON
            document.getElementsByName("cor")[0].value = response[6];      // Adiciona o sexto valor do JSON
        }
    };
    xhr.send();
}

function activeModal(id, tipo) {
    document.getElementById("id01").style.display = "flex" // Muda a modal para block, para que possa ser vista

    if (tipo == "Cancelar") { // se o botão passar o tipo Cancelar
        // Monta a modal com os elementos do cancelamento

        document.getElementById("container-modal").innerHTML = `
        <div class='box-modal-detalhes'>
        <p>Você tem certeza que deseja Cancelar este Agendamento?</p>
        <span onclick="document.getElementById('id01').style.display='none'">&times;</span>
        <div class="box-botao">

            <a class='sim' href = "` + location.origin + `/backend/processos/proc_cancelAgen.php?id=${id}` + `">Sim</a>
            <button class='nao' onclick="document.getElementById('id01').style.display='none'">Não</button> 
        </div> 

        </div>`;

    } else { // se o botão não passar o tipo Cancelar
        // Busca os detalhes no servidor

        var xhr = new XMLHttpRequest();
        // Executa o arquivo que irá iniciar a função
        xhr.open("GET", location.origin + `/backend/execute.php?function=getDesc&id=${id}`, true);

        xhr.onload = function () {
            if (xhr.readyState === xhr.DONE && xhr.status === 200) {
                var response = xhr.responseText; // Pega a resposta do servidor
                // e mostrar na tela

                document.getElementById("container-modal").innerHTML = `
                <div class='box-modal-detalhes'>
                    <h2>Descrição do Agendamento</h2>
                    <p>${response}</p>
                    <span onclick="document.getElementById('id01').style.display='none'">&times;</span> 
                </div>`;
            }
        }
        xhr.send();
    }
}

function activeModalApagarConta(id) {
    document.getElementById("id01").style.display = "flex" // Muda a modal para block, para que possa ser vista
    document.getElementById("container-modal").innerHTML = `
    <div class='box-apagar-conta-modal'>

    <h3>Você tem certeza que deseja APAGAR a sua conta?</h3>


    <div class='box-botoes-modal'>

        <a class='sim' href = "` + location.origin + `/backend/processos/proc_excCliente.php?id=${id}` + `">Sim</a>
        <button class='nao' onclick="document.getElementById('id01').style.display='none'">Não</button> 

    </div>    
    </div>`;
}

function activeModalAlterarSenha(id) {

    document.getElementById("id01").style.display = "flex" // Muda a modal para block, para que possa ser vista
    document.getElementById("container-modal").innerHTML = `

    <form action="` + location.origin + `/backend/processos/proc_AlterarSenha.php?id=${id}` + `" method="post" class='box-modal'>


        <div class='box-superior-modal'>
            <h3>Altere sua senha</h3>
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button   w3-display-topright">&times;</span>
        </div>

        <div class='box-input-modal'>
            <label for="senhaAtual">Senha atual: <button type="button" id="toggleButton" class="bi-eye-fill" onclick="mostrarSenha()"></button></label>
            <input pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)(?=.*[^\\w\\s]).{8,}$" type="password" name="senhaAtual" id="password" required placeholder='Digite a senha atual:'>
        </div>

        <div class='box-input-modal'>

            <label for="senha">Nova senha: </label>
            <input pattern='^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)(?=.*[^\\w\\s]).{8,}$' type="password" name="senha"  required placeholder='Digite a nova senha:'>

        </div>


        <div class='box-input-modal'>

            <label for="confsenha">Confirme a nova senha:</label>

            <input pattern='^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)(?=.*[^\\w\\s]).{8,}$' type="password" name="confsenha" required placeholder='Confirme a nova senha:'>
        </div>


        <div class='box-botoes-modal'>

            <button id="alt" disabled class='confirmar-modal'>Confirmar</button>
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class='apagar-conta'>Cancelar</button>

        </div>

    </form>`;

    var confsenha = document.getElementsByName('confsenha')[0] // Pega os inputs de acordo com o name
    var senha = document.getElementsByName('senha')[0]

    confsenha.addEventListener('input', conferir) // Aciona a função quando o input tiver uma entrada
    senha.addEventListener('input', conferir)

    function conferir() {
        if (senha.value == confsenha.value && senha.value != '' && confsenha.value != '') {
            // document.getElementById('senhanaoigual').innerHTML = 'SENHAS COINCIDEM';
            document.getElementById('alt').disabled = false; // se as senhas forem diferentes, o botão será desativado
        } else {
            // document.getElementById('senhanaoigual').innerHTML = 'SENHAS NÃO COINCIDEM';
            document.getElementById('alt').disabled = true;
        }
    }
}

function activeModalDetalhesFun(id, tipo) {
    // Muda a modal para block, para que possa ser vista
    document.getElementById("id01").style.display = "flex"
    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/backend/execute.php?function=getDesc&id=${id}`, true);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Pega a resposta do servidor
            // Verifica se o funcionário não é um admin ou secretaria
            console.log(tipo);
            if (response == 'Os detalhes não foram adicionados ainda'){
                if (tipo == 'Veterinario' || tipo == 'Esteticista') {
                    // então mostra o campo para adicionar os detalhes
                    document.getElementById("container-modal").innerHTML = `

                    <div class='box-modal-detalhes'>

                        <h2>Descrição do Agendamento</h2>
                        <input name="ide" hidden value="${id}"></input>
                        <textarea name="descricao"></textarea>
                        <span onclick="document.getElementById('id01').style.display='none'">&times;</span>
                        <input class='botao-salvar' type='submit' value='Salvar'></input> 
                    </div>`;    

                } else {
                    // Se não só mostra que os detalhes não foram definidos.
                    document.getElementById("container-modal").innerHTML = `
                    <div class='box-modal-detalhes'>
                        <h2>Descrição do Agendamento</h2>
                        <p>Os detalhes não foram adicionados ainda</p>
                        <span onclick="document.getElementById('id01').style.display='none'">&times;</span> 
                    </div>`;

                }
            } else {
                // Se não só mostra que os detalhes não foram definidos.
                document.getElementById("container-modal").innerHTML = `
                <div class='box-modal-detalhes'>
                    <h2>Descrição do Agendamento</h2>
                    <p class='descricao-resposta'>${response}</p>
                    <span onclick="document.getElementById('id01').style.display='none'">&times;</span>
                </div>`;
            }
        }
    }
    xhr.send();
}

function meuPerfilCliPes() {
    // ativa os campos para que possam ser mudados
    document.getElementsByName("nome")[0].removeAttribute("readonly")
    document.getElementsByName("sobrenome")[0].removeAttribute("readonly")
    document.getElementsByName("celular")[0].removeAttribute("readonly")
    document.getElementsByName("email")[0].removeAttribute("readonly")
    // Ativa o botão de confirmação
    document.getElementsByName("conf")[0].removeAttribute("hidden")
    document.getElementById("alterarDados").style.display = "none";
}

function meuPerfilCliEnd() {
    // ativa os campos para que possam ser mudados
    document.getElementsByName("cep")[0].removeAttribute("readonly")
    document.getElementsByName("num")[0].removeAttribute("readonly")
    document.getElementsByName("comp")[0].removeAttribute("readonly")
    // Ativa o botão de confirmação
    document.getElementsByName("conf")[1].removeAttribute("hidden")
}

function altMeuPerfilCli() {
    var idCli = document.getElementsByName("idCliente")[0].value
    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/backend/execute.php?function=altMeuPerfilCli&idCli=${idCli}`, true);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor
            // Preenche os campos com os devidos valores.
            document.getElementsByName("cpf")[0].value = response[0];
            document.getElementsByName("nome")[0].value = response[1];
            document.getElementsByName("sobrenome")[0].value = response[2];
            document.getElementsByName("celular")[0].value = response[3];
            document.getElementsByName("cep")[0].value = response[4];
            document.getElementsByName("log")[0].value = response[5];
            document.getElementsByName("num")[0].value = response[6];
            document.getElementsByName("comp")[0].value = response[7];
            document.getElementsByName("bairro")[0].value = response[8];
            document.getElementsByName("cid")[0].value = response[9];
            document.getElementsByName("uf")[0].value = response[10];
            document.getElementsByName("email")[0].value = response[11];
        }
    };
    xhr.send();
}


function datalistRacas() {
    racas = {
        "CACHORRO": `<option value="Akita">
        <option value="Basset Hound">
        <option value="Beagle">
        <option value="Boxer">
        <option value="Bull Terrier">
        <option value="Bulldog Francês">
        <option value="Chihuahua">
        <option value="Cocker Spaniel">
        <option value="Dálmata">
        <option value="Doberman">
        <option value="Golden Retriever">
        <option value="Husky Siberiano">
        <option value="Labrador Retriever">
        <option value="Maltês">
        <option value="Mastiff">
        <option value="Pastor Alemão">
        <option value="Pequinês">
        <option value="Pointer">
        <option value="Poodle">
        <option value="Pug">
        <option value="Rottweiler">
        <option value="Schnauzer">
        <option value="Schnauzer Gigante">
        <option value="São Bernardo">
        <option value="Setter Irlandês">
        <option value="Shar Pei">
        <option value="Shiba Inu">
        <option value="Shih Tzu">
        <option value="Weimaraner">
        <option value="Yorkshire Terrier">
        <option value="Vira-lata">`,

        "GATO": `<option value="Abissínio">
        <option value="American Shorthair">
        <option value="Azul Russo">
        <option value="Bengal">
        <option value="Burmese">
        <option value="British Shorthair">
        <option value="Cornish Rex">
        <option value="Devon Rex">
        <option value="Exótico">
        <option value="Gato Siberiano">
        <option value="Himalaio">
        <option value="Maine Coon">
        <option value="Manx">
        <option value="Munchkin">
        <option value="Norueguês da Floresta">
        <option value="Ocicat">
        <option value="Peterbald">
        <option value="Persa">
        <option value="Pixie Bob">
        <option value="Ragdoll">
        <option value="Sagrado da Birmânia">
        <option value="Scottish Fold">
        <option value="Siamês">
        <option value="Snowshoe">
        <option value="Sokoke">
        <option value="Sphynx">
        <option value="Tonquinês">
        <option value="Van Turco">
        <option value="Vira-lata">`,

        "PEIXE": `<option value="Acará-disco">
        <option value="Betta">
        <option value="Bolinha-de-vidro">
        <option value="Carpas-koi">
        <option value="Corydora">
        <option value="Guppy">
        <option value="Kinguio">
        <option value="Molly">
        <option value="Neon">
        <option value="Pacu">
        <option value="Platy">
        <option value="Tetra-bandeira">
        <option value="Tetra-cardinal">
        <option value="Tetra-neon">
        <option value="Tetra-preto">`,

        "PÁSSARO": `<option value="Agapornis">
        <option value="Calopsita">
        <option value="Canário Belga">
        <option value="Caturrita">
        <option value="Cockatiel">
        <option value="Diamante Mandarim">
        <option value="Gloster">
        <option value="Periquito Australiano">
        <option value="Periquito-de-Asa-Negra">
        <option value="Periquito-de-Cauda-Longa">
        <option value="Periquito-de-Encontro-Amarelo">
        <option value="Periquito-de-Mascarilha">
        <option value="Periquito-Rei">
        <option value="Rosela">
        <option value="Sabiá Laranjeira">`,

        "HAMSTER": `<option value="Angorá">
        <option value="Anão russo">
        <option value="Bumblebee">
        <option value="Campbell">
        <option value="Chinês">
        <option value="Djungarian">
        <option value="Golden">
        <option value="Panda">
        <option value="Rex">
        <option value="Roborovski">
        <option value="Siberiano">
        <option value="Sírio">
        <option value="Teddy bear">
        <option value="Turco">
        <option value="Winter White">`,

        "COELHO": `<option value="Coelho Angorá">
        <option value="Coelho Californiano">
        <option value="Coelho Cabeça de Leão">
        <option value="Coelho Chinchila">
        <option value="Coelho Flemish Giant">
        <option value="Coelho Harlequin">
        <option value="Coelho Havana">
        <option value="Coelho Himalaio">
        <option value="Coelho Holandês">
        <option value="Coelho Hotot">
        <option value="Coelho Lionhead">
        <option value="Coelho Mini Rex">
        <option value="Coelho Netherland Dwarf">
        <option value="Coelho Polonês">
        <option value="Coelho Rex">`,

        "TARTARUGA": `<option value="Tartaruga-aligator">
        <option value="Tartaruga-das-galápagos">
        <option value="Tartaruga-de-hermann">
        <option value="Tartaruga-hermann">
        <option value="Tartaruga-de-orelha-vermelha">
        <option value="Tartaruga-de-pente">
        <option value="Tartaruga-de-pescoço-longo">
        <option value="Tartaruga-marinha">
        <option value="Tartaruga-mediterrânea">
        <option value="Tartaruga-mordedora">
        <option value="Tartaruga-pintada">
        <option value="Tartaruga-sulcata">
        <option value="Tartaruga-terrestre-africana">
        <option value="Tartaruga-terrestre-russa">
        <option value="Tartaruga-verde">`
    }
    espec = document.getElementById("espec").value.toUpperCase()
    console.log(racas[espec])

    document.getElementById("racas").innerHTML = racas[espec]
}