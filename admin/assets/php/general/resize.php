<?php
// The file
$filename = 'test.jpg';

// Set a maximum height and width
$width = 200;
$height = 200;

// Content type
//header('Content-Type: image/jpeg');

// Get new dimensions
list($width_orig, $height_orig) = getimagesize($filename);

$ratio_orig = $width_orig/$height_orig;

if ($width/$height > $ratio_orig) {
   $width = $height*$ratio_orig;
} else {
   $height = $width/$ratio_orig;
}

// Resample
//$image_p = new GdImage();
$image = imagecreatefromjpeg($filename);
imagecopyresampled(new GdImage(), $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

// Output
imagejpeg($image_p, null, 100);
?>