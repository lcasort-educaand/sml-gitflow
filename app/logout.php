<?php

require_once 'session.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit;
}

// Vaciar los datos de la sesión (usuario_id y rol)
$_SESSION = [];

// Caducar la cookie de sesión en el navegador, con los mismos parámetros con que se creó
$params = session_get_cookie_params();
setcookie(session_name(), '', [
    'expires'  => time() - 3600,
    'path'     => $params['path'],
    'domain'   => $params['domain'],
    'secure'   => $params['secure'],
    'httponly' => $params['httponly'],
    'samesite' => $params['samesite'],
]);

// Eliminar la sesión en el servidor
session_destroy();

header('Location: ../index.php', true, 303);
exit;