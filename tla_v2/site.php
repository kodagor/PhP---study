<?php

	class Site {
		// Attributes class Site
		public $contents;
		public $title = "TLA CONSULTING";
		public $key_words = "TLA Consulting. They Likes Articles. We love search engines!";
		public $buttons = array("Home" =>  "main.php",
								"Contact" => "contact.php",
								"Services" => "services.php",
								"Site map" => "map.php"
								);
		
		// class methods
		public function __set($name, $value) {
			$this->name = $value;
		}
		
		public function display_all() {
			echo "<!DOCTYPE html>\n<html>\n<head>\n";
			$this->display_title();
			$this->display_keywords();
			$this->display_styles();
			echo "</head>\n<body>\n";
			$this->display_header();
			$this->display_menu($this->buttons);
			echo $this->contents;
			$this->display_footer();
			echo "</body>\n</html>\n";
		}
		
		public function display_title() {
			echo "<title>" . $this->title . "</title>";
		}
		
		public function display_keywords() {
			echo "<meta name=\"keywords\" content=\"" . $this->key_words . "\">";
		}
		
		public function display_styles() {
			?>
			<link href="styles.css" type="text/css" rel="stylesheet">
			<?php
		}
		
		public function display_header() {
			?>
			<!-- header -->
			<header>
				<img src="logo.gif" alt="TLA logo" height="70" width="70">
				<h1>TLA Consulting</h1>
			</header>
			<?php
		}
		
		public function display_menu($buttons) {
			echo "<!-- menu -->\n<nav>";
			
			while (list ($name, $url) = each($buttons)) {
				$this->display_button($name, $url, !$this->is_it_current_url($url));
			}
			echo "</nav>\n";
		}
		
		public function is_it_current_url($url) {
			// looking for $url string in $_SERVER['PHP_SELF']
			if (strpos($_SERVER['PHP_SELF'], $url) == false) {
				return false;
			}
			else {
				return true;
			}
		}
		
		public function display_button($name, $url, $active=true) {
			if ($active) {
				?>
				<div class="menuitem">
					<a href="<?=$url?>">
						<img src="m-logo.gif" alt="" height="20" width="20">
						<span class="menutext"><?=$name?></span>
					</a>
				</div>
				<?php
			}
			else {
				?>
				<div class="menuitem">
					<img src="s-logo.gif" alt="" height="20" width="20">
					<span class="menutext"><?=$name?></span>
				</div>
				<?php
			}
		}
		
		public function display_footer() {
			?>
				<!-- footer -->
				<footer>
					<p>&copy; TLA Consulting<br>
					Please visit our <a href="legal.php">legal site</a>.</p>
				</footer>
			<?php
		}
	}

?>
