<?php
require_once __DIR__ . '/app/session.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/app/router.php';
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Acceso al temario</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body class="bg-light">
  <main class="container py-5">
    <div class="card mx-auto p-4" style="max-width: 26rem">
      <h1 class="h3 mb-4">Temario de clase</h1>
      <form method="post">
        <div class="mb-3">
          <label class="form-label" for="usuario">Usuario</label>
          <input class="form-control" id="usuario" name="usuario" autocomplete="username" required>
        </div>
        <div class="mb-3">
          <label class="form-label" for="contrasena">Contraseña</label>
          <input class="form-control" id="contrasena" name="contrasena" type="password" autocomplete="current-password" required>
        </div>
        <button class="btn btn-primary" type="submit">Entrar</button>
      </form>
    </div>
  </main>
</body>
</html>