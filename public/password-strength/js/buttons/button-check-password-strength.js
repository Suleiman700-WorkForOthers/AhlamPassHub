import ButtonManager from '/javascript/managers/button-manager/ButtonManager.js';

import CheckPasswordStrength from '../CheckPasswordStrength.js';

function callback(_cb) {
    CheckPasswordStrength.performCheckPasswordStrength()
}

const buttonCheckPasswordStrength = new ButtonManager('body', 'check-password-strength', callback)

buttonCheckPasswordStrength.onClick()

export default buttonCheckPasswordStrength