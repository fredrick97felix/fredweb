<?php 
session_start();
include('../include/config.php');

if(!isset($_POST['searchTerm'])){ 
    echo 'not set';
  }else{
//header("Content-Type: application/json; charset=UTF-8");
//$obj = json_decode($_POST[""], false);

  $search = $_POST['searchTerm'];   
   
$errors = [];
$data = [];
$info ;
$count=0;

if($conn->connect_error){
 
    $data['success'] = false;
    $data['message'] = 'failed connection to database';
    $data['dberror'] =  $conn->connect_error;
} else{
       $stmt = $conn->prepare("SELECT * FROM `icd-10`WHERE `CODE` LIKE '%".$search."%' limit 10 ");
       //SELECT * FROM `icd-10` LIMIT ?

      //$stmt->bind_param("s", $obj->limit);

       $stmt->execute();
       $result = $stmt->get_result();

       $info = $result->fetch_all(MYSQLI_ASSOC);
       $data['success'] = true;
       $data['message'] = 'data query successful';
       $data['table'] =  $info ;


        


}

//echo json_encode($data);

echo json_encode( $info);

  }





?>