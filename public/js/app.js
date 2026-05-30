// Auto-envío del formulario al marcar/desmarcar un checkbox de filtro
var checkboxesFiltro = document.querySelectorAll('.auto-submit');
for (var i = 0; i < checkboxesFiltro.length; i++) {
    checkboxesFiltro[i].onchange = function () {
        this.form.submit();
    };
}

// Confirmación nativa antes de enviar formularios con data-confirmar
// (el admin sobreescribe esto con SweetAlert2 mediante confirmar.js)
var formasConfirmar = document.querySelectorAll('[data-confirmar]');
for (var j = 0; j < formasConfirmar.length; j++) {
    formasConfirmar[j].onsubmit = function (e) {
        if (!confirm(this.getAttribute('data-confirmar'))) {
            e.preventDefault();
        }
    };
}

// Acción dinámica del formulario "Añadir a lista" en la ficha de canción
var selectLista = document.getElementById('select-lista');
var formAgregar = document.getElementById('form-agregar-cancion');
if (selectLista && formAgregar) {
    var actualizarAccion = function () {
        var opcion = selectLista.options[selectLista.selectedIndex];
        if (opcion && opcion.value) {
            formAgregar.action = opcion.getAttribute('data-url');
        }
    };
    actualizarAccion();
    selectLista.onchange = actualizarAccion;
}
