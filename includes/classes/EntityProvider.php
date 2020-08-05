<?php
	
	// class for the entity provider
	class EntityProvider
	{
		// function to have all entities in the database with the connection parameter,the category id and the limit
		public static function getEntitiesCategory($connection,$category_id,$limit)
		{
			$sql = "SELECT * from entities ";

			if($category_id != null) {
            $sql .= "WHERE category_id=:category_id ";
        }

        $sql .= "ORDER BY RAND() LIMIT :limit";

        $query = $connection->prepare($sql);

        if($category_id != null) {
            $query->bindValue(":category_id", $category_id);
        }

        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
        $query->execute();

        $result = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Entity($connection, $row);
        }

        return $result;
		}

	}

?>