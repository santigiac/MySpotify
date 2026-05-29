function validarRegistro(evento) {
    evento.preventDefault();

    limpiarErrores();

    var nombre    = document.getElementById('nombre').value.trim();
    var email     = document.getElementById('email').value.trim();
    var password  = document.getElementById('password').value;
    var confirmar = document.getElementById('password_confirmation').value;
    var valido    = true;

    if (nombre === '') {
        mostrarError('nombre', 'El nombre es obligatorio.');
        valido = false;
    } else if (nombre.length < 3) {
        mostrarError('nombre', 'El nombre debe tener al menos 3 caracteres.');
        valido = false;
    }

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
    } else if (password.length < 8) {
        mostrarError('password', 'La contraseña debe tener al menos 8 caracteres.');
        valido = false;
    }

    if (confirmar === '') {
        mostrarError('password_confirmation', 'Debes confirmar la contraseña.');
        valido = false;
    } else if (password !== confirmar) {
        mostrarError('password_confirmation', 'Las contraseñas no coinciden.');
        valido = false;
    }

    if (valido) {
        document.getElementById('form-registro').submit();
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

document.getElementById('form-registro').onsubmit = validarRegistro;
