
document.getElementById("actionForm").addEventListener("submit", function validateCredentials(event) {

    event.preventDefault();

    let ghoulid = document.getElementById('ghoulid').value;
    let name = document.getElementById('name').value;
    let kagune = document.getElementById('kagune').value;
    let ward = parseInt(document.getElementById('ward').value);
    let first_activity = document.getElementById('first_detected_activity').value;

    let correcto = true;

    // ghoul id regex
    let validGhoulId = /^[A-Z]{2}-[a-z]{2}[0-9]{3}$/;

    // ghoulid validations
    if (ghoulid.trim() == '' || !ghoulid.match(validGhoulId)) {

        msj = 'Invalid Ghoul ID format';
        marcarError('ghoulid', msj);
        correcto = false;

    }

    // name validation
    if (name.trim() == '') {

        msj = 'Name cannot be empty';
        marcarError('name', msj);
        correcto = false;

    }

    // kagune type validation
    if (kagune.trim() == '') {

        msj = 'Kagune type must be selected';
        marcarError('kagune', msj);
        correcto = false;

    }

    // ward validation
    if (isNaN(ward)) {

        msj = 'Ward cannot be empty';
        marcarError('ward', msj);
        correcto = false;

    }

    // first detected activity validation
    if (first_activity.trim() == '') {

        msj = 'First Detected Activity date cannot be empty';
        marcarError('first_detected_activity', msj);
        correcto = false;

    }

    if (correcto) { document.getElementById("actionForm").submit() };

})

document.getElementById('ghoulid').addEventListener("change", () => { limpiarError('ghoulid') });
document.getElementById('name').addEventListener("change", () => { limpiarError('name') });
document.getElementById('kagune').addEventListener("change", () => { limpiarError('kagune') });
document.getElementById('ward').addEventListener("change", () => { limpiarError('ward') });
document.getElementById('first_detected_activity').addEventListener("change", () => { limpiarError('first_detected_activity') });

function marcarError(id, msj) {

    let help = document.createElement('div');
    help.setAttribute('class', 'form-text text-danger');
    help.setAttribute('id', id + 'Help');
    help.append(msj);
    document.getElementById(id).after(help);

}

function limpiarError(id) {

    document.getElementById(id + 'Help').remove();

}