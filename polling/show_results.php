<?php

  // check credentials
  $vote = $_POST['vote'];
  if (empty($vote)) {
    echo '<p>You left the form empty</p>';
    exit;
  }

  /****************************************
    DATABASE QUERY
  ****************************************/

  // log in DATABASE
  if (!$db_connect = new mysqli('localhost', 'ankieter', 'ankieta', 'polling')) {
    echo '<p>Database connection failure.<br>Please again later.</p>';
    exit;
  }

  mysqli_set_charset($db_connect, "utf-8");   // connection with database uses utf-8

  // register sended vote in db (vote_query = v_query)
  $v_query = "UPDATE polling_results SET num_votes = num_votes + 1 WHERE candidate = ?";

  $v_stmt = $db_connect->prepare($v_query);
  $v_stmt->bind_param('s', $vote);
  $v_stmt->execute();
  $v_stmt->free_result();

  // select current results (result_query = r_query
  $r_query = "SELECT candidate, num_votes FROM polling_results";
  $r_stmt = $db_connect->prepare($r_query);
  $r_stmt->execute();
  $r_stmt->store_result();
  $r_stmt->bind_result($candidate, $num_votes);
  $cands_num = $r_stmt->num_rows;

  // calculate sum_votes
  $sum_votes = 0;
  while ($r_stmt->fetch()) {
    $sum_votes += $num_votes;
  }

  $r_stmt->data_seek(0);

  /***********************************
    calculates for diagram
  ***********************************/

  // setting variables
  putenv('GDFONTPATH=/usr/share/fonts/truetype/dejavu');
  $width = 500;
  $left_margin = 70;
  $right_margin = 50;
  $stick_height = 40;
  $stick_space = $stick_height / 2;
  $font = 'DejaVuSans.ttf';
  // font sizes in pts
  $title_size = 16;
  $basic_size = 12;
  $small_size = 12;
  $indent = 10;

  // setting starting drawing point
  $x = $left_margin + 60;     // base of diagram
  $y = 50;
  $stick_unit = ($width - ($x + $right_margin)) / 100;        // one diagram unit

  // calculate diagram height
  $height = $cands_num * ($stick_height + $stick_space) + 50;

  /***********************************
    setting basic image
  ***********************************/

  // creating empty frame
  $img = imagecreatetruecolor($width, $height);
  // giving colors
  $white = imagecolorallocate($img, 255, 255, 255);
  $blue = imagecolorallocate($img, 0, 0, 255);
  $black = imagecolorallocate($img, 0, 0, 0);
  $pink = imagecolorallocate($img, 255, 78, 243);

  $text_color = $black;
  $percent_color = $black;
  $background_color = $white;
  $line_color = $black;
  $stick_color = $blue;
  $num_color = $pink;

  // cratimg drawing frame
  imagefilledrectangle($img, 0, 0, $width, $height, $background_color);

  // drawing conturs around frame
  imagerectangle($img, 0, 0, $width-1, $height-1, $line_color);

  // adding title
  $title = 'Polling results';
  $title_coords = imagettfbbox($title_size, 0, $font, $title);
  $title_length = $title_coords[2] - $title_coords[0];
  $title_height = abs($title_coords[7] - $title_coords[1]);
  $title_above_line = abs($title_coords[7]);
  $title_x = ($width - $title_height) / 2;      // centering in OX
  $title_y = ($y - $title_height) / 2 + $title_above_line;      // centering in OY

  imagettftext($img, $title_size, 0, $title_x, $title_y, $text_color, $font, $title);

  // drawing base line little above first stick and little under last stick
  imageline($img, $x, $y-5, $x, $height-15, $line_color);

  /********************************
    displaying data on diagram
  ********************************/

  // select data and drawing sticks for each one of them
  while ($r_stmt->fetch()) {
    if ($sum_votes > 0) {
      $percent = intval(round(($num_votes / $sum_votes) * 100));
    } else {
      $pecent = 0;
    }
    // showing % for this value
    $percent_coords = imagettfbbox($basic_size, 0, $font, $percent.'%');
    $percent_length = $percent_coords[2] - $percent_coords[0];
    imagettftext($img, $basic_size, 0, $width - $percent_length - $indent,
      $y + ($stick_height/2), $percent_color, $font, $percent.'%');

    // stick length for this value
    $stick_length = $x + ($percent * $stick_unit);

    // drawing stick for this value
    imagefilledrectangle($img, $x, $y-2, $stick_length, $y + $stick_height, $stick_color);

    // drawing title for this value
    imagettftext($img, $basic_size, 0, $indent, $y + ($stick_height/2), $text_color, $font, $candidate);

    // drawing contur showing the 100%
    imagerectangle($img, $stick_height+1, $y-2, ($x+(100*$stick_unit)), $y+$stick_height, $line_color);

    // showing numbers
    imagettftext($img, $small_size, 0, $x+(100*$stick_unit)-50, $y+($stick_height/2), $num_color, $font,
      $num_votes.'/'.$sum_votes);

    // moving to next stick
    $y = $y + ($stick_height + $stick_space);
  }

  /******************************
    displaiyng image
  ******************************/

  header('Content-type: image/png');
  imagepng($img);

  /****************************
    freeeing resources
  ****************************/

  $r_stmt->free_result();
  $db_connect->close();
  imagedestroy($img);

?>
