<?php
// $_SERVER['DOCUMENT_ROOT'] = '/home/fantasydragon/webpages/test';

include $_SERVER['DOCUMENT_ROOT'] . '/scripts/read_button_csv.php';
$buttonlist = getButtonsForLocation('hub', ['own_button.csv', 'neighbors.csv', 'other_buttons.csv']);
$fields = getfields('neighbors.csv');
$fields_html = array_search('button html', $fields);
$fields_name = array_search('name', $fields);
$fields_desc = array_search('desc', $fields);
$fields_flyer = array_search('flyer', $fields);

shuffle($buttonlist);

function getrandomflyer()
{
	$flyers = array_slice(scandir($_SERVER['DOCUMENT_ROOT'] . '/assets/web_button-flyers/random'), 2);
	return $flyers[array_rand($flyers)];
}

function printHubButtons()
{
	global $buttonlist;
	global $fields_html;
	global $fields_name;
	global $fields_desc;
	global $fields_flyer;
	foreach ($buttonlist as $buttondata) {
		echo '<li class="web_button">' . "\r\n";
		echo $buttondata[$fields_html] . "\r\n";
		echo '<p>';
		echo '<b>' . $buttondata[$fields_name] . '</b><br />';
		echo $buttondata[$fields_desc];
		echo '</p>' . "\r\n";
		echo '<img src="';
		if ($buttondata[$fields_flyer] == '') {
			echo '/assets/web_button-flyers/random/' . getrandomflyer();
		} else {
			echo $buttondata[$fields_flyer];
		}
		echo '" alt="" />' . "\r\n";
		echo '</li>' . "\r\n";
	}
}
