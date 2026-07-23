<?php

$counterFile = 'visitorcount.txt';
$imageFile = 'visitorcount.png';

$backgroundImageUrl = $_SERVER['DOCUMENT_ROOT'] . '/assets/visitorcounter_bg.png';
$backgroundImageUrl = 'https://datakra.sh/assets/example_counter.jpg';
$textFontUrl = $_SERVER['DOCUMENT_ROOT'] . '/assets/fonts/Minecraft-Seven_v2.ttf';
$secondaryTextFontUrl = $_SERVER['DOCUMENT_ROOT'] . '/assets/fonts/Minecraft-Seven_v2.ttf';
$numberFontUrl = $_SERVER['DOCUMENT_ROOT'] . '/assets/fonts/Minecraft-Seven_v2.ttf';

$customText = 'Visitor Number:';  // Main headline text
$secondaryText = 'Cookie-Consent needed?';  // Secondary descriptive text

// Coordinates for positioning the text and number on the image
$textPosition = array(5, 17);  // X and Y cords for main text
$secondaryTextPosition = array(5, 4);
$numberPosition = array(4, 24);

$ImageBackgroundRGB = ['red' => 147, 'green' => 118, 'blue' => 0];
// RGB color definitions for text, secondary text, number, and optional frame
$textColorRGB = ['red' => 253, 'green' => 252, 'blue' => 1];  // Color for the main text
$secondaryTextColorRGB = ['red' => 0, 'green' => 255, 'blue' => 0];  // Color for the secondary text
$numberColorRGB = ['red' => 0, 'green' => 0, 'blue' => 0];  // Color for the counter number
$frameColorRGB = ['red' => 255, 'green' => 238, 'blue' => 0];  // Color for the frame
$drawFrame = true;  // Boolean to toggle drawing a frame around the image

$number = 0;

if (isset($_COOKIE['visit_counted'])) {
	$number = -1;
} else {
	setcookie('visit_counted', "Hiiii :3 You are (or've been) on my Site this session ^w^", path: '/');
	$number = 0;
}

if (!file_exists($counterFile)) {
	file_put_contents($counterFile, '0');  // Create the file with an initial value of 0 if it doesn't exist
}

// Open the file for reading and writing (c+ creates the file if it does not exist)
$fp = fopen($counterFile, 'c+');
if (flock($fp, LOCK_EX)) {  // Lock to synchronize file access
	// Read and increment the counter
	$number = $number + (int) fread($fp, filesize($counterFile));
	$number++;  // Increment the counter by 1

	// Prepare the file for writing the updated counter
	ftruncate($fp, 0);  // Clear file content
	rewind($fp);  // Reset the file pointer to the start of the file
	fwrite($fp, (string) $number);  // Write the new counter value to the file

	// Release the lock on the file
	flock($fp, LOCK_UN);
}
fclose($fp);  // Close the file

// Load the background image and determine its type (JPEG or PNG)
// list($width, $height, $type) = getimagesize($backgroundImageUrl);  // Get image dimensions and type
// switch ($type) {
// 	case IMAGETYPE_JPEG:
// 		$backgroundImage = imagecreatefromjpeg($backgroundImageUrl);  // Load JPEG image
// 		break;
// 	case IMAGETYPE_PNG:
// 		$backgroundImage = imagecreatefrompng($backgroundImageUrl);  // Load PNG image
// 		break;
// 	default:
// 		die('Unsupported image format: ' . $backgroundImageUrl);  // Exit script if image format is not supported
// }
$backgroundImage = imagecreatetruecolor(80, 25);
$backgroundColor = imagecolorallocate($backgroundImage, $ImageBackgroundRGB['red'], $ImageBackgroundRGB['green'], $ImageBackgroundRGB['blue']);
imagefill($backgroundImage, 0, 0, $backgroundColor);
// Allocate colors for the text and frame on the image
// $frameColor = imagecolorallocate($backgroundImage, $frameColorRGB['red'], $frameColorRGB['green'], $frameColorRGB['blue']);
// $textColor = imagecolorallocate($backgroundImage, $textColorRGB['red'], $textColorRGB['green'], $textColorRGB['blue']);
// $secondaryTextColor = imagecolorallocate($backgroundImage, $secondaryTextColorRGB['red'], $secondaryTextColorRGB['green'], $secondaryTextColorRGB['blue']);
$numberColor = imagecolorallocate($backgroundImage, $numberColorRGB['red'], $numberColorRGB['green'], $numberColorRGB['blue']);

// // Optionally draw a rectangular frame around the entire image
// if ($drawFrame) {
// 	imagerectangle($backgroundImage, 0, 0, $width - 1, $height - 1, $frameColor);  // Draw the frame
// }

// // Add the main text, secondary text, and counter number to the image
// imagestring($backgroundImage, 3, $textPositionX, $textPositionY, $customText, $textColor);  // Draw main text
// if (!empty($secondaryText)) {
// 	imagestring($backgroundImage, 3, $secondaryTextPositionX, $secondaryTextPositionY, $secondaryText, $secondaryTextColor);  // Draw secondary text if provided
// }
// imagestring($backgroundImage, 5, $numberPositionX, $numberPositionY, sprintf('%04d', $number), $numberColor);  // Draw counter number
$ttfres = imagettftext($backgroundImage, 23, 0, $numberPosition[0], $numberPosition[1], $numberColor, $numberFontUrl, sprintf('%04d', $number));

if (!$ttfres) {
	imagestring($backgroundImage, 5, $numberPosition[0], $numberPosition[1], sprintf('%04d', $number), $numberColor);
};

header('Content-Type: image/png');

imagepng($backgroundImage);
// imagedestroy($backgroundImage);
?>