<?php 
require_once __DIR__ . '/TeamClass.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && count($_POST) > 0) {

    TeamClass::createMember(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['member_position']), htmlspecialchars($_POST['member_description']));
    
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Team Member</title>
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
</head>
<body>

<div class="container">
    <h2>Create Team Member</h2>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <div>
            <label for="name">Team Member Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="member_position">Team Member Position</label>
            <input type="text" name="member_position" id="member_position" required>
        </div>
    
        <div>
            <label for="member_description">Team Member Description</label>
            <textarea name="member_description" id="member_description" rows="4" required></textarea>
        </div>

        <button type="submit">Save Changes</button>
    </form>

    <div style="text-align: center; margin-top: 20px;">
        <a href="index.php" style="padding: 10px 20px; background-color: #333; color: white; text-decoration: none; border-radius: 5px;">Go Back</a>
    </div>
</div>

</body>
</html>