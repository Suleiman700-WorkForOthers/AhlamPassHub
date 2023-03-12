import ButtonManager from '../../../../javascript/managers/button-manager/ButtonManager.js';

// inputs
import inputPasswordPassword from '../inputs/input-password-password.js';

// API
import RequestGet from '../../../../javascript/requests/RequestGet.js';

async function callback(_cb) {

    // show loading
    Swal.fire({
        icon: 'info',
        title: 'Contacting API',
        html: 'Please wait while generating password...',
        showConfirmButton: false,
        allowOutsideClick: false
    });

    // send API request to generate strong password
    try {
        const response = await RequestGet.send('./php/file.php', {}, 'generatePassword')

        // hide loading
        Swal.close()

        // check response
        if (response['state']) {
            inputPasswordPassword.valueSet(response['generatedPassword'])
        }
        else {
            // show error
            Swal.fire({
                icon: 'error',
                title: 'Ops!',
                html: 'Unable to generate password, An error occurred contacting API.',
                showConfirmButton: true,
            });
        }
    }
    catch (e) {
        // show error
        Swal.fire({
            icon: 'error',
            title: 'Ops!',
            html: 'Unable to generate password, An error occurred contacting API.',
            showConfirmButton: true,
        });
    }
}

const buttonGeneratePassword = new ButtonManager('form', 'generate-password', callback)

buttonGeneratePassword.onClick()

export default buttonGeneratePassword