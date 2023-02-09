

const departamentoNuevo = document.getElementById('departamento_id');
const ciudadNuevo = document.getElementById('ciudad_id');
const  evento = document.getElementById('evento_id');

const inputUpdateNombre = document.getElementById('nombre');
const inputUpdateDescripcion = document.getElementById('descripcion');
const PrevisualizarImagenUpdate = document.getElementById('PrevisualizarImagen');
const inputUpdateFechaInicio = document.getElementById('fechaInicio');
const inputUpdateFechaFin = document.getElementById('fechaFin');
const inputDepartamentoActual = document.getElementById('departamentoActual');
const inputCiudadActual = document.getElementById('ciudadActual');
const inputLugarActual = document.getElementById('lugarActual');






evento.onchange = () => {
    const http = new XMLHttpRequest();
    let ruta = "/eventos/actualizar/"+evento.value;
    http.open("GET",ruta);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            let respuesta = JSON.parse(this.response);
            console.log(respuesta);
            inputUpdateNombre.value = respuesta['nombre'];
            inputUpdateDescripcion.value = respuesta['descripcion'];
            PrevisualizarImagenUpdate.setAttribute('src','/img/eventos/'+respuesta['imagen']);
            inputUpdateFechaInicio.value = respuesta['fechaInicio'];
            inputUpdateFechaFin.value = respuesta['fechaFin'];
            const http2 = new XMLHttpRequest();
            let ruta2 = "/departamento/ciudad/"+respuesta['ciudad_id'];
            http2.open("GET",ruta2);
            http2.send();
            http2.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200)
                {
                    let respuesta2 = JSON.parse(http2.response);
                    console.log(respuesta2);
                    inputDepartamentoActual.value = respuesta2[0]['nombreDepar'];
                    inputCiudadActual.value = respuesta2[0]['NombreCiudad'];
                }
            }
}
}
const http4 = new XMLHttpRequest();
let ruta4 = "/lugares-eventos/"+evento.value;
http4.open("GET",ruta4);
http4.send();
http4.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200)
    {
        let respuesta4 = JSON.parse(this.response);
        inputLugarActual.value = respuesta4[0]['nombreLugar'];
    }


}




departamentoNuevo.onchange = () => {
    const http3 = new XMLHttpRequest();
    let ruta3 = "/ciudad/departamento/"+departamentoNuevo.value;
    http3.open("GET",ruta3);
    http3.send();
    http3.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            let respuesta3 = JSON.parse(this.response);
            limpiar(ciudadNuevo);
            for(let i = 0; i < respuesta3.length; i++)
            {
                let opcion =  document.createElement('option');
                    opcion.text = respuesta3[i]['nombre']
                    opcion.value = respuesta3[i]['id']
                    ciudadNuevo.appendChild(opcion);
            }
        }
}}


}