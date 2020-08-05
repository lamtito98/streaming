<?php

	// class of the preview video
	class PreviewVideo
	{
		private $connection, $username;
		public function __construct($connection, $username)
		{
			$this->connection = $connection;
			$this->username = $username;
		}

		// function to get the entity random
		private function getEntity()
		{
			$entity = EntityProvider::getEntitiesCategory($this->connection,null,1);
			return $entity[0];
		}

		// function to create the preview video and set it to the index page
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
				<div class='container-fluid mb-3'>
					<img src='$thumbnail' class='img-fluid' hidden width='100%' height='100%'>

					<video autoplay muted class='img-fluid'>

					<source src='$previewVideo' type='video/mp4' hidden width='100%' height='100%'>
					</video>

				</div>";

		}


		// function to create the entities
		public function create_entities($entity)
		{
			$id = $entity->getId();
			$name = $entity->getName();
			$thumbnail = $entity->getThumbnail();

			// Return the images,names
			return "<div class='col-sm-4 col-md-3 mb-3'>
				        <a href='watch.php?id=$id'>
				          <div class='card'>
				            <img src='$thumbnail'  class='card-img-top' style='height:300px;width:auto;object-fit:cover;'>
				            <div class='card-body'>
				              <h3>$name</h3>
				              <h4>Description</h4>
				            </div>
				          </div>
				          </a>
				        </div>";
		}


























	}





























?>