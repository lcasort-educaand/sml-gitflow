<?php
require_once __DIR__ . '/../../session.php';
require_once __DIR__ . '/../../router.php';
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel de usuario</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
  <header class="d-flex justify-content-between align-items-center gap-3 mb-4">
  <h1 class="mb-0">Panel de administración</h1>

  <form method="post" action="/app/logout.php" class="m-0">
    <button type="submit" class="btn btn-outline-danger">Salir</button>
  </form>
</header>

</body>
</html>
