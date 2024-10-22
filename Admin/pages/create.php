<?php
$directory = '../../data/';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && count($_POST) > 0) {
    $fileName = $_POST['file_name'] . '.txt'; 
    $fileContent = $_POST['file_content'];

    $filePath = $directory . $fileName;

	file_put_contents($filePath, $fileContent);
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
        <h3 style="text-align: center; margin-bottom: 20px;">Create New Text File</h3>
        
        <div style="margin-bottom: 15px;">
            <label for="file_name" style="display: block; margin-bottom: 5px;">File Name</label>
            <input type="text" name="file_name" id="file_name" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Enter file name" required />
        </div>
        <div style="margin-bottom: 20px;">
            <label for="file_content" style="display: block; margin-bottom: 5px;">File Content</label>
            <textarea name="file_content" id="file_content" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Enter file content" required></textarea>
        </div>

        <button type="submit" style="width: 100%; padding: 10px; background-color: #333; color: white; border: none; border-radius: 5px; cursor: pointer;">Create File</button>
    </form>
    <?php
}
?>