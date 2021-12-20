/* VALIDACIÓN LOGIN */

function validar_login() {
    email_user = document.getElementById('email_user').value
    password_user = document.getElementById('password_user').value
    mensaje = document.getElementById('mensaje')

    if (email_user == '' && password_user == '') {
        mensaje.innerHTML = 'Introduce el email y la contraseña'
        return false
    } else if (email_user == '') {
        mensaje.innerHTML = 'Introduce el email'
        return false
    } else if (password_user == '') {
        mensaje.innerHTML = 'Introduce la contraseña'
        return false
    } else {
        return true
    }
}

/* VALIDACIÓN MESA */

function validar_mesa() {
    nombre_mesa = document.getElementById('nombre_mesa').value
    num_silla_dispo = document.getElementById('num_silla_dispo').value
    id_ubi = document.getElementById('id_ubi').value
    mensaje = document.getElementById('mensaje')

    if (nombre_mesa == '' || num_silla_dispo == '' || id_ubi == '') {
        mensaje.innerHTML = 'Rellena los campos'
        return false
    } else if (nombre_mesa == '') {
        mensaje.innerHTML = 'Introduce el nombre de la mesa'
        return false
    } else if (num_silla_dispo == '') {
        mensaje.innerHTML = 'Introduce el número de las sillas'
        return false
    } else if (id_ubi == '') {
        mensaje.innerHTML = 'Introduce la ubicación'
        return false
    } else {
        return true
    }
}

/* VALIDACIÓN SALA */

function validar_sala() {
    tipo_ubi = document.getElementById('tipo_ubi').value
    foto_ubi = document.getElementById('foto_ubi').value
    mensaje = document.getElementById('mensaje')

    if (tipo_ubi == '' && foto_ubi == '') {
        mensaje.innerHTML = 'Rellena los campos'
        return false
    } else if (tipo_ubi == '') {
        mensaje.innerHTML = 'Introduce el nombre de la mesa'
        return false
    } else if (foto_ubi == '') {
        mensaje.innerHTML = 'Introduce la imagen'
        return false
    } else {
        return true
    }
}

/* VALIDACIÓN USER */

function validar_user() {
    nom_user = document.getElementById('nom_user').value
    apellido_user = document.getElementById('apellido_user').value
    email_user = document.getElementById('email_user').value
    rol_user = document.getElementById('rol_user').value
    mensaje = document.getElementById('mensaje')

    if (nom_user == '' || apellido_user == '' || email_user == '' || rol_user == '') {
        mensaje.innerHTML = 'Rellena los campos'
        return false
    } else if (nom_user == '') {
        mensaje.innerHTML = 'Introduce el nombre'
        return false
    } else if (apellido_user == '') {
        mensaje.innerHTML = 'Introduce el apellido'
        return false
    } else if (email_user == '') {
        mensaje.innerHTML = 'Introduce el email'
        return false
    } else if (rol_user == '') {
        mensaje.innerHTML = 'Introduce el rol'
        return false
    } else {
        return true
    }
}

/* VALIDACIÓN DE CREAR Y MODIFICAR */


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

/* VALIDACIÓN FILTRO */

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