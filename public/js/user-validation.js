
document.getElementById('accessForm').addEventListener("submit", function validateCredentials(event) {

    event.preventDefault();

    let agentId = document.getElementById('agentId').value;
    let passwd = document.getElementById('passwd').value;
    let msj = '';

    let correcto = true;

    // patron a cumplir para usuario valido
    let validId = /^[A-Z]{2}[0-9]{3}$/;

    // patrones a cumplir para contraseña valida
    let mayus = /[A-Z]+/;
    let num = /[0-9]+/;
    let special_chars = /[^<>&"'#\/\\]+/;

    // AGENT ID VALIDATIONS
    // empty
    if (agentId.trim() == '') {
        msj = 'Agent ID cannot be empty';
        marcarError('agentId', msj);
        correcto = false;
    }

    // valid format
    if (!agentId.match(validId)) {
        msj = 'Must follow pattern AA000';
        marcarError('agentId', msj);
        correcto = false;
    }

    // PASSWORD VALIDATITONS
    // empty
    if (passwd.trim() == '') {
        msj = 'Password cannot be empty';
        marcarError('passwd', msj);
        correcto = false;
    }

    // length
    if (passwd.length < 8) {
        msj = 'Password must be at least 8 characters long';
        marcarError('passwd', msj);
        correcto = false;
    }

    // contains uppercase
    if (!passwd.match(mayus)) {
        msj = 'Password must contain at least one uppercase letter';
        marcarError('passwd', msj);
        correcto = false;
    }

    // contains number
    if (!passwd.match(num)) {
        msj = 'Password must contain at least one number';
        marcarError('passwd', msj);
        correcto = false;
    }

    // contains special character
    if (!passwd.match(special_chars)) {
        msj = 'Password must contain at least one special character (except <, >, &, \, /, \', ", #)';
        marcarError('passwd', msj);
        correcto = false;
    }

    if (correcto) { document.getElementById("accessForm").submit() };

})

document.getElementById('agentId').addEventListener("change", () => { limpiarError('agentId') });
document.getElementById('passwd').addEventListener("change", () => { limpiarError('passwd') });

function marcarError(id, msj) {

    if (document.getElementById(id + 'Help')) {
        document.getElementById(id + 'Help').remove();
    }

    document.getElementById(id).style.borderBottom = 'solid 1px red';
    let help = document.createElement('div');
    help.setAttribute('class', 'form-text text-danger');
    help.setAttribute('id', id + 'Help');
    help.append(msj);
    document.getElementById(id).after(help);

}

function limpiarError(id) {

    document.getElementById(id).style.borderBottom = 'solid 1px rgb(146, 0, 68)';
    document.getElementById(id + 'Help').remove();

}