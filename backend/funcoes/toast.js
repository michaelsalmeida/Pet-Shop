function activateToast(param){ //toast da tela da data cadastrada errada (funcionário).
    if (param == true){
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
          })
          
          Toast.fire({
            icon: 'error',
            title: 'Data não disponível'
          })
      }
    }
