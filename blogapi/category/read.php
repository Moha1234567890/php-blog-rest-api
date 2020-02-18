<?php


  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  include "../config/config.php";

  $sel = "SELECT * FROM categories";

  $sel_query = $conn->prepare($sel);
  $sel_query->execute();
  $num = $sel_query->rowCount();
  if($num > 0) {
  	    $arr = array();
	  	while($sel_query_fetch = $sel_query->fetch(PDO::FETCH_ASSOC)) {

	  		extract($sel_query_fetch);

	  		$arr_item = array (
	  			'id' => $id,
	  			'name' => $name,
	  			
	  		);
	  	//echo $sel_query_fetch['author'];
	  		array_push($arr, $arr_item);
	  }
	  echo json_encode($arr);
  }
  