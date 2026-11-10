<?php

require_once __DIR__ . '/session.php';

$rolesPorArchivo = [
    '/app/dashboard/admin/index.php' => 'admin',
    '/app/dashboard/user/index.php' => 'user',
    '/app/temario/admin/index.php' => 'admin',
    '/app/temario/admin/create.php' => 'admin',
    '/app/temario/admin/edit.php' => 'admin',
    '/app/temario/user/index.php' => 'user',
];

$paneles = [
    'admin' => '/app/dashboard/admin/index.php',
    'user' => '/app/dashboard/user/index.php',
];

$raiz = dirname(__DIR__);
$archivo = realpath($_SERVER['SCRIPT_FILENAME'] ?? '');
$rol = $_SESSION['rol'] ?? null;

$sesionValida = isset($_SESSION['usuario_id'])
    && is_string($rol)
    && isset($paneles[$rol]);

if ($archivo === realpath($raiz . '/index.php')) {
    if ($sesionValida) {
        header('Location: ' . $paneles[$rol], true, 303);
        exit;
    }

    return; // index.php muestra el formulario de login.
}

if (!$sesionValida) {
    header('Location: /index.php', true, 303);
    exit;
}

foreach ($rolesPorArchivo as $ruta => $rolPermitido) {
    if ($archivo === realpath($raiz . $ruta) && $rol === $rolPermitido) {
        return; // La página solicitada puede mostrar su HTML.
    }
}

http_response_code(403);
exit('Acceso denegado.');