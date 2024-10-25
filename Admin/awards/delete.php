<?php 
require_once 'AwardClass.php';

$filePath = '../../data/Awards.csv';

$awards = new Awards($filePath);

if (isset($_GET['index'])) {
	$index = $_GET['index'];
	$awards->deleteAward($index);
}

header('Location: index.php');
exit;

?>
