<?php
include '../../lib/json_read_function.php'; 

$filePath = '../../data/services.json'; 

$content = file_get_contents($filePath);
$data = json_decode($content, true);

if (isset($_GET['index'])) {
    $index = $_GET['index'];

    unset($data['keyProductsAndServices'][$index]);

    $data['keyProductsAndServices'] = array_values($data['keyProductsAndServices']);

    $jsonContent = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents($filePath, $jsonContent);

    header('Location: index.php');
    exit;
} else {
    die("Error: No index provided for deletion.");
}
?>