<?php

//For my own use:
//Goal of static classese from video: Static classes are used to we can directly used the methods and classes without creating an object.

class TeamClass
{
    private static $csvFile = '../../data/Team.csv';

    public static function getAllTeamMembers()
    {
        $teamMembers = [];
        if (($fp = fopen(self::$csvFile, "r")) !== false) {
            fgetcsv($fp);
            while (($data = fgetcsv($fp)) !== false) {
                $teamMembers[] = [
                    'Name' => $data[0],
                    'Position' => $data[1],
                    'Description' => $data[2]
                ];
            }
            fclose($fp);
        }
        return $teamMembers;
    }

    public static function getTeamMember($index)
    {
        $teamMembers = self::getAllTeamMembers();
        return isset($teamMembers[$index]) ? $teamMembers[$index] : null;
    }

    public static function deleteTeamMember($index)
    {
        $teamMembers = self::getAllTeamMembers();
        if (isset($teamMembers[$index])) {
            unset($teamMembers[$index]);
            self::saveAllTeamMembers(array_values($teamMembers)); 
        }
    }

    private static function saveAllTeamMembers($teamMembers)
    {
        $fp = fopen(self::$csvFile, 'w');
        fputcsv($fp, ['Name', 'Position', 'Description']);
        foreach ($teamMembers as $member) {
            fputcsv($fp, [$member['Name'], $member['Position'], $member['Description']]);
        }
        fclose($fp);
    }
    
    public static function createMember($name, $position, $description) {
		$member = [
            'Name' => $name,
            'Position' => $position,
            'Description' => $description
        ];
		if (($fp = fopen(self::$csvFile, 'a+')) !== false) {
            fputcsv($fp, $member);
            fclose($fp);
        }
	}
	
	public static function editMember($index, $name, $position, $description) {
		$teamMembers = self::getAllTeamMembers();
		if (isset($teamMembers[$index])) {
        	$teamMembers[$index] = [
            	'Name' => $name,
            	'Position' => $position,
            	'Description' => $description
        	];
        	self::saveAllTeamMembers($teamMembers);
        }
	}
	
}
?>
