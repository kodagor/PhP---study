<?php

	class Employee {
		private $name = null;
		private $age = null;
		private $salary = null;
		
		public function __construct($name, $age, $salary) {
			$this->name = $name;
			$this->age = $age;
			$this->salary = $salary;
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function getAge() {
			return $this->age;
		}
		
		public function getSalary() {
			return $this->salary;
		}
	}
	
	$prac1 = new Employee("Daniel", 24, 3000);
	
	echo 'name='.$prac1->getName().', age='.$prac1->getAge().', salary='
		.$prac1->getSalary();

?>