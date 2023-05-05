function activateToast(param) { // função que ativa os avisos na tela de acordo com a mensagem que será passada.
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
  });

  if (param.includes("Bem vindo")){
    Toast.fire({
      icon: "success",
      title: `${param}`,
    });
  }

  switch (param){
    case "Data cadastrada com sucesso":
      Toast.fire({
        icon: "success",
        title: `${param}`,
      });
      break;

    case "Data Indisponível":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break;

    case "Data não cadastrada":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break;

    case "Horário Indisponível":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break;

    case "CPF inválido":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break;

    case "Funcionário Cadastrado com Sucesso":
      Toast.fire({
        icon: "success",
        title: `${param}`,
      });
      break;

    case "CPF já cadastrado":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break;

    case "Data de nascimento inválida":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break;

    case "Animal Cadastrado com successo":
      Toast.fire({
        icon: "success",
        title: `${param}`,
      });
      break;

    case "Animal Não Cadastrado":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break;

    case "Selecione um animal por favor":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 

    case "Funcionário demitido com sucesso":
      Toast.fire({
        icon: "success",
        title: `${param}`,
      });
      break; 
    
    case "Erro ao demitir funcionário":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 

    case "Usuário ou senha incorretos(s)":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 
    
    case "Por favor, faça o login primeiro.":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 

    case "Agendamento Realizado":
      Toast.fire({
        icon: "success",
        title: `${param}`,
      });
      break; 
    
    case "Animal alterado com successo":
      Toast.fire({
        icon: "success",
        title: `${param}`,
      });
      break; 
    
    case "Cliente Cadastrado com Sucesso":
      Toast.fire({
        icon: "success",
        title: `${param}`,
      });
      break; 

    case "Email já cadastrado":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 
    
    case "Cliente não Cadastrado":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 

    case "Comentário enviado com sucesso":
      Toast.fire({
        icon: "success",
        title: `${param}`,
      });
      break;
      
    case "Erro ao enviar o comentário":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 

    case "Error":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 

    case "Animal Excluído com Sucesso":
      Toast.fire({
        icon: "success",
        title: `${param}`,
      });
      break;

    case "Animal Não Excluído":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 

    case "Alteração feita com sucesso":
      Toast.fire({
        icon: "success",
        title: `${param}`,
      });
      break;

    case "Erro ao alterar usuário":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 

    case "Data já cadastrada":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 

    case "CPF Incorreto":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 

    case "CPF não está no sistema":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 

    case "Nenhum animal encontrado para esse CPF":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 

    case "Nenhum CPF encontrado":
      Toast.fire({
        icon: "error",
        title: `${param}`,
      });
      break; 

    case "Agendamento realizado com sucesso":
      Toast.fire({
        icon: "success",
        title: `${param}`,
      });
      break; 

  } 

}


