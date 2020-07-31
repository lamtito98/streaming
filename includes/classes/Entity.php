<?php

	class Entity
	{
		private $connection, $data;

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

				$this->$data = $query->fetch(PDO::FETCH_ASSOC);
			}
			
		}

		public function getId()
		{
			return $this->data["id"];
		}

		public function getName()
		{
			return $this->data["entities_name"];
		}

		public function getThumbnail()
		{
			return $this->data["thumbnail"];
		}

		public function getPreviewVideo()
		{
			return $this->data["preview_video"];
		}

		




















	}

?>