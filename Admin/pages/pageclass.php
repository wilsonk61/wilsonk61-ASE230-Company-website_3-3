<?php

class PageClass
{
    private $title;
    private $content;
    private static $pages = [];
    public $filePath; 

    public function __construct($title, $content, $filePath = null)
    {
        $this->title = $title;
        $this->content = $content;
        $this->filePath = $filePath;
        
        self::$pages[] = $this;
    }
	//must set contents fir persistance 
    public function setContent($content)
    {
        $this->content = $content;

        if ($this->filePath) {
            file_put_contents($this->filePath, $this->content);
        }
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public static function getAllPages()
    {
        return self::$pages;
    }
}

$directory = __DIR__ . '/../../data/';
$textFiles = glob($directory . '*.txt');

foreach ($textFiles as $filePath) {
    $title = basename($filePath, '.txt'); 
    $content = file_get_contents($filePath); 
    new PageClass($title, $content, $filePath); 
}
?>
