<?php

	require('site.php');
	
	$main_page = new Site();
	
	$main_page->contents = "<!-- site contents -->
							<section>
							<h2>Welcome on the TLA Consulting site.</h2>
							<p>Please, spend some of Your time and meet us</p>
							<p>Our main objective is to meeting bussiness needs. We hope You cooperate with us!</p>
							</section>";
	
	$main_page->display_all();

?>
