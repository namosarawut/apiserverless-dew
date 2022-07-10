<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");    
header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Accept");
      include 'classconectdatabase.php';
      $user_username = $_POST['username'];
      $user_password = $_POST['password'];

      $sql = "SELECT * FROM datauser WHERE username ='".$user_username."' AND password = '".$user_password."'";
      $result = $connect->query($sql);

     if($result->num_rows > 0 ){
      while ($row = mysqli_fetch_array($result)){
        $json = array("status" => "get successfull", "message" => "successfull" ,"item" => $row);
        echo json_encode($json);
    }
    }else{
        $json = array("status" => "unsuccessful", "message" => "data notfound");
        echo json_encode($json);
    }
?>
