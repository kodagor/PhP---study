<?php

	$val = 3.14235223;
	echo $val."<br>";
	echo "echo: ";
	echo number_format($val, 2);
	
	echo "<br>";
	
	echo "printf(): ";
	printf("%.2f", $val);
	
	echo "<hr>";
	
	$email = 'jan_pawel_2@watykan.ie';
	$tab_mail = explode('@', $email);
	printf("%s", $tab_mail[1]);
	
	echo "<hr>";
	
	$new_tab = ['a','l','a','m','a','k','o','t','a'];
	$new_str = implode('_', $new_tab);
	printf("%s", $new_str);
	
	echo "<hr>String od tyłu...<br>";
	$normal_str = "Make war";
	printf("%s", $normal_str);
	$n = strlen($normal_str);
	$n--;
	echo "<br>";
	printf("%d", $n);
	echo "<br>".substr($normal_str, $n)."<br>";
	$back_str = "";
	for ($n; $n >= 0; $n--) {
		$back_str .= substr($normal_str, $n, 1);
	}
	printf("%s", $back_str); 
	
	echo "<hr> strnatcmp(): <br>";
	$str1 = "123";
	$str2 = "32";
	echo "$str1<br>$str2<br>";
	echo "strcmp():<br>";
	$equa = strcmp($str1, $str2);
	if ($equa == 0) {
		echo "Equals";
	} elseif ($equa < 0) {
		echo "str2 greater";
	} elseif ($equa > 0) {
		echo "str1 greater";
	}
	echo "<br><br>";
	echo "strnatcmp():<br>";
	$equa = strnatcmp($str1, $str2);
	if ($equa == 0) {
		echo "Equals";
	} elseif ($equa < 0) {
		echo "str2 greater";
	} elseif ($equa > 0) {
		echo "str1 greater";
	}
	
	echo "<hr>Remove bad words/1<br>";
	$txt = "";
	$txt .= "Fuck this motherfucker. I will screw them all!<br>";
	$txt .= "They need to eat my shit. Fuck them!";
	echo "Plain text:<br>";
	echo $txt;
	$cenz = ['fuck', 'motherfucker', 'screw', 'shit'];
	$txt = strtolower($txt);
	$plain_txt = str_replace($cenz, 'Love', $txt);
	echo "<hr>Love text<br>";
	echo "$plain_txt";
	
	echo "<hr>preg_split():<br>";
	$domain = 'user@domain.com';
	$tab = preg_split("/\.|@/", $domain);
	while (list($key, $value) = each($tab)) {
		echo "<br>".$value;
	}
?>
