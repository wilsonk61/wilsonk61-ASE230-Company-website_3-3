<?php
$directory = '../../data/';

$textFiles = glob($directory . '*.txt');

$index = intval($_GET['index']);
$filePath = $textFiles[$index];

unlink($filePath); //learned how to delete files in a file path

header('Location: index.php'); 
exit;
?>
