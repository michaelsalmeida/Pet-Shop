function activateToast(param) {
  if (param == true) {
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
    });

    Toast.fire({
      icon: "error",
      title: "Data não disponível",
    });
  }
}

function perfilCliToast(param) {
  if (param == true) {
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
    });

    Toast.fire({
      icon: "success",
      title: "Cliente alterado com sucesso",
    });
  } else if (param == "false") {
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
    });

    Toast.fire({
      icon: "error",
      title: "Este email pertence a outro usuário.",
    });
  }
}
