let botonEliminarLugar = document.getElementById('lugarEliminar');
let botonEliminarLugar2 = document.getElementById('lugarEliminar2');


botonEliminarLugar.onclick = () => {
    Swal.fire({
        title: 'Estas seguro?',
        text: "No se podra recuperar el lugar ni informacion relacionada!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {

            botonEliminarLugar2.click();
            
        }
      }) 
}