<?php 


/************Helper function************/
function clean($string)
{
	return htmlentities($string);
}

function redirect($location)
{
	return header("Location: {$location}");
}

function set_message($message)
{
	if(!empty($message))
	{
		$_SESSION['messsage'] = $message;
	}
	else
	{
		$message = "";
	}
}

function display_message()
{
	if(isset($_SESSION['messsage']))
	{
		echo $_SESSION['messsage'];
		unset($_SESSION['messsage']);
	}
}


function token_generator()
{
	$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
	return $token;

}

function validation_errors($error_message)
{
	$error_message = <<<DELIMITER

<div class="alert alert-danger alert-dismissible" role="alert">
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  	<strong>Warning!</strong> $error_message
 </div>
DELIMITER;

return $error_message;
}


function email_exists($email) {

	$sql = "SELECT id FROM users WHERE email = '$email'";

	$result = query($sql);

	if(row_count($result) == 1 ) 
	{

		return true;

	} 
	else 
	{


		return false;

	}



}



function username_exists($username) 
{

	$sql = "SELECT id FROM users WHERE username = '$username'";

	$result = query($sql);

	if(row_count($result) == 1 ) 
	{

		return true;

	} else
	{


		return false;

	}

}


function send_email($email, $subject, $msg, $headers)
{
	return mail($email, $subject, $msg, $headers);

}


/************Validation function************/

function validate_user_registration()
{
	$errors = [];
	$min = 3;
	$max = 20;
	if ($_SERVER['REQUEST_METHOD'] == "POST") 
	{
		$first_name  = clean($_POST['firstname']);
		$last_name  	= clean($_POST['lastname']);
		$username  	= clean($_POST['username']);
		$email 		= clean($_POST['email']);
		$password  	= clean($_POST['password']);
		$confirm_password  = clean($_POST['confirm_password']);

		if (strlen($first_name)< $min) 
	{
		$errors[] ="Firstname cannot be less than {$min} characters";
	}
	if (strlen($first_name)> $max) 
	{
		$errors[] ="Firstname cannot be more than {$max} characters";
	}

	if (strlen($last_name)< $min) 
	{
		$errors[] ="Lastname cannot be less than {$min} characters";
	}
	if (strlen($last_name)> $max) 
	{
		$errors[] ="Lastname cannot be more than {$max} characters";
	}

	if (username_exists($username)) 
	{
		$errors[] ="Username already taken.";
	}

	if (strlen($username)< $min) 
	{
		$errors[] ="Username cannot be less than {$min} characters";
	}
	if (strlen($username)> $max) 
	{
		$errors[] ="Username cannot be more than {$max} characters";
	}
	if (email_exists($email)) 
	{
		$errors[] ="Email already exists.";
	}
	if (strlen($email)< $max) 
	{
		$errors[] ="Your email cannot be less than {$min} characters";
	}

	if ($password !== $confirm_password)
	{
		$errors[] = "Your password do not match.";
	}

	if (!empty($errors)) 
	{
		foreach ($errors as $error)
			{
				echo validation_errors($error);
			}
	}
	else
	{
		if (register_user($first_name, $last_name, $username, $email, $password)) 
		{

			set_message("<p class='bg-success text-center'> Please check your email for an activation link.</p>");
			redirect("index.php");
		}
		else
		{
			set_message("<p class='bg-danger text-center'> Sorry! We can not register the user.</p>");
			redirect("index.php");
		}
	}


	}

}



function register_user($firstname,$lastname,$username,$email,$password)
{
	$firstname 	= escape($firstname);
	$lastname 	= escape($lastname);
	$username 	= escape($username);
	$email 		= escape($email);
	$password 	= escape($password);

	if(email_exists($email))
	{
		return false;
	}
	else if(username_exists($username))
	{
		return false;
	}

	else
	{
		$password = md5($password);
		$validation_code = md5($username . microtime());
		$sql = "INSERT INTO users(first_name,last_name,username,email,password,validation_code, active)";
		$sql.= " VALUES('$firstname','$lastname', '$username' , '$email', '$password' , '$validation_code', 0)";
		$result = query($sql);
		confirm($result);

		$subject = "Activate Account";
		$msg = " Please clik the link bellow to active your account
		http://localhost/login/activate.php?email=$email&code=$validation_code";

		$headers = "From: kinglamtito@gmail.com";
		send_email($email, $subject, $msg, $headers);

		return true;
	}


}

/**activate user***/


function activate_user()
{
	if ($_SERVER['REQUEST_METHOD'] == "GET") 
	{
		if(isset($_GET['email']))
		{
			echo $email = clean($_GET['email']);
			echo $validation_code = clean($_GET['code']);

			$sql = "SELECT id FROM users WHERE email = '".$_GET['email']."' AND validation_code = '".escape($_GET['code'])."' ";
			$result = query($sql);
			confirm($result);

			if(row_count($result) == 1)
			{
				echo "<p class='bg-success'>Account activated! Login now please</p>";
			}
			
		}

	}
}



 ?>