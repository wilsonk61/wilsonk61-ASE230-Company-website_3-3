<?php 
require_once __DIR__ . '/TeamClass.php';

$teamClass = new TeamClass();

if (isset($_GET['index'])) {
    $index = $_GET['index'];

    $teamClass->deleteTeamMember($index);
}

header('Location: index.php');
exit;
?>
