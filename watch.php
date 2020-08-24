<?php 
	
	require_once("includes/header.php");

	if(!isset($_GET["id"]))
	{
		exit("No movies found!");
	}

	$entity_id = $_GET["id"];
	$entity = new Entity($connection, $entity_id);

	$previewVideo = new PreviewVideo($connection, $user);

      // set the preview video
      echo $previewVideo->watch_video($entity);
























 ?>