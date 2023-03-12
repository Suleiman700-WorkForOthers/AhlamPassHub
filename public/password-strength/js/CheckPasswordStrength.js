
// inputs
import inputPassword from './inputs/input-password.js';

// buttons
import buttonCheckPasswordStrength from "./buttons/button-check-password-strength.js";

// requests
import RequestGet from '../../../javascript/requests/RequestGet.js';

class CheckPasswordStrength {
    constructor() {}

    async performCheckPasswordStrength() {
        let flagValid = true

        const elements = [inputPassword, buttonCheckPasswordStrength]

        // disable elements
        elements.forEach(element => element.enabled(false))

        const password = inputPassword.valueGet()

        // check password
        if (!password) {
            // show alert
            Swal.fire({
                icon: 'error',
                title: 'Ops!',
                html: 'Password cannot be empty'
            })

            // mark error
            inputPassword.markError(true)

            // update flag
            flagValid = false
        } else {
            // remove error border
            inputPassword.markError(false)
        }

        if (flagValid) {
            const data = {
                password
            }

            // show loading
            Swal.fire({
                icon: 'info',
                title: 'Contacting API',
                html: 'Please wait while checking password strength...',
                showConfirmButton: false,
                allowOutsideClick: false
            });

            const response = await RequestGet.send('./php/file.php', data, 'performCheckPasswordStrength')

            // hide loading
            Swal.close()

            // check response
            if (response['state']) {
                // set password strength label
                document.querySelector('#password-strength-label').innerHTML = `Password is <span style="color: ${response['color']};">${response['strength']}</span>`
            }
            else {
                // show error
                Swal.fire({
                    icon: 'error',
                    title: 'Ops!',
                    html: response['error']
                })
            }
        }

        // enable elements
        elements.forEach(element => element.enabled(true))
    }
}

export default new CheckPasswordStrength()