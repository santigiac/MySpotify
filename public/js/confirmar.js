var formasConfirmar = document.querySelectorAll('[data-confirmar]');

for (var i = 0; i < formasConfirmar.length; i++) {
    formasConfirmar[i].onsubmit = function (e) {
        e.preventDefault();

        var forma   = this;
        var mensaje = this.getAttribute('data-confirmar');
        var esBorrar = forma.querySelector('input[name="_method"][value="DELETE"]') !== null;

        Swal.fire({
            title:              esBorrar ? '¿Eliminar?' : '¿Confirmar acción?',
            text:               mensaje,
            icon:               esBorrar ? 'warning' : 'question',
            showCancelButton:   true,
            confirmButtonColor: esBorrar ? '#c0392b' : '#1DB954',
            cancelButtonColor:  '#282828',
            confirmButtonText:  esBorrar ? 'Sí, eliminar' : 'Sí, continuar',
            cancelButtonText:   'Cancelar',
            background:         '#181818',
            color:              '#ffffff',
            iconColor:          esBorrar ? '#ff6b6b' : '#1DB954',
            customClass: {
                popup:         'sp-swal-popup',
                confirmButton: 'sp-swal-confirmar',
                cancelButton:  'sp-swal-cancelar'
            }
        }).then(function (result) {
            if (result.isConfirmed) {
                forma.submit();
            }
        });
    };
}
