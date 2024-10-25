<?php
// Defined the car class
class Awards{
	private $year;
	private $award;
	private $filePath = '';
	
	public function __construct($filePath) {
		$this->filePath = $filePath;
	}
	
	//Getters
    public function getYear()
    {
        return $this->year;
    }
    public function getAward()
    {
        return $this->award;
    }
    
    //Setter
	public function setAward($year, $award){
		if(isset($this->year) && isset($this->award)) return;
		$this->year=$year;
		$this->award=$award;
	}

	public function displayAwards(){
		$awards = [];
        $fp = fopen($this->filePath, 'r');
        $header = fgetcsv($fp); //Header row
        while ($content = fgetcsv($fp)) {
            $awardData = array_combine($header, $content);
        	$award = new Awards($this->filePath);
            $award->setAward($awardData['Year'], $awardData['Award']);
            $awards[] = $award;
        }
        fclose($fp);
        return $awards;
	}
	
	public function editAwards($awards){
		$fp = fopen($this->filePath, 'w');
		fputcsv($fp, ['Year', 'Award']); //Header row
    	foreach ($awards as $row) {
        	fputcsv($fp, [
        		$row->getYear(),
        		$row->getAward()
        	]);
    	}
    	fclose($fp);
	}
	
	public function deleteAward($index) {
		$awards = $this->displayAwards();
		unset($awards[$index]); 
		$this->editAwards(array_values($awards)); 
	}
	
	public function createAward($year, $award) {
		$awards = $this->displayAwards();
		
        $newAward = new Awards($this->filePath); 
        $newAward->setAward($year, $award);
        $awards[] = $newAward;

        $this->editAwards($awards);
	}
}

?>

