<?php

	define("SHIRT", 14.99); // shirt value
	define("TROUSERS", 45.99); // trousers value
	define("HAT", 9.63); // hats value
	define("SHOES", 31,55); // hats value
	define("TAX", 0.23); // tax value
	
	// assigning form values
	$num_shirts = $_POST['shirts'];
	$num_trousers = $_POST['trousers'];
	$num_hats = $_POST['hats'];
	$num_shoes = $_POST['shoes'];
	
	// non-tax products value
	$non_tax_shirt = $num_shirts * SHIRT;
	$non_tax_troousers = $num_trousers * TROUSERS;
	$non_tax_hats = $num_hats * HAT;
	$non_tax_shoes = $num_shoes * SHOES;
	
	// netto value of order
	$order_value = $non_tax_shirt + $non_tax_troousers + $non_tax_hats + $non_tax_shoes;
	
	// with tax amounts
	$tax_shirt = $non_tax_shirt + $non_tax_shirt * TAX;
	$tax_trousers = $non_tax_troousers + $non_tax_troousers * TAX;
	$tax_hats = $non_tax_hats + $non_tax_hats * TAX;
	$tax_shoes = $non_tax_shoes + $non_tax_shoes * TAX;
	
	// order value
	$tax_order_value = $tax_shirt + $tax_trousers + $tax_hats + $tax_shoes;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Order value</title>
	<head>
	<body>
		<?php
			
			echo "non-tax values: <hr><br>";
			echo "shirts: ".round($non_tax_shirt, 2)."<br>";
			echo "trousers: ".round($non_tax_troousers, 2)."<br>";
			echo "hats: ".round($non_tax_hats, 2)."<br>";
			echo "shoes: ".round($non_tax_shoes, 2)."<br>";
			echo "entire order: ".round($order_value, 2)."<br>";
			echo "<hr><br>with-tax values: <hr><br>";
			echo "shirts: ".round($tax_shirt, 2)."<br>";
			echo "trousers: ".round($tax_trousers, 2)."<br>";
			echo "hats: ".round($tax_hats, 2)."<br>";
			echo "shoes: ".round($tax_shoes, 2)."<br>";
			echo "amount to pay: ".round($tax_order_value, 2);			
		?>
		
		<form action="cash.php" method="post">
			<p>
				<label for="cash">Your pay amount: </label>
				<input type="text" id="cash" name="cash" size="7" maxsize="7">
			</p>
			<input type="hidden" name="to_pay" value="<?php echo round($tax_order_value, 2); ?>">
			<input type="submit" value="send">
			
		</form>
	</body>
</html>