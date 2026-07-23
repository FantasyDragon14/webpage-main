<?php
// include_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/jslog.php';

function getButtonsForLocation($loc, $dbfiles)
{
	$array = [];
	foreach ($dbfiles as $dbfile) {
		$dbfile = $_SERVER['DOCUMENT_ROOT'] . '/db/' . $dbfile;
		// $dbfile = '/home/fantasydragon/webpages/test' . '/db/' . $dbfile;
		if (($open = fopen($dbfile, 'r')) !== false) {
			$fields = fgetcsv($open, 0, ',');  // field-names in first line
			if (!$loc_field = array_search('locations', $fields)) {
				echo 'no location field';
				break;
			}
			while (($data = fgetcsv($open, 0, ',')) !== false) {
				if (str_contains($data[$loc_field], $loc)) {
					$array[] = $data;
				}
			}

			fclose($open);
		}
	}
	return $array;
}

function getfields($dbfile)
{
	$dbfile = $_SERVER['DOCUMENT_ROOT'] . '/db/' . $dbfile;
	$fields = null;
	if (($open = fopen($dbfile, 'r')) !== false) {
		$fields = fgetcsv($open, 0, ',');  // field-names in first line
		fclose($open);
	}
	return $fields;
}
