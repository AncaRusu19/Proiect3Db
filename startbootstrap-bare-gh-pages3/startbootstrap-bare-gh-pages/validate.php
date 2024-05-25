<?php
$xml = new DOMDocument();
$xml->load("database_xml/users.xml");

if ($xml->validate()) {
    echo "XML-ul este valid conform DTD.";
} else {
    echo "XML-ul nu este valid conform DTD.";
}
?>
