<?php 
require_once 'AwardClass.php';

$filePath = '../../data/Awards.csv';

$awards = new Awards($filePath);
$awardArray = $awards->displayAwards();

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    $award = $awardArray[$index];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$award = new Awards($filePath); 
    $award->setAward($_POST['year'], $_POST['award']);

    $awardArray[$index] = $award; 
    $awards->editAwards($awardArray);

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
    <h2>Edit Award</h2>

    <form action="<?= $_SERVER['PHP_SELF'] ?>?index=<?= $_GET['index'] ?>" method="POST">
        <div>
            <label for="year">Year</label>
            <input type="text" name="year" id="year" value="<?= htmlspecialchars($award->getYear()) ?>" required>
        </div>

        <div>
            <label for="award">Award</label>
             <input type="text" name="award" id="award" value="<?= htmlspecialchars($award->getAward()) ?>" required>
        </div>
    
        <button type="submit">Save Changes</button>
    </form>
</div>

</body>
</html>