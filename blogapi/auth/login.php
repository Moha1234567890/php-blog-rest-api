<?php 

   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods: GET');
   header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
   include "../config/config.php";

   
   $data = json_decode(file_get_contents('php://input'), true);

   //$email = $data['email'];
   
   
   if (isset($_GET['username']) AND isset($_GET['password'])) {

       $username = $_GET['username'];
       $password = $_GET['password'];

       $sel = "SELECT * FROM users where  username='$username' AND password='$password'";

       $sel_query = $conn->prepare($sel);
       

       $sel_query->execute();



       $num = $sel_query->rowCount();

       if($num > 0) {
        $arr = array();
       while ($sel_query_fetch = $sel_query->fetch(PDO::FETCH_ASSOC)) {
        extract($sel_query_fetch);

        $post_item = array (

              'email' => $email,
              'username' => $username,
              'password' => html_entity_decode($password),
              
              'msg' => "userfound"
            );
         

        array_push($arr, $post_item); 
       

         
       

            
        
      }



      echo json_encode($arr,JSON_UNESCAPED_UNICODE);
      } else {

        echo json_encode(  array (
          "status" => 0,
          "msg" => "usr not found"
        )) ;
      }
     } else {
      echo "smth is wrong";
     }


