function activateToast(param) {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
  });

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

    case "USUÁRIO OU SENHA INCORRETO(S)":
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

    case "COMENTÁRIO ENVIADO COM SUCESSO":
      Toast.fire({
        icon: "success",
        title: `${param}`,
      });
      break;
      
    case "ERRO AO ENVIAR O COMENTÁRIO":
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
  } 



}







// function perfilCliToast(param) {
//   if (param == true) {
//     const Toast = Swal.mixin({
//       toast: true,
//       position: "top-end",
//       showConfirmButton: false,
//       timer: 3000,
//       timerProgressBar: true,
//     });

//     Toast.fire({
//       icon: "success",
//       title: "Cliente alterado com sucesso",
//     });
//   } else if (param == "false") {
//     const Toast = Swal.mixin({
//       toast: true,
//       position: "top-end",
//       showConfirmButton: false,
//       timer: 3000,
//       timerProgressBar: true,
//     });

//     Toast.fire({
//       icon: "error",
//       title: "Este email pertence a outro usuário.",
//     });
//   }
// }
