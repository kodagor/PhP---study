<?php

	class Employee {
		protected static $id = 0;
		protected $name = "";
		private $salary = 0;
				
		function __construct($name, $salary) {
			$this->name = $name;
			$this->salary = $salary;
			self::$id++;
		}
		
		public function get_name() {
			return $this->name;
		}
		
		public function get_salary() {
			return $this->salary;
		}
		
		public function get_id() {
			
			if ((self::$id < 10)) {
				return "00".self::$id;
			}
			elseif (self::$id < 100) {
				return "0".self::$id;
			}
			else {
				return self::$id;
			}
		}
	}
	
	class Intern extends Employee {
		function __construct($name){ 
			$this->name = $name;
			self::$id++;
		}
	}
	
	echo "New obj:<br>";
	
	$prac1 = new Employee("Gorzka", 3000);
	echo "Prac1: <br>";
	echo $prac1->get_name();
	echo "<br>";
	echo $prac1->get_salary();
	echo "<br>id z public: ";
	echo $prac1::get_id();
	
	$prac2 = new Employee("Mocholak", 2100);
	echo "<hr>";
	echo "Prac2: <br>";
	echo $prac2->get_name();
	echo "<br>";
	echo $prac2->get_salary();
	echo "<br>id z public: ";
	echo $prac2::get_id();
	
	$prac3 = new Employee("Rzuchnik", 2100);
	echo "<hr>";
	echo "Prac3: <br>";
	echo $prac3->get_name();
	echo "<br>";
	echo $prac3->get_salary();
	echo "<br>id z public: ";
	echo $prac3::get_id();

	$int1 = new Intern("Michajlowicz");
	echo "<hr>";
	echo "Intern: <br>";
	echo $int1->get_name();
	echo "<br>";
	echo $int1->get_salary();
	echo "<br>id z public: ";
	echo $int1::get_id();
	

	

?>

