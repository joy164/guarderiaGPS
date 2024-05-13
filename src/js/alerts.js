function AlertaEliminarItem(idItem, page){
    var url = page + "?id=" + idItem;
    
    Swal.fire({
      title: '¿Esta seguro?',
      text: "No puede revertir esta accion",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminalo'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
      }
    })
  }