function error() {
    swal({
        type: 'error',
        title: 'Error',
        text: 'Verifica los datos!',
    });
}

function validarLogin1() {
    var verificar = true;

    if(!document.getElementById("id_1").value || !document.getElementById("password_1").value){
        error();
        verificar = false;
    }

    if(verificar){
        document.form_login_1.submit();
    }
}
function validarLogin2() {
    var verificar = true;

    if(!document.getElementById("id_2").value || !document.getElementById("password_2").value){
        error();
        verificar = false;
    }

    if(verificar){
        document.form_login_2.submit();
    }
}

function validarLogin3() {
    var verificar = true;

    if(!document.getElementById("id_3").value || !document.getElementById("password_3").value){
        error();
        verificar = false;
    }

    if(verificar){
        document.form_login_3.submit();
    }
}

function validarCandidato() {
    var verificar = true;

    if(!document.getElementById("numero").value){
        error();
        verificar = false;
    }

    if(verificar){
        document.form_candidato.submit();
    }
}

function validarUsuario() {
    var verificar = true;

    if(!document.getElementById("id_usuario").value
        || !document.getElementById("nombre").value
        || !document.getElementById("apellido").value
        || !document.getElementById("contrasenia").value
        || !document.getElementById("id_rol").value){
        error();
        verificar = false;
    }

    if(verificar){
        document.form_usuario.submit();
    }
}