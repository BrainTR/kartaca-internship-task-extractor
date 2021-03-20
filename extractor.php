<?php

$zip = new ZipArchive();
$zip->open('kartaca.zip');

$message = '';
for ($i = 0; $i < $zip->numFiles; $i++) {
    $filename = base64_encode($i);
    $content = $zip->getFromName($filename);
    
    $bins = explode(' ', $content);
    foreach($bins as $bin) {
        $message .= mb_chr(bindec($bin));
    }
}

$zip->close();
print($message);
