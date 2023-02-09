let boton = document.getElementById('eliminarEvento');
let boton2 = document.getElementById('eliminarEvento2');
let eventoId = document.getElementById('evento');


boton.onclick = () => {
    Swal.fire({
        title: 'Estas seguro?',
        text: "No se podra recuperar el evento ni informacion relacionada!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {

                boton2.click();
            
        }
      }) 
}