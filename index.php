<?php
      require_once("includes/header.php");
      

      // create the preview video
      $previewVideo = new PreviewVideo($connection, $user);

      // set the preview video
      echo $previewVideo->create_preview_video(null);


      // Create the categories
      $category = new Category($connection, $user);

      // show the categories
      echo $category->showCategoriesName();
















 ?>