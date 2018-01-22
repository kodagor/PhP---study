<?php

	class Employee {
		private $name;
		private $age;
		private $salary;
		
		public function __construct($name, $age, $salary) {
			$this->name = $name;
			$this->age = $age;
			$this->salary = $salary;
		}
		
		public function get_name() {
			return $this->name;
		}
		
		public function get_age() {
			return $this->age;
		}
		
		public function get_salary() {
			return $this->salary;
		}
	}
	
	$prac1 = new Employee("Daniel", 24, 3000);
	
	echo 'name='.$prac1->get_name().', age='.$prac1->get_age().', salary='.$prac1->get_salary();

?>