<?php

require_once '../../../settings/config.php';

require_once $basePath.'/classes/authentication/Session.php';
require_once $basePath.'/classes/categories/Categories.php';
$Session = new Session();
$Categories = new Categories();

// check if logged
$session_isLogged = $Session->isLogged();








if (isset($_GET['model']) && $_GET['model'] === 'performCheckPasswordStrength' && $session_isLogged) {
    // this will reject request and return error message to user then do exit;
    require_once $basePath.'/functions/requests/reject-request-in-lock-mode.php';

    $validPassword = false;

    $res = array(
        'state' => true,
        'error' => array(),
        'strength' => array(),
        'color' => 'black'
    );

    // check password
    if (isset($_GET['password']) && !empty($_GET['password'])) {
        $validPassword = true;
    }


    // check if all parameters are valid
    if ($validPassword) {
        $password = $_GET['password'];
        $hash = strtoupper(sha1($password));
        $apiUrl = "https://api.pwnedpasswords.com/range/" . substr($hash, 0, 5);
        $response = file_get_contents($apiUrl);
        $hashes = explode("\r\n", $response);
        $suffix = substr($hash, 5);
        $matches = array_filter($hashes, function($h) use ($suffix) {
            return strpos($h, $suffix) === 0;
        });
        $count = count($matches);
        $score = 0;
        if ($count > 0) {
            $score -= 20;
        }
        if (strlen($password) >= 8) {
            $score += 10;
        }
        if (preg_match('/[a-z]/', $password) && preg_match('/[A-Z]/', $password)) {
            $score += 10;
        }
        if (preg_match('/[0-9]/', $password)) {
            $score += 10;
        }
        if (preg_match('/[^a-zA-Z0-9]/', $password)) {
            $score += 10;
        }
        $strength = "";
        if ($score < 20) {
            $res['color'] = 'red';
            $strength = "Very weak";
        } else if ($score < 40) {
            $res['color'] = 'orange';
            $strength = "Weak";
        } else if ($score < 60) {
            $res['color'] = 'cyan';
            $strength = "Medium";
        } else if ($score < 80) {
            $res['color'] = 'lime';
            $strength = "Strong";
        } else {
            $res['color'] = 'green';
            $strength = "Very strong";
        }
        $res['strength'] = $strength;
    }
    else {
        $res['state'] = false;
        $res['error'] = array('Password cannot be empty');
    }

    echo json_encode($res);
}