<?php
$xml = new DOMDocument();
$xml->load("database_xml/users.xml");

if ($xml->schemaValidate("database_xml/users.xsd")) {
    echo "XML-ul este valid conform XSD.";
} else {
    echo "XML-ul nu este valid conform XSD.";
}
?>
