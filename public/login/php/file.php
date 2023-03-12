<?php

require_once '../../../settings/config.php';

// check request
if (isset($_POST['model']) && $_POST['model'] === 'performLogin') {
    require_once $basePath . '/classes/authentication/Session.php';
    require_once $basePath . '/classes/authentication/Login.php';
    require_once $basePath . '/classes/authentication/SuccessfulLogin.php';
    require_once $basePath . '/classes/authentication/FailedLogins.php';
    require_once $basePath . '/classes/users/Users.php';
    require_once $basePath . '/functions/validators/validation-email.php';
    require_once $basePath . '/functions/validators/validate-pin-code.php';

    $Login = new Login();
    $SuccessfulLogin = new SuccessfulLogin();
    $FailedLogins = new FailedLogins();
    $Users = new Users();
    $Session = new Session();

    // store errors
    $errors = array();

    // check email address
    if (isset($_POST['emailAddress']) && validate_email($_POST['emailAddress'])) {
        $Login->setEmailAddress(trim($_POST['emailAddress']));
    }
    else {
        // store error
        $errors[] = 'Invalid email address';
    }

    // check password
    if (isset($_POST['password'])) {
        $Login->setPassword(trim($_POST['password']));
    }
    else {
        // store error
        $errors[] = 'Invalid password';
    }

    // check pin code
    if (isset($_POST['pinCode']) && validate_pin_code($_POST['pinCode'])) {
        $Login->setPinCode(trim($_POST['pinCode']));
    }
    else {
        // store error
        $errors[] = 'Invalid pin code';
    }

    // perform login if no errors found
    if (empty($errors)) {
        $state = '';

        // check if user found by email address
        $userData = $Users->get_data_by_email($Login->getEmailAddress());

        // user found
        if ($userData['state']) {
            // verify password hash
            $hashedPassword = $userData['data']['password'];
            // password hash does not match
            if (!$Login->verify_password_hash($hashedPassword)) {
                $state = false;
                $errors[] = 'Invalid email address or password'; // return this error so user does not know which parameter is incorrect, this can be an extra layer of security

                // store password failed login
                $FailedLogins->setUserId($userData['data']['id']);
                $FailedLogins->setUsedPinCode($_POST['pinCode']);
                $FailedLogins->setUsedPassword($_POST['password']);
                $FailedLogins->setIpAddress($_SERVER['REMOTE_ADDR']);
                $FailedLogins->setUserAgent($_SERVER['HTTP_USER_AGENT']);
                $FailedLogins->setFailReason('Invalid password');
                $FailedLogins->save();
            }
            // verify pin code
            else if ($Login->getPinCode() != $userData['data']['pin_code']) {
                $state = false;
                $errors[] = 'Invalid pin code';

                // store pin code failed login
                $FailedLogins->setUserId($userData['data']['id']);
                $FailedLogins->setUsedPinCode($_POST['pinCode']);
                $FailedLogins->setUsedPassword($_POST['password']);
                $FailedLogins->setIpAddress($_SERVER['REMOTE_ADDR']);
                $FailedLogins->setUserAgent($_SERVER['HTTP_USER_AGENT']);
                $FailedLogins->setFailReason('Invalid pin code');
                $FailedLogins->save();
            }
            else {
                // set logged in session
                $Session->set_logged_session($userData['data']['id'], $userData['data']['email'], $userData['data']['fullname']);

                // store successful login
                $SuccessfulLogin->setUserId($userData['data']['id']);
                $SuccessfulLogin->setIpAddress($_SERVER['REMOTE_ADDR']);
                $SuccessfulLogin->setUserAgent($_SERVER['HTTP_USER_AGENT']);
                $SuccessfulLogin->save();

                $state = true;
            }
        }
        // user not found
        else {
            $state = false;
            $errors[] = 'Invalid email address or password'; // return this error so user does not know which parameter is incorrect, this can be an extra layer of security
        }

        echo json_encode(array('state' => $state, 'errors' => $errors));
    }
    else {
        echo json_encode(array('state' => false, 'errors' => $errors));
    }
}
// invalid request, returning this message makes an extra layer of security
else {
    echo json_encode(array('state' => false, 'errors' => array('Invalid email address or password')));
}
