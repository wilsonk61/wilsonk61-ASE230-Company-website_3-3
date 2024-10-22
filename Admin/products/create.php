<?php
include '../../lib/json_read_function.php'; // Adjusted path to lib

$filePath = '../../data/services.json'; 




if ($_SERVER['REQUEST_METHOD'] === 'POST' && count($_POST) > 0) {
    $content = file_get_contents($filePath);
    
    $data = json_decode($content, true);
    
    $newService = [
        'name' => $_POST['service_name'],
        'description' => $_POST['service_description'],
        'applications' => []
    ];

    $newService['applications'][] = [
        'name' => $_POST["app_name_1"],
        'description' => $_POST["app_description_1"]
    ];

    $newService['applications'][] = [
        'name' => $_POST["app_name_2"],
        'description' => $_POST["app_description_2"]
    ];

    $newService['applications'][] = [
        'name' => $_POST["app_name_3"],
        'description' => $_POST["app_description_3"]
    ];

    $data['keyProductsAndServices'][] = $newService;
    
    $jsonContent = json_encode($data, JSON_PRETTY_PRINT);
    
    file_put_contents($filePath, $jsonContent);
    
    header('Location: index.php');
    exit;
} else {
    ?>
    <br>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="index.php" style="padding: 10px 20px; background-color: #333; color: white; text-decoration: none; border-radius: 5px;">Go Back</a>
    </div>
    <br>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" style="max-width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h3 style="text-align: center; margin-bottom: 20px;">Add New Service</h3>
        
        <div style="margin-bottom: 15px;">
            <label for="service_name" style="display: block; margin-bottom: 5px;">Service Name</label>
            <input type="text" name="service_name" id="service_name" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Enter service name" required />
        </div>
        <div style="margin-bottom: 20px;">
            <label for="service_description" style="display: block; margin-bottom: 5px;">Service Description</label>
            <textarea name="service_description" id="service_description" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Enter service description" required></textarea>
        </div>
        
        <h4 style="text-align: center; margin-bottom: 20px;">Add Applications</h4>

        <div style="margin-bottom: 15px;">
            <label for="app_name_1" style="display: block; margin-bottom: 5px;">Application Name 1</label>
            <input type="text" name="app_name_1" id="app_name_1" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Enter application name 1" required />
        </div>
        <div style="margin-bottom: 20px;">
            <label for="app_description_1" style="display: block; margin-bottom: 5px;">Application Description 1</label>
            <textarea name="app_description_1" id="app_description_1" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Enter application description 1" required></textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="app_name_2" style="display: block; margin-bottom: 5px;">Application Name 2</label>
            <input type="text" name="app_name_2" id="app_name_2" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Enter application name 2" required />
        </div>
        <div style="margin-bottom: 20px;">
            <label for="app_description_2" style="display: block; margin-bottom: 5px;">Application Description 2</label>
            <textarea name="app_description_2" id="app_description_2" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Enter application description 2" required></textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="app_name_3" style="display: block; margin-bottom: 5px;">Application Name 3</label>
            <input type="text" name="app_name_3" id="app_name_3" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Enter application name 3" required />
        </div>
        <div style="margin-bottom: 20px;">
            <label for="app_description_3" style="display: block; margin-bottom: 5px;">Application Description 3</label>
            <textarea name="app_description_3" id="app_description_3" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Enter application description 3" required></textarea>
        </div>

        <button type="submit" style="width: 100%; padding: 10px; background-color: #333; color: white; border: none; border-radius: 5px; cursor: pointer;">Add Service</button>
    </form>
    <?php
}
?>