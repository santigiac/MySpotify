var temporizador = null;
var inputBuscar   = document.getElementById('input-buscar');
var gridCanciones = document.getElementById('grid-canciones');
var paginacion    = document.getElementById('paginacion');

function actualizarEstiloFiltro(checkbox) {
    var label = checkbox.closest('label');
    if (!label) { return; }
    if (checkbox.checked) {
        label.classList.remove('sp-filtro');
        label.classList.add('sp-filtro-activo');
    } else {
        label.classList.remove('sp-filtro-activo');
        label.classList.add('sp-filtro');
    }
}

function filtrar() {
    var params = new URLSearchParams();

    if (inputBuscar) {
        params.set('buscar', inputBuscar.value);
    }

    var checkboxes = document.querySelectorAll('input[name="generos[]"]:checked');
    for (var i = 0; i < checkboxes.length; i++) {
        params.append('generos[]', checkboxes[i].value);
    }

    if (gridCanciones) {
        gridCanciones.innerHTML = '<p class="col-span-full text-center py-20 sp-gris text-sm">Buscando...</p>';
    }
    if (paginacion) {
        paginacion.innerHTML = '';
    }

    fetch('/canciones/buscar?' + params.toString())
        .then(function (r) { return r.text(); })
        .then(function (html) {
            if (gridCanciones) {
                gridCanciones.innerHTML = html;
            }
        });
}

if (inputBuscar) {
    inputBuscar.oninput = function () {
        clearTimeout(temporizador);
        temporizador = setTimeout(filtrar, 400);
    };
}

var checkboxesGenero = document.querySelectorAll('input[name="generos[]"]');
for (var j = 0; j < checkboxesGenero.length; j++) {
    // Estado inicial (si vienen marcados desde el servidor)
    actualizarEstiloFiltro(checkboxesGenero[j]);

    checkboxesGenero[j].onchange = function () {
        actualizarEstiloFiltro(this);
        filtrar();
    };
}
