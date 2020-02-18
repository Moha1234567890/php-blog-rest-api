<?php 

   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: DELETE');
   header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
   include "../config/config.php";

   
   $data = json_decode(file_get_contents('php://input'), true);

   if(isset($data)) {
      $id = $_GET['id'];

  
      $sel = "DELETE FROM posts WHERE id = '$id'";

      $sel_query = $conn->query($sel);


      if($sel_query->execute()) {
         echo json_encode("DELETED");
      } else {
         echo json_encode("not DELETED");
      }
   } else {
      echo json_encode("Not Set");
   }

   

