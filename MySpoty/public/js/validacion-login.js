function validarLogin(evento) {
    evento.preventDefault();

    limpiarErrores();

    var email    = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value;
    var valido   = true;

    if (email === '') {
        mostrarError('email', 'El correo electrónico es obligatorio.');
        valido = false;
    } else if (!formatoEmailValido(email)) {
        mostrarError('email', 'El correo electrónico no tiene un formato válido.');
        valido = false;
    }

    if (password === '') {
        mostrarError('password', 'La contraseña es obligatoria.');
        valido = false;
    }

    if (valido) {
        document.getElementById('form-login').submit();
    }
}

function formatoEmailValido(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function mostrarError(idCampo, mensaje) {
    var span = document.getElementById('error-' + idCampo);
    if (span) {
        span.textContent = mensaje;
        span.style.display = 'block';
    }
}

function limpiarErrores() {
    var spans = document.querySelectorAll('.error-js');
    for (var i = 0; i < spans.length; i++) {
        spans[i].textContent = '';
        spans[i].style.display = 'none';
    }
}
