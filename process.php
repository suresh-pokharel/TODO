<?php
/*
      Author  : Suresh Pokharel
      Email   : suresh.wrc@gmail.com
      GitHub  : github.com/suresh021
      URL     : psuresh.com.np
*/ 
?>

<?php
  /*Database Connection*/
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'dm';
  Global $dbconfig;
  $dbconfig = mysqli_connect($host,$username,$password,$database) or die("An Error occured while connecting to the database");
?>
<?php 
	if (isset($_GET['insert_description'])) {
		$desc=$_GET['insert_description'];

  		if(mysqli_query($dbconfig,"INSERT INTO todo(description) values('$desc')")){
  			$response_array['status']="success";
  		}else {
  			$response_array['status']="error";
  		}
  		header('Content-type: application/json');//preparing correct format for json_encode
    	echo json_encode($response_array);//sending response to ajax
	}
 ?>

  <?php 
    if (isset($_GET['delete_id'])) {
    $delete_id=$_GET['delete_id'];
      if(mysqli_query($dbconfig,"DELETE FROM todo WHERE id=$delete_id")){
        $response_array['delete_status']="success";
      }else {
        $response_array['delete_status']="error";
      }
      header('Content-type: application/json');//sending response to ajax
      echo json_encode($response_array);
  }
 ?>

 <?php 
    if (isset($_GET['edit_id'])){
    $edit_id= $_GET['edit_id']; 
    $new_desc= $_GET['new_desc'];
      if(mysqli_query($dbconfig,"UPDATE todo SET description='$new_desc' WHERE id=$edit_id")){
        $response_array['edit_status']="success";
      }else {
        $response_array['edit_status']="error";
      }
      header('Content-type: application/json');//sending response to ajax
      echo json_encode($response_array);
  }
 ?>
