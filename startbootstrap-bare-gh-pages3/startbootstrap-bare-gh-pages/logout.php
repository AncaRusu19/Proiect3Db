<?php
session_start();

// Șterge toate variabilele de sesiune
$_SESSION = array();

// Dacă dorim să ștergem și cookie-ul de sesiune
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Distruge sesiunea
session_destroy();

// Șterge cookie-ul pentru email
setcookie("email", "", time() - 3600, "/");

// Redirecționează către pagina principală
header("Location: index.php");
exit;
?>
