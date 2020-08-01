<?php

	class PreviewVideo
	{
		private $connection, $username;
		public function __construct($connection, $username)
		{
			$this->connection = $connection;
			$this->username = $username;
		}

		private function getEntity()
		{
			$query = $this->connection->prepare("SELECT * from entities ORDER by RAND() LIMIT 1 ");
			$query->execute();

			$row = $query->fetch(PDO::FETCH_ASSOC);

			return new Entity($this->connection, $row);
		}

		public function create_preview_video($entity)
		{
			if($entity == null)
			{
				$entity = $this->getEntity();
			}

			$id = $entity->getId();
			$name = $entity->getName();
			$thumbnail = $entity->getThumbnail();
			$previewVideo = $entity->getPreviewVideo();


			echo " 
				<div class='container-fluid'>
					<img src='$thumbnail' class='img-fluid' hidden width='100%' height='100%'>

					<video autoplay muted class='img-fluid'>

					<source src='$previewVideo' type='video/mp4' hidden width='100%' height='100%'>
					</video>

					</div>";

		}

























	}





























?>