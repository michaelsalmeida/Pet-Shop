
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
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}${extra}`, false);
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

    } else if (tipo == 'animais') {
        var cpf = document.getElementById('cpf').value;
        var extra = `&cpf=${cpf}`;
    }

    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${tipo}${extra}`, false);
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

function filtros(pag) {
    var filtro = "", alt = ""

    if (pag == "agendamentosFun") {
        filtro = ["status", "pesq"]
        alt = ["Disponivel", ""]
    } else if (pag == "listarFuncionario") {
        filtro = ["situacoes", "pesq"]
        alt = ["ativo", ""]
    } else if (pag == "comentarios") {
        filtro = ["data", "pesq"]
        alt = ["", ""]
    } else if (pag == "agendarParaCliente") {
        filtro = ["cpf", "animais", "servico", "pesq"]
        alt = ["", "", "", ""]
    } else if (pag == "fazerAgendamentoCli") {
        filtro = ["animais", "tipoAgen", "dataAgen"]
        alt = ["", "", ""]
    }
    
    filtro.forEach(function(elemento, index) { 
        var params = new URLSearchParams(location.search);
        var status = params.get(elemento);
        if (status == null) {
            status = alt[index];
        }
        document.getElementById(elemento).value = status;
    });

    if (pag == "agendarParaCliente" && document.getElementById("cpf").value != "") {
        queryBanco2('animais')
        paginacao('tabelaFunAgenCli')
    } else if (pag == "fazerAgendamentoCli") {
        paginacao('gerarTabelaFazAgenCli')
    }
}

function paginacao(tipo) {
    var extra = "";

    if (tipo == 'gerarTabelaDeleteFun') { // Listar funcionário
        var pesq = document.getElementById('pesq').value;
        var filtro = document.getElementById('situacoes').value;
        extra = `&pesq=${pesq}&situacoes=${filtro}`;
        
    } else if (tipo == 'gerarTabelaAgenFun') { // Puxar os agendamentos para o funcionário
        var pesq = document.getElementById('pesq').value;
        var filtro = document.getElementById('status').value;
        extra = `&pesq=${pesq}&status=${filtro}`;

    } else if (tipo == 'tabelaFunAgenCli'){
        var cpf = document.getElementById('cpf').value;
        var animal = document.getElementById('animais').value;
        var servico = document.getElementById('servico').value;
        var pesq = document.getElementById('pesq').value;
        extra = `&cpf=${cpf}&animais=${animal}&servico=${servico}&pesq=${pesq}`;

    } else if (tipo == 'tabelaComentarios'){
        var pesq = document.getElementById('pesq').value;
        var data = document.getElementById('data').value;
        extra = `&pesq=${pesq}&data=${data}`;

    } else if (tipo == 'gerarTabelaFazAgenCli') {
        var ani = document.getElementById('animais').value
        var tipoAgen = document.getElementById('tipoAgen').value
        var data = document.getElementById('dataAgen').value
        extra = `&animais=${ani}&tipoAgen=${tipoAgen}&dataAgen=${data}`;
    }

    var pag = document.getElementById('pag').innerText
    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${tipo}&pag=${pag}${extra}`, false);
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
        xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${tipo}${extra}`, false);
        xhr.onload = function () {
            if (xhr.readyState === xhr.DONE && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor e passa para JSON
                document.getElementById(response[0]).innerHTML = response[1];
                if (response[1] == "CPF não está no sistema"){
                    activateToast("CPF não está no sistema");
                } else if (response[1] == "Nenhum animal encontrado para esse CPF") {
                    activateToast("Nenhum animal encontrado para esse CPF");
                } else {
                    if (response[1].length > 74){
                        document.getElementById('servico').style.display = 'flex';
                        document.getElementById('divpesq').style.display = 'flex';
                        document.getElementById('tabela').style.display = 'flex';
                        document.getElementById('animais').style.display = 'flex';
                    } else {
                        document.getElementById('servico').style.display = 'none';
                        document.getElementById('divpesq').style.display = 'none';
                        document.getElementById('tabela').style.display = 'none';
                    }
                    // Seleciona o elemento de acordo com o primeiro valor do JSON
                    // e coloca o segundo valor dentro deste elemento
                }
            }
        
        };
    } else if (tipo == 'verificar'){
        var cpf = document.getElementById('cpf').value;
        var extra = `&cpf=${cpf}`;

        var xhr = new XMLHttpRequest();
        // Executa o arquivo que irá iniciar a função
        xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${tipo}${extra}`, false);
        xhr.onload = function () {
            if (xhr.readyState === xhr.DONE && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor e passa para JSON
                if (response[1] == "Nenhum CPF encontrado"){
                    document.getElementById('animal').style.display = 'none';
                    activateToast("Nenhum CPF encontrado")
                } else {
                    document.getElementById(response[0]).innerHTML = response[1];
                    document.getElementById('animal').style.display = 'block';
                }
            }
        }
    }
    xhr.send();
}

function altAnimal() {
    var idAni = document.getElementsByName("idAnimal")[0].value // Pega o id do animal

    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=altAnimal&idAni=${idAni}`, false);
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

            <a class='sim' href = "` + location.origin + `/Pet-Shop/backend/processos/proc_cancelAgen.php?id=${id}` + `">Sim</a>
            <button class='nao' onclick="document.getElementById('id01').style.display='none'">Não</button> 
        </div> 

        </div>`;

    } else { // se o botão não passar o tipo Cancelar
        // Busca os detalhes no servidor

        var xhr = new XMLHttpRequest();
        // Executa o arquivo que irá iniciar a função
        xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=getDesc&id=${id}`, false);

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

        <a class='sim' href = "` + location.origin + `/Pet-Shop/backend/processos/proc_excCliente.php?id=${id}` + `">Sim</a>
        <button class='nao' onclick="document.getElementById('id01').style.display='none'">Não</button> 

    </div>    
    </div>`;
}

function activeModalAlterarSenha(id) {

    document.getElementById("id01").style.display = "flex" // Muda a modal para block, para que possa ser vista
    document.getElementById("container-modal").innerHTML = `

    <form action="` + location.origin + `/Pet-Shop/backend/processos/proc_AlterarSenha.php?id=${id}` + `" method="post" class='box-modal'>


        <div class='box-superior-modal'>
            <h3>Altere sua senha</h3>
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button   w3-display-topright">&times;</span>
        </div>

        <div class='box-input-modal'>
            <label for="senhaAtual">Senha atual: <button type="button" id="toggleButton" class="bi-eye-fill" onclick="mostrarSenha('toggleButton', 'password')"></button></label>
            <input pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)(?=.*[^\\w\\s]).{8,}$" type="password" name="senhaAtual" id="password" required placeholder='Digite a senha atual:'>
        </div>

        <div class='box-input-modal'>

            <label for="senha">Nova senha: <button type="button" id="toggleButton2" class="bi-eye-fill" onclick="mostrarSenha('toggleButton2', 'password2')"></button></label>
            <input pattern='^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)(?=.*[^\\w\\s]).{8,}$' type="password" name="senha" id = "password2" required placeholder='Digite a nova senha:'>

        </div>


        <div class='box-input-modal'>

            <label for="confsenha">Confirme a nova senha: <button type="button" id="toggleButton3" class="bi-eye-fill" onclick="mostrarSenha('toggleButton3', 'password3')"></button></label>

            <input pattern='^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)(?=.*[^\\w\\s]).{8,}$' type="password" name="confsenha" id = "password3" required placeholder='Confirme a nova senha:'>
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
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=getDesc&id=${id}`, false);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Pega a resposta do servidor
            // Verifica se o funcionário não é um admin ou secretaria
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
    document.getElementById("alterarEnd").style.display = "none";
}

function altMeuPerfilCli() {
    var idCli = document.getElementsByName("idCliente")[0].value
    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=altMeuPerfilCli&idCli=${idCli}`, false);
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
        "CACHORRO": `<option value="Akita">Akita</option>
        <option value="Basset Hound">Basset Hound</option>
        <option value="Beagle">Beagle</option>
        <option value="Boxer">Boxer</option>
        <option value="Bull Terrier">Bull Terrier</option>
        <option value="Bulldog Francês">Bulldog Francês</option>
        <option value="Chihuahua">Chihuahua</option>
        <option value="Cocker Spaniel">Cocker Spaniel</option>
        <option value="Dálmata">Dálmata</option>
        <option value="Doberman">Doberman</option>
        <option value="Golden Retriever">Golden Retriever</option>
        <option value="Husky Siberiano">Husky Siberiano</option>
        <option value="Labrador Retriever">Labrador Retriever</option>
        <option value="Maltês">Maltês</option>
        <option value="Mastiff">Mastiff</option>
        <option value="Pastor Alemão">Pastor Alemão</option>
        <option value="Pequinês">Pequinês</option>
        <option value="Pointer">Pointer</option>
        <option value="Poodle">Poodle</option>
        <option value="Pug">Pug</option>
        <option value="Rottweiler">Rottweiler</option>
        <option value="Schnauzer">Schnauzer</option>
        <option value="Schnauzer Gigante">Schnauzer Gigante</option>
        <option value="São Bernardo">São Bernardo</option>
        <option value="Setter Irlandês">Setter Irlandês</option>
        <option value="Shar Pei">Shar Pei</option>
        <option value="Shiba Inu">Shiba Inu</option>
        <option value="Shih Tzu">Shih Tzu</option>
        <option value="Weimaraner">Weimaraner</option>
        <option value="Yorkshire Terrier">Yorkshire Terrier</option>
        <option value="Vira-lata">Vira-lata</option>
        <option value="Outros">Outros</option>`,

        "GATO": `<option value="Abissínio">Abissínio</option>
        <option value="American Shorthair">American Shorthair</option>
        <option value="Azul Russo">Azul Russo</option>
        <option value="Bengal">Bengal</option>
        <option value="Burmese">Burmese</option>
        <option value="British Shorthair">British Shorthair</option>
        <option value="Cornish Rex">Cornish Rex</option>
        <option value="Devon Rex">Devon Rex</option>
        <option value="Exótico">Exótico</option>
        <option value="Gato Siberiano">Gato Siberiano</option>
        <option value="Himalaio">Himalaio</option>
        <option value="Maine Coon">Maine Coon</option>
        <option value="Manx">Manx</option>
        <option value="Munchkin">Munchkin</option>
        <option value="Norueguês da Floresta">Norueguês da Floresta</option>
        <option value="Ocicat">Ocicat</option>
        <option value="Peterbald">Peterbald</option>
        <option value="Persa">Persa</option>
        <option value="Pixie Bob">Pixie Bob</option>
        <option value="Ragdoll">Ragdoll</option>
        <option value="Sagrado da Birmânia">Sagrado da Birmânia</option>
        <option value="Scottish Fold">Scottish Fold</option>
        <option value="Siamês">Siamês</option>
        <option value="Snowshoe">Snowshoe</option>
        <option value="Sokoke">Sokoke</option>
        <option value="Sphynx">Sphynx</option>
        <option value="Tonquinês">Tonquinês</option>
        <option value="Van Turco">Van Turco</option>
        <option value="Vira-lata">Vira-lata</option>
        <option value="Outros">Outros</option>`,

        "PEIXE": `<option value="Acará-disco">Acará-disco</option>
        <option value="Betta">Betta</option>
        <option value="Bolinha-de-vidro">Bolinha-de-vidro</option>
        <option value="Carpas-koi">Carpas-koi</option>
        <option value="Corydora">Corydora</option>
        <option value="Guppy">Guppy</option>
        <option value="Kinguio">Kinguio</option>
        <option value="Molly">Molly</option>
        <option value="Neon">Neon</option>
        <option value="Pacu">Pacu</option>
        <option value="Platy">Platy</option>
        <option value="Tetra-bandeira">Tetra-bandeira</option>
        <option value="Tetra-cardinal">Tetra-cardinal</option>
        <option value="Tetra-neon">Tetra-neon</option>
        <option value="Tetra-preto">Tetra-preto</option>
        <option value="Outros">Outros</option>`,

        "PÁSSARO": `<option value="Agapornis">Agapornis</option>
        <option value="Calopsita">Calopsita</option>
        <option value="Canário Belga">Canário Belga</option>
        <option value="Caturrita">Caturrita</option>
        <option value="Cockatiel">Cockatiel</option>
        <option value="Diamante Mandarim">Diamante Mandarim</option>
        <option value="Gloster">Gloster</option>
        <option value="Periquito Australiano">Periquito Australiano</option>
        <option value="Periquito-de-Asa-Negra">Periquito-de-Asa-Negra</option>
        <option value="Periquito-de-Cauda-Longa">Periquito-de-Cauda-Longa</option>
        <option value="Periquito-de-Encontro-Amarelo">Periquito-de-Encontro-Amarelo</option>
        <option value="Periquito-de-Mascarilha">Periquito-de-Mascarilha</option>
        <option value="Periquito-Rei">Periquito-Rei</option>
        <option value="Rosela">Rosela</option>
        <option value="Sabiá Laranjeira">Sabiá Laranjeira</option>
        <option value="Outros">Outros</option>`,

        "HAMSTER": `<option value="Angorá">Angorá</option>
        <option value="Anão russo">Anão russo</option>
        <option value="Bumblebee">Bumblebee</option>
        <option value="Campbell">Campbell</option>
        <option value="Chinês">Chinês</option>
        <option value="Djungarian">Djungarian</option>
        <option value="Golden">Golden</option>
        <option value="Panda">Panda</option>
        <option value="Rex">Rex</option>
        <option value="Roborovski">Roborovski</option>
        <option value="Siberiano">Siberiano</option>
        <option value="Sírio">Sírio</option>
        <option value="Teddy bear">Teddy bear</option>
        <option value="Turco">Turco</option>
        <option value="Winter White">Winter White</option>        
        <option value="Outros">Outros</option>`,

        "COELHO": `<option value="Coelho Angorá">Coelho Angorá</option>
        <option value="Coelho Californiano">Coelho Californiano</option>
        <option value="Coelho Cabeça de Leão">Coelho Cabeça de Leão</option>
        <option value="Coelho Chinchila">Coelho Chinchila</option>
        <option value="Coelho Flemish Giant">Coelho Flemish Giant</option>
        <option value="Coelho Harlequin">Coelho Harlequin</option>
        <option value="Coelho Havana">Coelho Havana</option>
        <option value="Coelho Himalaio">Coelho Himalaio</option>
        <option value="Coelho Holandês">Coelho Holandês</option>
        <option value="Coelho Hotot">Coelho Hotot</option>
        <option value="Coelho Lionhead">Coelho Lionhead</option>
        <option value="Coelho Mini Rex">Coelho Mini Rex</option>
        <option value="Coelho Netherland Dwarf">Coelho Netherland Dwarf</option>
        <option value="Coelho Polonês">Coelho Polonês</option>
        <option value="Coelho Rex">Coelho Rex</option>
        <option value="Outros">Outros</option>`,

        "TARTARUGA": `<option value="Tartaruga-aligator">Tartaruga-aligator</option>
        <option value="Tartaruga-das-galápagos">Tartaruga-das-galápagos</option>
        <option value="Tartaruga-de-hermann">Tartaruga-de-hermann</option>
        <option value="Tartaruga-hermann">Tartaruga-hermann</option>
        <option value="Tartaruga-de-orelha-vermelha">Tartaruga-de-orelha-vermelha</option>
        <option value="Tartaruga-de-pente">Tartaruga-de-pente</option>
        <option value="Tartaruga-de-pescoço-longo">Tartaruga-de-pescoço-longo</option>
        <option value="Tartaruga-marinha">Tartaruga-marinha</option>
        <option value="Tartaruga-mediterrânea">Tartaruga-mediterrânea</option>
        <option value="Tartaruga-mordedora">Tartaruga-mordedora</option>
        <option value="Tartaruga-pintada">Tartaruga-pintada</option>
        <option value="Tartaruga-sulcata">Tartaruga-sulcata</option>
        <option value="Tartaruga-terrestre-africana">Tartaruga-terrestre-africana</option>
        <option value="Tartaruga-terrestre-russa">Tartaruga-terrestre-russa</option>
        <option value="Tartaruga-verde">Tartaruga-verde</option>
        <option value="Outros">Outros</option>`
    }
    espec = document.getElementById("espec").value.toUpperCase()

    document.getElementById("racas").innerHTML = racas[espec]
}

function validarCampo() {
    racas = {
        "CACHORRO": ["Akita", "Basset Hound", "Beagle", "Boxer", "Bull Terrier",
        "Bulldog Francês", "Chihuahua", "Cocker Spaniel", "Dálmata", "Doberman",
        "Golden Retriever", "Husky Siberiano", "Labrador Retriever", "Maltês",
        "Mastiff", "Pastor Alemão", "Pequinês", "Pointer", "Poodle", "Pug",
        "Rottweiler","Schnauzer", "Schnauzer Gigante", "São Bernardo",
        "Setter Irlandês", "Shar Pei","Shiba Inu", "Shih Tzu", "Weimaraner",
        "Yorkshire Terrier", "Vira-lata", "Outros"],

        "GATO": `Abissínio, American Shorthair, Azul Russo, Bengal, Burmese,
        British Shorthair, Cornish Rex, Devon Rex, Exótico, Gato Siberiano,
        Himalaio, Maine Coon, Manx, Munchkin, Norueguês da Floresta, Ocicat,
        Peterbald, Persa, Pixie Bob, Ragdoll, Sagrado da Birmânia, Scottish Fold,
        Siamês, Snowshoe, Sokoke, Sphynx, Tonquinês, Van Turco, Vira-lata, Outros.`,

        "PEIXE": `Acará-disco, Betta, Bolinha-de-vidro, Carpas-koi, Corydora,
        Guppy, Kinguio, Molly, Neon, Pacu, Platy, Tetra-bandeira, Tetra-cardinal,
        Tetra-neon, Tetra-preto, Outros.`,

        "PÁSSARO": `Agapornis, Calopsita, Canário Belga, Caturrita, Cockatiel,
        Diamante Mandarim, Gloster, Periquito Australiano, Periquito-de-Asa-Negra,
        Periquito-de-Cauda-Longa, Periquito-de-Encontro-Amarelo, Periquito-de-Mascarilha,
        Periquito-Rei, Rosela, Sabiá Laranjeira, Outros`,

        "HAMSTER": `
        Angorá, Anão russo, Bumblebee, Campbell, Chinês, Djungarian, Golden, Panda,
        Rex, Roborovski, Siberiano, Sírio, Teddy bear, Turco, Winter White, Outros`,

        "COELHO": `Coelho Angorá, Coelho Californiano, Coelho Cabeça de Leão,
        Coelho Chinchila, Coelho Flemish Giant, Coelho Harlequin, Coelho Havana,
        Coelho Himalaio, Coelho Holandês, Coelho Hotot, Coelho Lionhead,
        Coelho Mini Rex, Coelho Netherland Dwarf, Coelho Polonês, Coelho Rex, Outros.`,

        "TARTARUGA": `Tartaruga-aligator, Tartaruga-das-galápagos, Tartaruga-de-hermann,
        Tartaruga-hermann, Tartaruga-de-orelha-vermelha, Tartaruga-de-pente,
        Tartaruga-de-pescoço-longo, Tartaruga-marinha, Tartaruga-mediterrânea,
        Tartaruga-mordedora, Tartaruga-pintada, Tartaruga-sulcata,
        Tartaruga-terrestre-africana, Tartaruga-terrestre-russa, Tartaruga-verde, Outros`
    }

    espec = document.getElementById("espec").value.toUpperCase()
    raca = document.getElementById("raca-input").value
    cor = document.getElementById("cor-input").value
    animais = ["CACHORRO", "GATO", "PEIXE", "PÁSSARO", "HAMSTER", "COELHO", "TARTARUGA"]
    cores = ["Preto","Branco","Marrom","Cinza","Bege","Laranja","Amarelo","Vermelho",
    "Azul","Verde","Roxo","Rosa","Dourado","Prateado","Bronze"]

    if (animais.indexOf(espec) != -1 && racas[espec].indexOf(raca) != -1 && cores.indexOf(cor) != -1) {
        document.getElementById("formAltAnimal").submit()
    } else {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

        Toast.fire({
            icon: "error",
            title: "Espécie, Raça ou Cor incorretas",
        });
    }

    document.getElementById("racas").innerHTML = racas[espec]
}