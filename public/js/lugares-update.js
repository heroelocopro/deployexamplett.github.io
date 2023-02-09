const lugarSelect = document.getElementById('lugar');
const inputNombre = document.getElementById('nombre');
const inputDescripcion = document.getElementById('descripcion');
const inputUbicacion = document.getElementById('ubicacion');
const PrevisualizarImagen = document.getElementById('PrevisualizarImagen');
const previsualizarUbicacion = document.getElementById('previsualizarUbicacion');

lugarSelect.onchange = () => 
{
    const http = new XMLHttpRequest();
    let url = "/lugares/actualizar/"+lugarSelect.value;
    http.open('GET',url);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let respuesta = JSON.parse(this.response);
            console.log(respuesta['nombre']);
            inputNombre.value = respuesta['nombre'];
            inputDescripcion.value = respuesta['descripcion'];
            inputUbicacion.value = respuesta['ubicacion'];
            PrevisualizarImagen.setAttribute("src","/img/lugares/"+ respuesta['imagen']);
            previsualizarUbicacion.setAttribute("src",respuesta['ubicacion']);

        }
    }
}