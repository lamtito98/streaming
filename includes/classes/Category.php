<?php

	// class of Category
	class Category
	{
		private $connection, $username;
		public function __construct($connection, $username)
		{
			$this->connection = $connection;
			$this->username = $username;
		}

		// Show all categories
		public function showCategoriesName()
		{
			$query = $this->connection->prepare("SELECT * from categories");
			$query->execute();

			$html_code = " <div class='col-md-12'>
     					  ";

          while($row = $query->fetch(PDO::FETCH_ASSOC))
          {
          	$html_code .= $this->getCategories($row,null,true,true);
          }

          return $html_code ."</div>";
		}
		// get the categories
		private function getCategories($data,$name,$series,$movies)
		{
			$categoryId = $data["id"];
			$name = $name == null ? $data["category_name"] : $name;

			if($series && $movies)
			{
				$entities = EntityProvider::getEntitiesCategory($this->connection,$categoryId,10);
			}
			elseif ($series)
			 {
				# code...
			}
			else
			{

			}
			if(sizeof($entities) == 0)
			{
				return;
			}

			$entitiesHtml ="";

			$previewVideo = new PreviewVideo($this->connection, $this->username);
			// loop to get the entities
			foreach ($entities as $entity) 
			{
				# code...
				$entitiesHtml .= $previewVideo ->create_entities($entity); 

			}
			// return the category name and the content
			return "<div class='col-md-12'>
				        <div class='d-flex justify-content-start'>
				          <a href='category.php'><h2 class='text-white mb-2'>$name</h2></a>
				      	</div>
				      <div class='row'>
				      $entitiesHtml
				      </div>

				      </div>" ;
		}





















	}




?>