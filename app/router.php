<?php

function resolverPantalla($rol, $ruta): ?string
{
    $rutas = [
        'guest' => [
            'login' => null,
        ],
        'admin' => [
            'dashboard' => __DIR__ . '/dashboard/admin/index.php',
            'temario' => __DIR__ . '/temario/admin/index.php',
            'temario/create' => __DIR__ . '/temario/admin/create.php',
            'temario/edit' => __DIR__ . '/temario/admin/edit.php',
        ],
        'user' => [
            'dashboard' => __DIR__ . '/dashboard/user/index.php',
            'temario' => __DIR__ . '/temario/user/index.php',
        ],
    ];

    $predeterminadas = [
        'guest' => 'login',
        'admin' => 'dashboard',
        'user' => 'dashboard',
    ];

    $permitidas = is_string($rol) ? ($rutas[$rol] ?? []) : [];
    if ($ruta === '' && $permitidas !== []) {
        $ruta = $predeterminadas[$rol];
    }

    if (is_string($ruta) && array_key_exists($ruta, $permitidas)) {
        return $permitidas[$ruta];
    }

    $desconocida = $permitidas !== [] &&
        (!is_string($ruta) || array_column($rutas, $ruta) === []);
    http_response_code($desconocida ? 404 : 403);
    exit($desconocida ? 'Ruta desconocida.' : 'Acceso denegado.');
}

$pantalla = resolverPantalla($_SESSION['rol'] ?? 'guest', $_GET['ruta'] ?? '');
if ($pantalla !== null) {
    require $pantalla;
    exit;
}
