<?php

  function printDay($my_date) {
	  /** printing day of week **/	  
	  echo date("l", mktime(0,0,0,$my_date['month'],$my_date['day'],$my_date['year']));
  }
  
  function calculateDays($my_date) {
	  /** calculate days from birthday to today */
	  $time = (time() - mktime(0,0,0,$my_date['month'],$my_date['day'],
	  $my_date['year']))/60/60/24;
	  return $time;
  }
  
  $my_date['day'] = $_GET['day'];
  $my_date['month'] = $_GET['month'];
  $my_date['year'] = $_GET['year'];
  
  echo "<p>Day of the week: ";
  printDay($my_date);
  echo "</p><hr><p>Days from birthday: ".(int)calculateDays($my_date)."</p>";

?>