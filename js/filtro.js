function validar() {
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