<?php
function readFileContent($filename) {
    $filePath = __DIR__ . '/../data/' . $filename; 
    if (file_exists($filePath)) {
        return file_get_contents($filePath);
    } else {
        return "File not found.";
    }
}
?>