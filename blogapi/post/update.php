<?php 

   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: PUT');
   header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
   include "../config/config.php";

   
   $data = json_decode(file_get_contents('php://input'), true);

   if(isset($_GET['id'])) {

   $id = $_GET['id'];

   $body = $data['body'];
   $author = $data['author'];
   $category_name = $data['category_name'];
   $title = $data['title'];
   $created_at = $data['created_at'];

   $sel = "UPDATE posts SET body = '$body', author = '$author', category_name = '$category_name', title = '$title', created_at = '$created_at' WHERE id = '$id'";

   $sel_query = $conn->query($sel);


   if($sel_query->execute()) {
   	echo json_encode("UPDATED");
   } else {
   	echo json_encode("not UPDATED");
   }

}