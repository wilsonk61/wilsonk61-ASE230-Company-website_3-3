<?php 
require_once __DIR__ . '/../../lib/csv_read_function.php';

$filePath = __DIR__ . '/../../data/Team.csv'; 
$CSVFile = 'Team.csv';
$teamMembers = readCSVFile($CSVFile);

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    $member = $teamMembers[$index];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $member = [
        'Name' => $_POST['name'],
        'Position' => $_POST['member_position'],
        'Description' => $_POST['member_description'],      
    ];
    $teamMembers[$index] = $member;
	$fp = fopen($filePath, 'w');
	fputcsv($fp, ['Name', 'Position', 'Description']);
    foreach ($teamMembers as $row) {
        fputcsv($fp, $row);
    }
    fclose($fp);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <br>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="index.php" style="padding: 10px 20px; background-color: #333; color: white; text-decoration: none; border-radius: 5px;">Go Back</a>
    </div>
</head>
<body>

<div class="container">
    <h2>Edit Team Member</h2>

    <form action="<?= $_SERVER['PHP_SELF'] ?>?index=<?= $_GET['index'] ?>" method="POST">
        <div>
            <label for="member_name">Team Member Name</label>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($member['Name']) ?>" required>
        </div>

        <div>
            <label for="member_description">Team Member Position</label>
             <input type="text" name="member_position" id="member_position" value="<?= htmlspecialchars($member['Position']) ?>" required>
        </div>
    
        <div>
            <label for="member_description">Team Member Description</label>
            <textarea name="member_description" id="member_description" rows="4" required><?= htmlspecialchars($member['Description']) ?></textarea>
        </div>


        <button type="submit">Save Changes</button>
    </form>
</div>

</body>
</html>