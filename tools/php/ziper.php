<form action="" method="post">
<input name="Submit" type="submit" value="Verzeichnisinhalt in ZIP-Datei packen" />
<?php
if($_SERVER['REQUEST_METHOD'] == "POST")  {
}
else {
exit;
}
$sourcePath = dirname(__FILE__);

$archiv = new ZipArchive();
$archiv->open('archiv.zip', ZipArchive::CREATE);
$dirIter = new RecursiveDirectoryIterator($sourcePath);
$iter = new RecursiveIteratorIterator($dirIter);

foreach($iter as $element) {
    /* @var $element SplFileInfo */
    $dir = str_replace($sourcePath, '', $element->getPath()) . '/';
    if ($element->isDir()) {
        // Ordner erstellen (damit werden auch leere Ordner hinzugefügt
        $archiv->addEmptyDir($dir);
    } elseif ($element->isFile()) {
        $file         = $element->getPath() .
                        '/' . $element->getFilename();
        $fileInArchiv = $dir . $element->getFilename();
        // Datei dem Archiv hinzufügen
        $archiv->addFile($file, $fileInArchiv);
    }
}
echo '<p>Verarbeitung erfolgreich</p>'
?>
