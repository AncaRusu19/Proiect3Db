<?php
session_start();

// Verifică dacă utilizatorul este autentificat ca admin
if (!isset($_SESSION['email']) || $_SESSION['email'] != 'admin@yahoo.com') {
    header("Location: login.php");
    exit;
}

// Calea către fișierul XML și XSL
$xmlFile = "database_xml/users.xml";
$xslFile = "database_xml/style.xsl";

// Încarcă XML și XSL
$xml = new DOMDocument();
$xml->load($xmlFile);

$xsl = new DOMDocument();
$xsl->load($xslFile);

// Configurează procesorul XSLT
$proc = new XSLTProcessor();
$proc->importStylesheet($xsl);

// Transformă XML folosind XSL și afișează rezultatul
echo $proc->transformToXML($xml);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page content-->
    <div class="container">
        <div class="text-center mt-5">
            <h1>Admin Page</h1>
            <!-- Aici se va afișa conținutul XML stilizat -->
            <?php
            // Încarcă XML și XSL
            $xml = new DOMDocument();
            $xml->load($xmlFile);

            $xsl = new DOMDocument();
            $xsl->load($xslFile);

            // Configurează procesorul XSLT
            $proc = new XSLTProcessor();
            $proc->importStylesheet($xsl);

            // Transformă XML folosind XSL și afișează rezultatul
            echo $proc->transformToXML($xml);
            ?>
        </div>
    </div>
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
