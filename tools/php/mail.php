<?php
ini_set('error_reporting', E_ALL);  
ini_set('display_errors', 'On');  //On or Off

$empfaenger = 'info@IhreDomain.ch';
$betreff = 'Der Test';
$nachricht = 'Hallo';
$header = 'From: info@IhreDomain.ch' . "\n" .
    'Reply-To: info@IhreDomain.ch' . "\n" .
    'X-Mailer: PHP/' . phpversion();

mail($empfaenger, $betreff, $nachricht, $header);
?>
