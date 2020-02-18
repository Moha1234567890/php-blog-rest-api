<?php 

   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: POST');
   header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
   include "../config/config.php";

   
   $data = json_decode(file_get_contents('php://input'), true);

   $email = $data['email'];
   $username = $data['username'];
   $password =$data['password'];
   

   $sel = "INSERT INTO users SET email = '$email', username='$username',  password =  '$password'";

   $sel_query = $conn->prepare($sel);
   

   $sel_query->execute();

   $num = $sel_query->rowCount();

   if($num > 0) {
   	echo json_encode("created");
   } else {
   	echo json_encode("not created");
   }

