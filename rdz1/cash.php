<?php

	// set form variables
	$to_pay = $_POST['to_pay'];
	$your_pay = $_POST['cash'];
	
	if ($your_pay < $to_pay) {
		echo "You need to pay more!";
	} else {
		echo "<p>Amount to pay: ".$to_pay."</p>";
		echo "<p>Your amount: ".$your_pay."</p>";
		echo "<hr>Your exchange: ".($your_pay - $to_pay);
	}

?>