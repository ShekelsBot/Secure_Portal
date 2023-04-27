<?php
######################
#Customer class
#Ron Viseh
# Feb 2023
######################
class Customer{
	
	public $id;
	public $name;
	public $email = 'jdoe@example.com';
	public $balance;


	//------------------------------ function ------------------------------//	
	function getid(){ return $this->id; }
	function getEmail(){ return $this->email; }	
	
}//class






echo (new Customer())->getEmail();

?>
