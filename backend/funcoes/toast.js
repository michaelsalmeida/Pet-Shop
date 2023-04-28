function activateToast(param, tela){
    if (param == true){
      if (tela == 'msgCadDataErro'){
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
    
}