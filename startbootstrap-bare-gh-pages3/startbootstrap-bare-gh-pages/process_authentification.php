<?php
// Verifică dacă s-au trimis date prin formular
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extrage datele din formular
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Verifică dacă parolele coincid
    if ($password !== $confirmPassword) {
        // Dacă parolele nu coincid, afișează un mesaj de eroare și oprește scriptul
        die("Passwords do not match.");
    }

    // Calea către fișierul XML
    $xmlFile = "database_xml/users.xml";

    // Încarcă fișierul XML
    $xml = simplexml_load_file($xmlFile);

    // Verifică dacă adresa de email există deja în baza de date
    foreach ($xml->user as $user) {
        if ($user->email == $email) {
            // Dacă adresa de email există deja, afișează un mesaj de eroare și oprește scriptul
            die("Email already exists.");
        }
    }

    // Crează un nou element "user" în fișierul XML cu datele introduse de utilizator
    $newUser = $xml->addChild('user');
    $newUser->addChild('email', $email);
    $newUser->addChild('password', $password);

    // Salvează schimbările în fișierul XML
    $xml->asXML($xmlFile);

    // Redirecționează către pagina products.php după ce s-a înregistrat cu succes
    header("Location: products.php");
    exit;
} else {
    // Dacă nu s-au trimis date prin formular, afișează un mesaj de eroare și oprește scriptul
    die("Form submission error.");
}
?>
