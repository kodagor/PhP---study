<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sendind...</title>
  </head>
  <body>
    <h1>Sending file</h1>

    <?php

      if ($_FILES['user_file']['error'] > 0) {
        echo "Error ";

        switch ($_FILES['user_file']['error']) {
          case 1:
            echo "File size above upload_max_filesize";
            break;
          case 2:
            echo "File size above max_file_size";
            break;
          case 3:
            echo "Plik sended only parted";
            break;
          case 4:
            echo "No file sended";
            break;
          case 6:
            echo "Cannot send file. No temporary directory selected";
            break;
          case 7:
            echo "Sending not complete. Cannot save file on disk";
            break;
          case 8:
            echo "PHP extension has blocked receiving file on server";
            break;
        }
        exit;
      }

      // check for MIME
      if ($_FILES['user_file']['type'] != 'image/png') {
        echo "Error. File was not image in png!";
        exit;
      }

      // set file to declared localization
      $local = "uploads/".$_FILES['user_file']['name'];

      if (is_uploaded_file($_FILES['user_file']['tmp_name'])) {
        if (!move_uploaded_file($_FILES['user_file']['tmp_name'], $local)) {
          echo "Error: cannot copy file to directory";
          exit;
        }
      } else {
        echo "Error: possibility of attack during uploading file. Filename: ";
        echo $_FILES['user_file']['name'];
        exit;
      }

      echo "File has been upload properly.";

      // show image
      echo '<p>This is sended image: <br>';
      echo '<img src="uploads/'.$_FILES['user_file']['name'].'">';

    ?>

  </body>
</html>
