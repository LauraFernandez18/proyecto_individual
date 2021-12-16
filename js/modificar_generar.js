function validar() {
    num_personas = document.getElementById('num_personas').value
    nombre_cliente = document.getElementById('nombre_cliente').value
    telf_cliente = document.getElementById('telf_cliente').value
    fecha = document.getElementById('fecha').value
    hora = document.getElementById('hora').value
    mensaje = document.getElementById('mensaje')

    if (num_personas == '' || nombre_cliente == '' || telf_cliente == '' || fecha == '' || hora == '') {
        mensaje.innerHTML = 'Rellena los campos'
        return false
    } else if (!/^[0-9]+$/.test(num_personas)) {
        mensaje.innerHTML = 'Introduce un número'
        return false
    } else if (!(/^\d{9}$/.test(telf_cliente))) {
        mensaje.innerHTML = "telf incorrecto"
        return false;
    } else if (fecha == '') {
        mensaje.innerHTML = 'Introduce una fecha'
        return false
    } else if (hora == '') {
        mensaje.innerHTML = 'Introduce una hora'
        return false
    } else if (nombre_cliente == '') {
        mensaje.innerHTML = 'Introduce el nombre del cliente'
        return false
    } else {
        return true
    }
}