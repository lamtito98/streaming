<?php
// class to protect the entries against injections
class FormSanitizer
{
	// protection for all string
	public static function sanitizeFormString($inputText)
	{
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ", "", $inputText);
		$inputText = strtolower($inputText);
		$inputText = ucfirst($inputText);

		return $inputText;
	}

	// protection against the username
	public static function sanitizeFormUsername($inputText)
	{
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ", "", $inputText);
		return $inputText;
	}

	// protection against the password
	public static function sanitizeFormPassword($inputText)
	{
		$inputText = strip_tags($inputText);
		return $inputText;
	}

	// protection against the email
	public static function sanitizeFormEmail($inputText)
	{
		$inputText = strip_tags($inputText);
		$inputText = str_replace(" ", "", $inputText);
		return $inputText;
	}
}

?>