<?php

  // check for variables
  $text_button = $_POST['text_button'];
  $color = $_POST['color'];

  if (empty($text_button) || empty($color)) {
    echo '<p>Creating image impossible - to few arguments in form<p>';
    exit;
  }

  // creating image with proper background and checking size
  $img = imagecreatefrompng('img/'.$color.'-button.png');

  $img_width = imagesx($img);
  $img_height = imagesy($img);

  // buttons should have 18px space from edge
  $img_width_no_margins = $img_width - (2 * 18);
  $img_height_no_margins = $img_height - (2 * 18);

  // tell GD2 where to find font

  putenv('GDFONTPATH=/usr/share/fonts/truetype/dejavu');
  $font_name = 'DejaVuSans.ttf';

  // calculate font size and lowering
  // start with the highest size
  $font_size = 33;

  do {
    $font_size--;

    // calcute text size and bounding box
    $bbox = imagettfbbox($font_size, 0, $font_name, $text_button);

    $text_right = $bbox[2];   // right coord
    $text_left = $bbox[0];    // left coord
    $text_width = $text_right - $text_left;   // how wide?
    $text_height = abs($bbox[7] - $bbox[1]);  // how tall?
  }
  while ($font_size > 8 && ($text_height > $img_height_no_margins || $text_width > $img_width_no_margins));

  if ($text_height > $img_height_no_margins || $text_width > $img_width_no_margins) {
    echo '<p>Entered text doesn\'t match the button size</p>';
  } else {
    // found matching size
    // calculate his coordinates

    $text_x = $img_width / 2.0 - $text_width / 2.0;
    $text_y = $img_height / 2.0 - $text_height / 2.0;

    if ($text_left < 0) {
      $text_x += abs($text_left);   // adding factor to the left pos
    }

    $above_text_line = abs($bbox[7]);   // how high above basis?
    $text_y += $above_text_line;    // adding factor to basis

    $text_y -= 2;   // adjust to shape of the template factor

    $white = imagecolorallocate($img, 255, 255, 255);

    imagettftext($img, $font_size, 0, $text_x, $text_y, $white, $font_name, $text_button);

    header('Content-type: image/png');
    imagepng($img);

  }

  // release resources
  imagedestroy($img);

?>
