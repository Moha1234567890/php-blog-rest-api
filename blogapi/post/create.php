<?php 

   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: POST');
   header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
   include "../config/config.php";

   
   $data = json_decode(file_get_contents('php://input'), true);

   $body = $data['body'];
   $author = $data['author'];
   $category_name = $data['category_name'];
   $title = $data['title'];
   $created_at = $data['created_at'];

   $sel = "INSERT INTO posts SET body = '$body', author='$author', title = '$title', category_name =  '$category_name', created_at = '$created_at'";

   $sel_query = $conn->prepare($sel);
  


   $sel_query->execute();

   $num = $sel_query->rowCount();

   if($num > 0) {
   	echo json_encode("created");
   } else {
   	echo json_encode("not created");
   }

