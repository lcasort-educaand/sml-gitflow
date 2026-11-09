<?php

$errorLogin = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    try {

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $contrasena = $_POST['contrasena'] ?? '';

        if ($email && is_string($contrasena) && $contrasena !== '') {
            $consulta = $pdo->prepare(
                'SELECT id, password AS contrasena, rol FROM users WHERE email = :email'
            );
            $consulta->execute(['email' => $email]);
            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($usuario !== false && password_verify($contrasena, $usuario['contrasena'])) {
                if (in_array($usuario['rol'], ['admin', 'user'], true)) {
                    session_regenerate_id(true);
                    $_SESSION['usuario_id'] = $usuario['id'];
                    $_SESSION['rol'] = $usuario['rol'];

                    header('Location: index.php?ruta=dashboard', true, 303);
                    exit;
                } else {
                    throw new DomainException('Esta cuenta no tiene acceso a la aplicación.');
                }
            } else {
                throw new DomainException('Correo o contraseña incorrectos.');
            }
        } else {
            throw new DomainException('Introduce un correo válido y una contraseña.');
        }
    } catch (DomainException $e) {
        $errorLogin = $e->getMessage();
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $errorLogin = 'No se pudo iniciar sesión. Inténtalo de nuevo.';
    }
}