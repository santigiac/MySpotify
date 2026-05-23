// Auto-envío del formulario al marcar/desmarcar un checkbox de filtro
var checkboxesFiltro = document.querySelectorAll('.auto-submit');
for (var i = 0; i < checkboxesFiltro.length; i++) {
    checkboxesFiltro[i].onchange = function () {
        this.form.submit();
    };
}
