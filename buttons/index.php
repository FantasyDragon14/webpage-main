<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/pathinfo.php';

// so legacy button links still work
$buttons_legacy = array(
	'fantasydragon14-button_cyber.gif' => 'fantasydragon.xyz-button_home.gif',  // legacy button compat
	'fantasydragon14-button_den.gif' => 'fantasydragon.xyz-button_clouds-old.gif',  // legacy button compat
	'fantasydragon14-button_vaporwave.gif' => 'fantasydragon.xyz-button_vaporwave.gif',  // legacy button compat)
);

include 'button_map.php';

function output_image($filename)
{
	if (file_exists($filename)) {
		$image_info = getimagesize($filename);

		// Set the content-type header as appropriate
		header('Content-Type: ' . $image_info['mime']);

		// Set the content-length header
		header('Content-Length: ' . filesize($filename));
		header('Content-Disposition:inline; filename="' . $filename . '"');

		header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0', false);
		header('Pragma: no-cache');

		// Write the image bytes to the client
		readfile($filename);
	} else {  // Image file not found

		header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	}
}

// echo '<p>Path: ' . $_SERVER['PATH_INFO'] . '</p>';
// exit;

// if no arguments are given
if ($_SERVER['PATH_INFO'] == '' && $_SERVER['QUERY_STRING'] == '') {
	output_image($buttons_available[array_rand($buttons_available)]);
}
// we don't use queries yet
elseif ($_SERVER['PATH_INFO'] == '') {
	output_image($buttons_available[array_rand($buttons_available)]);
}
// if path_info is a legacy button
elseif (array_key_exists($_SERVER['PATH_INFO'], $buttons_legacy)) {
	output_image($buttons_legacy[$_SERVER['PATH_INFO']]);
}
// if path info is a valid active button
elseif ($_SERVER['QUERY_STRING'] == '' && array_key_exists($_SERVER['PATH_INFO'], $buttons_available)) {
	output_image($buttons_available[$_SERVER['PATH_INFO']]);
}
// fallback
else {
	output_image($buttons_available[array_rand($buttons_available)]);
}
