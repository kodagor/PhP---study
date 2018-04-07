<?php

	class IteratorObiektu implements Iterator {
		
		private $ob;
		private $ile;
		private $biezacyIndeks;
		
		function __construct($ob) {
			$this->ob = $ob;
			$this->ile = count($this->ob->dane);
		}
		function rewind() {
			// set pointer at the beginning
			$this->biezacyIndeks = 0;
		}
		function valid() {
			// check if data exists in pointer localization
			return $this->biezacyIndeks < $this->ile;
		}
		function key() {
			// returns pointer value
			return $this->biezacyIndeks;
		}
		function current() {
			// returns value of pointer's currennt pos
			return $this->ob->dane[$this->biezacyIndeks];
		}
		function next() {
			// move pointer ahead
			$this->biezacyIndeks++;
		}
	}
	
	class Obiekt implements IteratorAggregate {
		public $dane = array();
		
		function __construct($wejscie) {
			$this->dane = $wejscie;
		}
		
		function getIterator() {
			return new IteratorObiektu($this);
		}
	}
	
	$moj_obiekt = new Obiekt(array(2,4,6,8,10));
	
	$moj_iterator = $moj_obiekt->getIterator();
	for($moj_iterator->rewind(); $moj_iterator->valid(); $moj_iterator->next()) {
		$klucz = $moj_iterator->key();
		$wartosc = $moj_iterator->current();
		echo $klucz." => ".$wartosc."<br>";
	}

?>
