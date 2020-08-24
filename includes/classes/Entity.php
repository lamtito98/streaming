<?php

	class Entity
	{
		//declare the connection and a data variable to have the data
		private $connection, $data;

		// condtructor for the connection
		public function __construct($connection, $input)
		{
			$this->connection = $connection;

			if(is_array($input))
			{
				$this->data = $input;
			}
			else
			{
				$query = $this->connection->prepare("SELECT * from entities where id=:id");
				$query->bindValue(":id", $input);
				$query-> execute();

				$this->data = $query->fetch(PDO::FETCH_ASSOC);
			}
			
		}

		// function to get the entities id
		public function getId()
		{
			return $this->data["id"];
		}

		// function to get the entities name
		public function getName()
		{
			return $this->data["entities_name"];
		}

		// function to get the thumbnail
		public function getThumbnail()
		{
			return $this->data["thumbnail"];
		}

		// function to get the preview_video
		public function getPreviewVideo()
		{
			return $this->data["preview_video"];
		}

		




















	}

?>