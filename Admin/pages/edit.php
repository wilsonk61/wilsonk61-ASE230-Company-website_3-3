<?php
$directory = '../../data/';


$textFiles = glob($directory . '*.txt');


$index = intval($_GET['index']);
$filePath = $textFiles[$index]; 
$fileContent = file_get_contents($filePath); 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $newContent = $_POST['file_content'];


    file_put_contents($filePath, $newContent);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Text File</title>
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
        textarea {
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
</head>
<body>

<div class="container">
    <h2>Edit Text File</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>?index=<?= $index ?>" method="POST">
        <div>
            <label for="file_content">File Content</label>
            <textarea name="file_content" id="file_content" rows="10" required><?= htmlspecialchars($fileContent) ?></textarea>
        </div>
        <button type="submit">Save Changes</button>
    </form>
</div>

<div style="text-align: center; margin-bottom: 20px;">
    <a href="index.php" style="padding: 10px 20px; background-color: #333; color: white; text-decoration: none; border-radius: 5px;">Go Back</a>
</div>

</body>
</html>