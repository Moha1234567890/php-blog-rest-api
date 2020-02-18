<?php 
 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  include "../config/config.php";

  if(isset($_GET['id'])) {
  	$var = $_GET['id'];
  	$sel = "SELECT * FROM posts where id = '$var'";
  	$sel_query = $conn->prepare($sel);
  	$sel_query->execute();
  	$num = $sel_query->rowCount();

  	if ($num > 0) {
  		$arr = array();
  		while ($sel_query_fetch = $sel_query->fetch(PDO::FETCH_ASSOC)) {
  			extract($sel_query_fetch);

  			$post_item = array (

              'id' => $id,
              'title' => $title,
              'body' => html_entity_decode($body),
              'author' => $author,
             
              'category_name' => $category_name
              
            );

             array_push($arr, $post_item); 
  			
  		}
  		echo json_encode($arr,JSON_UNESCAPED_UNICODE);
  	}
  }

