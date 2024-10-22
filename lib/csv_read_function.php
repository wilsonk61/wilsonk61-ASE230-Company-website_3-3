<?php
function readCSVFile($filename) {
    $filePath = __DIR__ . '/../data/' . $filename;
    if(file_exists($filePath)) {
    	$CSVdata = [];
    	$fp=fopen($filePath,'r');
    	
    	$header = fgetcsv($fp);
    	
		while($content=fgetcsv($fp)) {
			$CSVdata[] = array_combine($header, $content);
		}
		fclose($fp);
		
		return $CSVdata;
    } else {
    	return "File not found.";
    }
}
?>