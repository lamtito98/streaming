<?php
/*Account class with validation and database insertions*/
class Account
{
	//declare the connection and an erray to put the errors
	private $connection;
	private $errorArray = array();

	//constructor for the connection
	public function __construct($connection)
	{
		$this->connection = $connection;
	}

	//function to get the errors and set them
	public function getError($error)
	{
		if(in_array($error, $this->errorArray))
		{
			return "<span class='text-danger '>$error</span>";
		}
	}

	// function to register the user
	public function register_user($firstname,$lastname,$username,$email,$confirm_email,$password,$confirm_password)
	{
		$this->validateFirstname($firstname);
		$this->validateLastname($lastname);
		$this->validateUsername($username);
		$this->validateEmails($email,$confirm_email);
		$this->validatePasswords($password,$confirm_password);

		if(empty($this->errorArray))
		{
			return $this->insertUser($firstname,$lastname,$username,$email,$password);
		}
		return false;
	}

	// function to validate the firstname
	private function validateFirstname($firstname)
	{
		if(strlen($firstname) < 2 || strlen($firstname) > 25)
		{
			array_push($this->errorArray, Constants::$firstNameErrorMessage);
		}
	}

	// function to validate the lastname
	private function validateLastname($lastname)
	{
		if(strlen($lastname) < 2 || strlen($lastname) > 25)
		{
			array_push($this->errorArray, Constants::$lastNameErrorMessage);
		}
	}

	// function to validate the username
	private function validateUsername($username)
	{
		if(strlen($username) < 5 || strlen($username) > 15)
		{
			array_push($this->errorArray, Constants::$userNameErrorMessage);
			return;
		}

		$query = $this->connection->prepare("SELECT * from users WHERE username=:username");
		$query->bindValue(":username", $username);
		$query->execute();

		if($query->rowCount() !=0)
		{
			array_push($this->errorArray, Constants::$usernameExists);
		}
	}

	// function to validate the email
	private function validateEmails($email,$confirm_email)
	{
		if($email != $confirm_email)
		{
			array_push($this->errorArray, Constants::$emailsDontMatch);
			return;
		}

		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			array_push($this->errorArray, Constants::$invalidEmail);
			return;
		}

		$query = $this->connection->prepare("SELECT * from users WHERE email=:email");
		$query->bindValue(":email", $email);
		$query->execute();

		if($query->rowCount() !=0)
		{
			array_push($this->errorArray, Constants::$emailExists);
		}
	}

	// function to validate the firstname
	private function validatePasswords($password,$confirm_password)
	{
		if($password != $confirm_password)
		{
			array_push($this->errorArray, Constants::$passwordsDontMatch);
			return;
		}

		if(strlen($password) < 8 || strlen($password) > 25)
		{
			array_push($this->errorArray, Constants::$passwordErrorMessage);
		}
	}

	// function to insert the user in the database and the hashing of the password
	private function insertUser($firstname,$lastname,$username,$email,$password)
	{
		$length_password = strlen($password);
		$length2 = ($length_password * 5) * ($length_password/10) + ($length_password+32);
		$password = $length_password.$password.$length2;
		$password = hash("sha512", $password);
		$password = strtoupper($password);
		
		$query = $this->connection->prepare("INSERT INTO users(firstname, lastname, username, email, passwordd)
							VALUES (:firstname, :lastname, :username, :email, :password)");
		$query -> bindValue(":firstname", $firstname);
		$query -> bindValue(":lastname", $lastname);
		$query -> bindValue(":username", $username);
		$query -> bindValue(":email", $email);
		$query -> bindValue(":password", $password);

		return $query -> execute();
	}

	// function to login the user
	public function login_user($username, $password)
	{
		$length_password = strlen($password);
		$length2 = ($length_password * 5) * ($length_password/10) + ($length_password+32);
		$password = $length_password.$password.$length2;
		$password = hash("sha512", $password);
		$password = strtoupper($password);

		$query = $this->connection->prepare("SELECT * from users WHERE username = :username AND passwordd = :password");
		$query -> bindValue(":username", $username);
		$query -> bindValue(":password", $password);

		$query -> execute();

		if($query -> rowCount() == 1)
		{
			return true;
		}

		if($query -> rowCount() == 0)
		{
			array_push($this ->errorArray, Constants::$notRegister);
			return false;
		}
		array_push($this ->errorArray, Constants::$loginFailed);
		return false;


	}














}

?>