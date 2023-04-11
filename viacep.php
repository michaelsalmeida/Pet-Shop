<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
        function limpar_formulário(){
            document.getElementById('rua').value = '';
            document.getElementById('bairro').value = '';
            document.getElementById('cidade').value = '';
            document.getElementById('uf').value = '';
        }

        function meu_callback(conteudo){
            if (!("erro" in conteudo)){
                document.getElementById('rua').value = conteudo.logradouro;
                document.getElementById('bairro').value = conteudo.bairro;
                document.getElementById('cidade').value = conteudo.localidade;
                document.getElementById('uf').value = conteudo.uf;

            } else {
                limpar_formulário();
                alert('CEP não encontrado.');
            }
        }

        function pesquisacep(valor){
            var cep = valor.replace(/\D/g, '');
            
            if (cep != ''){
                var validacep = /^[0-9]{8}$/;

                if (validacep.test(cep)) {

                    document.getElementById('rua').value = '...';
                    document.getElementById('bairro').value = '...';
                    document.getElementById('cidade').value = '...';
                    document.getElementById('uf').value = '...';

                    var script = document.createElement('script');

                    script.scr = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                    document.body.appendChild(script);

                } else {
                    limpar_formulário();
                    alert("Formato de CEP inválido");
                } 
            } else {
                limpar_formulário();


        }

    }



    </script>
</head>
<body>
    
</body>
</html>
