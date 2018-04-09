<?php

	class OpenFileException extends Exception {
		function __toString() {
			return "OpenFileException ".$this->getCode()
					.": ".$this->getMessage()."<br>"." in "
					.$this->getLine()." in line nr: ".$this->getLine()."<br>";
		}
	}
	
	class SaveFileException extends Exception {
		function __toString() {
			return "SaveFileException ".$this->getCode()
					.": ".$this->getMessage()."<br>"." in "
					.$this->getLine()." in line nr: ".$this->getLine()."<br>";
		}
	}
	
	class BlockadeFileException extends Exception {
		function __toString() {
			return "BlockadeFileException ".$this->getCode()
					.": ".$this->getMessage()."<br>"." in "
					.$this->getLine()." in line nr: ".$this->getLine()."<br>";
		}
	}

?>
