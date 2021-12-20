function validar_login() {
    nom_user = document.getElementById('nom_user').value
    password_user = document.getElementById('password_user').value
    mensaje = document.getElementById('mensaje')

    if (nom_user == '' && password_user == '') {
        mensaje.innerHTML = 'Introduce el usuario y la contraseña'
        return false
    } else if (nom_user == '') {
        mensaje.innerHTML = 'Introduce el usuario'
        return false
    } else if (password_user == '') {
        mensaje.innerHTML = 'Introduce la contraseña'
        return false
    } else {
        return true
    }
}

function validar_generar_modificar() {
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

function validar_filtro() {
    terraza = document.getElementById('terraza').checked
    comedor = document.getElementById('comedor').checked
    mesa = document.getElementById('id_mesa').value
    fil_mesa = document.getElementById('filtrar_mesa').value
    mensaje = document.getElementById('mensaje')
    textomensaje = ''

    if (terraza == false && comedor == false && mesa == '') {
        mensaje.innerHTML = 'Selecciona un filtro para filtrar'
        return false
    } else if (terraza == true && comedor == true && mesa == '') {
        mensaje.innerHTML = 'Selecciona una mesa'
        return false
    } else {
        return true
    }
}