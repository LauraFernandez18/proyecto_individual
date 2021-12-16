function validar() {
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