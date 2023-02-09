const departamentoSelect = document.getElementById('departamento');
const ciudadSelect = document.getElementById('ciudad');


const limpiar = (ciudad) => {
    for (let i = ciudad.options.length; i >= 0; i--) {
        ciudad.remove(i);
    }
  };



departamentoSelect.onchange = () => {
    const ruta = "/ciudad/departamento/"+departamentoSelect.value;
    const http = new XMLHttpRequest();
    http.open('GET',ruta);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const respuesta = JSON.parse(http.response);
            limpiar(ciudadSelect);
            console.log(respuesta[0])
            for(let i = 0; i < respuesta.length; i++)
                {
                    let opcion =  document.createElement('option');
                    opcion.text = respuesta[i]['nombre']
                    opcion.value = respuesta[i]['id']
                    ciudadSelect.appendChild(opcion);
                };
          }
    }
}