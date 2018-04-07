<?php

	require('site.php');
	
	class Services_Site extends Site {
		
		private $buttons2 = array("Engineering" => "engi.php",
								  "Compliance with standards" => "standards.php",
								  "Human resources" => "hr.php",
								  "Selection of goals" => "goals.php"
								 );
		
		// override_function						 
		public function display_all() {
			echo "<!DOCTYPE html>\n<html>\n<head>\n";
			$this->display_title();
			$this->display_keywords();
			$this->display_styles();
			echo "</head>\n<body>\n";
			$this->display_header();
			$this->display_menu($this->buttons);
			$this->display_menu($this->buttons2);
			echo $this->contents;
			$this->display_footer();
			echo "</body>\n</html>\n"; 
		}
	}
	
	$services = new Services_Site();
	
	$services->contents = "<section><p>TLA Consulting company offers several types of services.
							  Maybe productivity of Your employees would be improved, if Your company
							  would take part in engineering process. Maybe whole system needs appropriate goals selection
							  or changes in way of human resources.</p></section>";
	
	$services->display_all();

?>
