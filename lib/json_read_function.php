<?php
function readJSONFile($filename) {
    $filePath = __DIR__ . '/../data/' . $filename; 
    if (file_exists($filePath)) {
        $content=file_get_contents($filePath);
        $jsonData=json_decode($content,true);
        return $jsonData;
        
    } else {
        return "File not found.";
    }
}
?>