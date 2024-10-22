<?php
include '../../lib/json_read_function.php'; 

$filePath = '../../data/services.json'; 

$content = file_get_contents($filePath);
$data = json_decode($content, true);

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    $service = $data['keyProductsAndServices'][$index];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedService = [
        'name' => $_POST['service_name'],
        'description' => $_POST['service_description'],
        'applications' => []
    ];

    $updatedService['applications'][] = [
        'name' => $_POST["app_name_1"],
        'description' => $_POST["app_description_1"]
    ];

    $updatedService['applications'][] = [
        'name' => $_POST["app_name_2"],
        'description' => $_POST["app_description_2"]
    ];

    $updatedService['applications'][] = [
        'name' => $_POST["app_name_3"],
        'description' => $_POST["app_description_3"]
    ];

    $data['keyProductsAndServices'][$index] = $updatedService;

    $jsonContent = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents($filePath, $jsonContent);


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
    <h2>Edit Service</h2>

    <form action="<?= $_SERVER['PHP_SELF'] ?>?index=<?= $_GET['index'] ?>" method="POST">
        <div>
            <label for="service_name">Service Name</label>
            <input type="text" name="service_name" id="service_name" value="<?= htmlspecialchars($service['name']) ?>" required>
        </div>

        <div>
            <label for="service_description">Service Description</label>
            <textarea name="service_description" id="service_description" rows="4" required><?= htmlspecialchars($service['description']) ?></textarea>
        </div>

        <h4>Add Applications</h4>

        <div>
            <label for="app_name_1">Application Name 1</label>
            <input type="text" name="app_name_1" id="app_name_1" value="<?= htmlspecialchars($service['applications'][0]['name']) ?>" required>
        </div>
        <div>
            <label for="app_description_1">Application Description 1</label>
            <textarea name="app_description_1" id="app_description_1" rows="2" required><?= htmlspecialchars($service['applications'][0]['description']) ?></textarea>
        </div>

        <div>
            <label for="app_name_2">Application Name 2</label>
            <input type="text" name="app_name_2" id="app_name_2" value="<?= htmlspecialchars($service['applications'][1]['name']) ?>" required>
        </div>
        <div>
            <label for="app_description_2">Application Description 2</label>
            <textarea name="app_description_2" id="app_description_2" rows="2" required><?= htmlspecialchars($service['applications'][1]['description']) ?></textarea>
        </div>

        <div>
            <label for="app_name_3">Application Name 3</label>
            <input type="text" name="app_name_3" id="app_name_3" value="<?= htmlspecialchars($service['applications'][2]['name']) ?>" required>
        </div>
        <div>
            <label for="app_description_3">Application Description 3</label>
            <textarea name="app_description_3" id="app_description_3" rows="2" required><?= htmlspecialchars($service['applications'][2]['description']) ?></textarea>
        </div>

        <button type="submit">Save Changes</button>
    </form>
</div>

</body>
</html>