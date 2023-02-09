const botonEditar = document.getElementById('btnEditar');
const botonActualizar = document.getElementById('btnActualizar');
const InputnameUser = document.getElementById('input-name');
const InputemailUser = document.getElementById('input-email');
const InputperfilUser = document.getElementById('input-perfil');
botonEditar.onclick = ()  => {
    InputnameUser.removeAttribute('disabled');
    InputemailUser.removeAttribute('disabled');
    InputperfilUser.removeAttribute('disabled');
    botonActualizar.classList.remove('d-none');
    botonActualizar.classList.add('d-block');
}