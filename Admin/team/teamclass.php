<?php

class TeamClass
{
    private $csvFile;

    public function __construct($csvFilePath = '../../data/Team.csv')
    {
        $this->csvFile = $csvFilePath;
    }

    public function getAllTeamMembers()
    {
        $teamMembers = [];
        if (($handle = fopen($this->csvFile, "r")) !== false) {
            fgetcsv($handle);

            while (($data = fgetcsv($handle)) !== false) {
                $teamMembers[] = [
                    'Name' => $data[0],
                    'Position' => $data[1],
                    'Description' => $data[2]
                ];
            }
            fclose($handle);
        }
        return $teamMembers;
    }

    public function getTeamMember($index)
    {
        $teamMembers = $this->getAllTeamMembers();
        return isset($teamMembers[$index]) ? $teamMembers[$index] : null;
    }



    public function deleteTeamMember($index)
    {
        $teamMembers = $this->getAllTeamMembers();
        if (isset($teamMembers[$index])) {
            unset($teamMembers[$index]);
            $this->saveAllTeamMembers(array_values($teamMembers)); 
        }
    }

    private function saveAllTeamMembers($teamMembers)
    {
        $handle = fopen($this->csvFile, 'w');
        fputcsv($handle, ['Name', 'Position', 'Description']);
        foreach ($teamMembers as $member) {
            fputcsv($handle, [$member['Name'], $member['Position'], $member['Description']]);
        }
        fclose($handle);
    }
}
?>
