<?php
ob_start();
session_start();
date_default_timezone_set("America/Toronto");

	try
	{
		$connection = new PDO("mysql:dbname=streaming;host=localhost", "root","");
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}
	catch(PDOException $e)
	{
		exit("connection failed: ".$e->getMessage());
	}

?>