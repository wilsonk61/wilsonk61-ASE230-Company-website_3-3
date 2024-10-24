<?php
require_once 'PageClass.php';

$index = (int)$_GET['index'] ?? 0;

$page = PageClass::getAllPages()[$index];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $page->setContent($_POST['file_content']); // Automatically saves to the file
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
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
    <h2>Edit Page</h2>
    <form action="" method="POST">
        <div>
            <label for="file_content">Content</label>
            <textarea name="file_content" id="file_content" rows="10" required><?= $page->getContent() ?></textarea>
        </div>
        <button type="submit">Save Changes</button>
    </form>
</div>

<div style="text-align: center; margin-bottom: 20px;">
    <a href="index.php" style="padding: 10px 20px; background-color: #333; color: white; text-decoration: none; border-radius: 5px;">Go Back</a>
</div>

</body>
</html>