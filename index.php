<?php
      require_once("includes/header.php");
      


      $previewVideo = new PreviewVideo($connection, $user);

      echo $previewVideo->create_preview_video(null);














 ?>