<?php

	require_once("function.php");

?>

<html>
  <head>
    <meta charset="utf-8">
	<title>Site scrapper</title>
  </head>
  <body>
    <?php
	 
	  get_email("https://cits.uwex.uwc.edu/email-address-examples");
	
	?>
	<p>Message has been sent</p>
  </body>
</html>