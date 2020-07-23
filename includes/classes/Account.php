<?php
/*Account class with validation and database insertions*/
class Account
{
	private $connection;
	private $errorArray = array();
	public function __construct($connection)
	{
		$this->connection = $connection;
	}

	public function register_user($firstname,$lastname,$username,$email,$confirm_email,$password,$confirm_password)
	{
		$this->validateFirstname($firstname);
		$this->validateLastname($lastname);
		$this->validateUsername($username);
		$this->validateFirstname($firstname);
		$this->validateFirstname($firstname);
		$this->validateFirstname($firstname);
	}

	private function validateFirstname($firstname)
	{
		if(strlen($firstname) < 2 || strlen($firstname) > 25)
		{
			array_push($this->errorArray, Constants::$firstNameErrorMessage);
		}
	}

	private function validateLastname($lastname)
	{
		if(strlen($lastname) < 2 || strlen($lastname) > 25)
		{
			array_push($this->errorArray, Constants::$lastNameErrorMessage);
		}
	}

	private function validateUsername($username)
	{
		if(strlen($username) < 2 || strlen($username) > 25)
		{
			array_push($this->errorArray, Constants::$userNameErrorMessage);
		}
	}

	public function getError($error)
	{
		if(in_array($error, $this->errorArray))
		{
			return $error;
		}
	}

















}

?>