<?php 
 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  include "../config/config.php";

  if(isset($_GET['name'])) {
  	$var = $_GET['name'];
  	$sel = "
    SELECT * FROM categories INNER JOIN posts ON posts.category_name = categories.name AND categories.name = '$var'
    ";
  	$sel_query = $conn->prepare($sel);
  	$sel_query->execute();
  	$num = $sel_query->rowCount();

  	if ($num > 0) {
      $arr = array();
      while($sel_query_fetch = $sel_query->fetch(PDO::FETCH_ASSOC)) {
              extract($sel_query_fetch);
              $post_item = array(
              'id' => $id,
              'id' => $id,
              'title' => $title,
              'body' => html_entity_decode($body),
              'author' => $author,
              'name' => $name,
              'category_name' => $category_name,
              'created_at' => $created_at
            );

             array_push($arr, $post_item); 


       
      }

       //echo json_encode(array("data"=>$arr),JSON_UNESCAPED_UNICODE);

       echo json_encode($arr);
  		
  			
  		
  	}
  }

