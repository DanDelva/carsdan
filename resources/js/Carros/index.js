window.onload = () => {
    setTimeout(() => {
        const alerta = document.getElementById('alerta');
        if (alerta != null) {
            alerta.remove(); // Elimina la alerta si existe
        }
    }, 3000); // 3000 ms (3 segundos) para que sea más visible
}

let btnEliminar = document.querySelector('#btnEliminar');
let lbl_nombre = document.querySelector('#lbl_nombre');
window.setInfo = (id, modelo) => {
    console.log("Setting info:", id, modelo); // Añadir log para verificar valores
    btnEliminar.setAttribute('data-id', id);
    lbl_nombre.innerHTML = 'Eliminarás el carro modelo: <b>' + modelo + '</b>';
}

btnEliminar.addEventListener('click', () => {
    let id = btnEliminar.getAttribute('data-id');
    console.log("Deleting car with ID:", id); // Añadir log para verificar ID
    let form = document.querySelector('#frm_' + id);
    form.submit();
});
