<?php
// Verificăm dacă s-au trimis fișiere prin formular
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    // Directorul în care vor fi salvate imaginile încărcate
    $targetDir = "uploads/";

    // Numele fișierului încărcat
    $fileName = basename($_FILES["image"]["name"]);
    
    // Calea completă către fișierul încărcat
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
    // Verificăm dacă fișierul este o imagine
    $allowTypes = array('jpg','png','jpeg','gif');
    if (in_array($fileType, $allowTypes)) {
        // Încărcăm fișierul pe server
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Adăugăm informațiile despre imagine într-un fișier XML

            // Încărcăm fișierul XML existent sau îl creăm dacă nu există
            $xmlFile = "database_xml/images.xml";
            if (file_exists($xmlFile)) {
                $xml = simplexml_load_file($xmlFile);
            } else {
                $xml = new SimpleXMLElement('<images></images>');
            }

            // Adăugăm o nouă imagine în fișierul XML
            $image = $xml->addChild('image');
            $image->addChild('name', $fileName);
            $image->addChild('path', $targetFilePath);

            // Salvăm fișierul XML actualizat
            $xml->asXML($xmlFile);

            // Redirecționăm către această pagină pentru a afișa imaginile actualizate
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "Eroare la încărcarea fișierului.";
        }
    } else {
        echo "Doar fișierele de tip JPG, JPEG, PNG și GIF sunt permise.";
    }
}
?>

<!-- Formular pentru încărcarea imaginilor -->
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/jpeg, image/png, image/gif" required>
    <button type="submit">Încarcă imaginea</button>
</form>
