<?php
require_once 'PageClass.php';

$index = intval($_GET['index']);

$pages = PageClass::getAllPages();

$page = $pages[$index];

if ($page->filePath) {
    unlink($page->filePath); 
}

header('Location: index.php');
exit;
